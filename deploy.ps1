# ==============================================================================
# Deployment Script: Prompt.next (Git Repo) -> Prompt.next_deploy (AWS Lightsail)
# Supports:
#   1. Static Web Hosting Package (HTML5 / CSS3 / ES6+)
#   2. WordPress Theme Package (promptnext-theme & promptnext-theme.zip)
# ==============================================================================

param (
    [ValidateSet("All", "Theme", "Static")]
    [string]$Target = "All"
)

$ErrorActionPreference = "Stop"

$sourceDir = $PSScriptRoot
$parentDir = Split-Path -Path $sourceDir -Parent
$deployDir = Join-Path $parentDir "Prompt.next_deploy"
$lightsailDir = Join-Path $parentDir "Prompt.next_deployment_lightsail"
$themeSrcDir = Join-Path $sourceDir "wp-theme\promptnext-theme"
$themeDestDir = Join-Path $deployDir "promptnext-theme"
$themeZipDest = Join-Path $deployDir "promptnext-theme.zip"
$themeZipSrc = Join-Path $sourceDir "wp-theme\promptnext-theme.zip"

Write-Host "======================================================" -ForegroundColor Cyan
Write-Host " Prompt Next Deployment & Synchronization Engine" -ForegroundColor Cyan
Write-Host " Mode:          Target = $Target" -ForegroundColor Yellow
Write-Host " Source:        $sourceDir"
Write-Host " Deploy Dir:    $deployDir"
Write-Host " Lightsail Dir: $lightsailDir"
Write-Host "======================================================`n" -ForegroundColor Cyan

# 1. Ensure deployment root directories exist
if (-not (Test-Path -Path $deployDir)) {
    New-Item -ItemType Directory -Path $deployDir -Force | Out-Null
    Write-Host "[OK] Created deployment directory: $deployDir" -ForegroundColor Green
}
if (-not (Test-Path -Path $lightsailDir)) {
    New-Item -ItemType Directory -Path $lightsailDir -Force | Out-Null
    Write-Host "[OK] Created lightsail directory: $lightsailDir" -ForegroundColor Green
}

# ------------------------------------------------------------------------------
# PART A: STATIC DEPLOYMENT BUILD
# ------------------------------------------------------------------------------
if ($Target -in @("All", "Static")) {
    Write-Host "--- [1/2] Processing Static Website Build ---" -ForegroundColor Cyan

    # A1. Copy root index.html
    $indexFile = Join-Path $sourceDir "index.html"
    if (Test-Path -Path $indexFile) {
        Copy-Item -Path $indexFile -Destination (Join-Path $deployDir "index.html") -Force
        Copy-Item -Path $indexFile -Destination (Join-Path $lightsailDir "index.html") -Force
        Write-Host "[OK] Copied: index.html" -ForegroundColor Green
    }

    # A2. Copy css, assets, and js folders
    $coreFolders = @("css", "assets", "js")
    foreach ($folder in $coreFolders) {
        $srcPath = Join-Path $sourceDir $folder
        if (Test-Path -Path $srcPath) {
            Copy-Item -Path $srcPath -Destination (Join-Path $deployDir $folder) -Recurse -Force
            Copy-Item -Path $srcPath -Destination (Join-Path $lightsailDir $folder) -Recurse -Force
            Write-Host "[OK] Synced folder: $folder -> deploy & lightsail" -ForegroundColor Green
        }
    }

    # A3. Copy Pages subdirectories into root of deployDir and lightsailDir
    $pagesDir = Join-Path $sourceDir "Pages"
    if (Test-Path -Path $pagesDir) {
        $subDirs = Get-ChildItem -Path $pagesDir -Directory
        foreach ($sub in $subDirs) {
            Copy-Item -Path $sub.FullName -Destination (Join-Path $deployDir $sub.Name) -Recurse -Force
            Copy-Item -Path $sub.FullName -Destination (Join-Path $lightsailDir $sub.Name) -Recurse -Force
            Write-Host "[OK] Synced subpage: Pages/$($sub.Name) -> $($sub.Name)" -ForegroundColor Green
        }
    }

    # A4. Link Normalization for Root Static Deployment
    foreach ($target in @($deployDir, $lightsailDir)) {
        $deployIndex = Join-Path $target "index.html"
        if (Test-Path $deployIndex) {
            $content = [System.IO.File]::ReadAllText($deployIndex)
            $normalizedContent = $content.Replace('href="Pages/', 'href="')
            [System.IO.File]::WriteAllText($deployIndex, $normalizedContent)
            Write-Host "[OK] Normalized root links in: $(Split-Path $target -Leaf)/index.html" -ForegroundColor Green
        }

        Get-ChildItem -Path $target -Directory | Where-Object { $_.Name -notin @("css", "assets", "js", "promptnext-theme") } | ForEach-Object {
            $pageIndex = Join-Path $_.FullName "index.html"
            if (Test-Path $pageIndex) {
                $subContent = [System.IO.File]::ReadAllText($pageIndex)
                $subNormalized = $subContent.Replace('../../', '../')
                [System.IO.File]::WriteAllText($pageIndex, $subNormalized)
                Write-Host "[OK] Normalized paths in: $(Split-Path $target -Leaf)/$($_.Name)/index.html" -ForegroundColor Green
            }
        }
    }
}

# ------------------------------------------------------------------------------
# PART B: WORDPRESS THEME SYNCHRONIZATION & PACKAGING
# ------------------------------------------------------------------------------
if ($Target -in @("All", "Theme")) {
    Write-Host "`n--- [2/2] Processing WordPress Theme Package ---" -ForegroundColor Cyan

    if (-not (Test-Path -Path $themeSrcDir)) {
        Write-Host "[ERROR] Theme source not found: $themeSrcDir" -ForegroundColor Red
        return
    }

    # B1. Ensure latest CSS, JS, and Assets are synced into Theme Source
    Write-Host "[INFO] Synchronizing latest css, js, and assets into WordPress theme..." -ForegroundColor Yellow
    Copy-Item -Path (Join-Path $sourceDir "css") -Destination (Join-Path $themeSrcDir "css") -Recurse -Force
    Copy-Item -Path (Join-Path $sourceDir "js") -Destination (Join-Path $themeSrcDir "js") -Recurse -Force
    Copy-Item -Path (Join-Path $sourceDir "assets") -Destination (Join-Path $themeSrcDir "assets") -Recurse -Force
    Write-Host "[OK] Synced latest assets into $themeSrcDir" -ForegroundColor Green

    # B2. Sync Theme from Git Repo into Deployment Directory
    if (-not (Test-Path -Path $themeDestDir)) {
        New-Item -ItemType Directory -Path $themeDestDir -Force | Out-Null
    }
    Copy-Item -Path "$themeSrcDir\*" -Destination $themeDestDir -Recurse -Force
    Write-Host "[OK] Synced WordPress theme into: $themeDestDir" -ForegroundColor Green

    # B3. Build / Update promptnext-theme.zip package
    Write-Host "[INFO] Compressing promptnext-theme into ZIP package..." -ForegroundColor Yellow
    if (Test-Path -Path $themeZipDest) {
        Remove-Item -Path $themeZipDest -Force
    }
    Compress-Archive -Path $themeDestDir -DestinationPath $themeZipDest -Force
    Copy-Item -Path $themeZipDest -Destination $themeZipSrc -Force
    Write-Host "[OK] Successfully created and synced: promptnext-theme.zip" -ForegroundColor Green
}

Write-Host "`n======================================================" -ForegroundColor Cyan
Write-Host " DEPLOYMENT AND SYNCHRONIZATION COMPLETED!" -ForegroundColor Green
Write-Host " Static Site:    $deployDir" -ForegroundColor White
Write-Host " Lightsail Site: $lightsailDir" -ForegroundColor White
Write-Host " WP Theme Dir:   $themeDestDir" -ForegroundColor White
Write-Host " WP Theme Zip:   $themeZipDest" -ForegroundColor White
Write-Host "======================================================" -ForegroundColor Cyan
