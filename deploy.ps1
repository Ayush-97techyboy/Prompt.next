# ==============================================================================
# Deployment Script for Prompt.next -> Prompt.next_deploy
# (Configured for AWS Lightsail / Nginx / Apache Static Web Hosting)
# ==============================================================================

$ErrorActionPreference = "Stop"

$sourceDir = "C:\Users\ayush\Documents\React_JS_HT_CS\React_World\Co_Ltd_Reactern_Proj\Prompt.next"
$deployDir = "C:\Users\ayush\Documents\React_JS_HT_CS\React_World\Co_Ltd_Reactern_Proj\Prompt.next_deploy"

Write-Host "=== Starting Deployment Package Creation ===" -ForegroundColor Cyan
Write-Host "Source:      $sourceDir"
Write-Host "Destination: $deployDir`n"

# 1. Create or ensure clean deployment destination folder
if (-not (Test-Path -Path $deployDir)) {
    New-Item -ItemType Directory -Path $deployDir -Force | Out-Null
    Write-Host "[OK] Created deployment folder: $deployDir" -ForegroundColor Green
} else {
    Write-Host "[INFO] Cleaning previous deployment files in: $deployDir" -ForegroundColor Yellow
    Get-ChildItem -Path $deployDir -Force | Remove-Item -Recurse -Force
    Write-Host "[OK] Cleaned previous deployment directory" -ForegroundColor Green
}

# 2. Copy root index.html
$indexFile = Join-Path $sourceDir "index.html"
if (Test-Path -Path $indexFile) {
    Copy-Item -Path $indexFile -Destination (Join-Path $deployDir "index.html") -Force
    Write-Host "[OK] Copied: index.html" -ForegroundColor Green
} else {
    Write-Host "[ERROR] Missing: index.html" -ForegroundColor Red
}

# 3. Copy css, assets, and js folders
$foldersToCopy = @("css", "assets", "js")
foreach ($folder in $foldersToCopy) {
    $srcPath = Join-Path $sourceDir $folder
    $destPath = Join-Path $deployDir $folder
    if (Test-Path -Path $srcPath) {
        Copy-Item -Path $srcPath -Destination $destPath -Recurse -Force
        Write-Host "[OK] Copied folder: $folder -> $destPath" -ForegroundColor Green
    } else {
        Write-Host "[ERROR] Missing folder: $folder" -ForegroundColor Red
    }
}

# 4. Copy all subdirectories located inside Pages directly into root of deployDir
$pagesDir = Join-Path $sourceDir "Pages"
if (Test-Path -Path $pagesDir) {
    $subDirs = Get-ChildItem -Path $pagesDir -Directory
    foreach ($sub in $subDirs) {
        $destSubDir = Join-Path $deployDir $sub.Name
        Copy-Item -Path $sub.FullName -Destination $destSubDir -Recurse -Force
        Write-Host "[OK] Copied subpage: Pages/$($sub.Name) -> $($sub.Name)" -ForegroundColor Green
    }
} else {
    Write-Host "[ERROR] Missing Pages directory: $pagesDir" -ForegroundColor Red
}

# 5. Link Normalization for AWS Lightsail root hosting
Write-Host "`n=== Normalizing Inter-Page Links & Asset Paths ===" -ForegroundColor Cyan

# 5a. Fix links in deploy root index.html (remove 'Pages/' prefix)
$deployIndex = Join-Path $deployDir "index.html"
if (Test-Path $deployIndex) {
    $content = [System.IO.File]::ReadAllText($deployIndex)
    $normalizedContent = $content.Replace('href="Pages/', 'href="')
    [System.IO.File]::WriteAllText($deployIndex, $normalizedContent)
    Write-Host "[OK] Normalized root navigation links in index.html" -ForegroundColor Green
}

# 5b. Fix links in all flattened subpages (change '../../' to '../')
Get-ChildItem -Path $deployDir -Directory | Where-Object { $_.Name -notin @("css", "assets", "js") } | ForEach-Object {
    $pageIndex = Join-Path $_.FullName "index.html"
    if (Test-Path $pageIndex) {
        $subContent = [System.IO.File]::ReadAllText($pageIndex)
        $subNormalized = $subContent.Replace('../../', '../')
        [System.IO.File]::WriteAllText($pageIndex, $subNormalized)
        Write-Host "[OK] Normalized asset and navigation paths in: $($_.Name)/index.html" -ForegroundColor Green
    }
}

Write-Host "`n=== Deployment completed successfully! ===" -ForegroundColor Cyan
Write-Host "Deployment package ready at: $deployDir" -ForegroundColor Cyan
Write-Host "All pages, assets, stylesheets, and scripts are 100% interlinked for AWS Lightsail." -ForegroundColor Green
