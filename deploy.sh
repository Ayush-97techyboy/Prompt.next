#!/usr/bin/env bash
# ==============================================================================
# Deployment Script for macOS / Linux
# Prompt.next (Git Repo) -> Prompt.next_deploy (AWS Lightsail / Static Hosting)
# Supports:
#   1. Static Web Hosting Package (HTML5 / CSS3 / ES6+)
#   2. WordPress Theme Package (promptnext-theme & promptnext-theme.zip)
# Usage:
#   ./deploy.sh [All|Static|Theme]
# ==============================================================================

set -euo pipefail

TARGET="${1:-All}"
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
SOURCE_DIR="$SCRIPT_DIR"
DEPLOY_DIR="$(dirname "$SOURCE_DIR")/Prompt.next_deploy"
THEME_SRC_DIR="$SOURCE_DIR/wp-theme/promptnext-theme"
THEME_DEST_DIR="$DEPLOY_DIR/promptnext-theme"
THEME_ZIP_DEST="$DEPLOY_DIR/promptnext-theme.zip"
THEME_ZIP_SRC="$SOURCE_DIR/wp-theme/promptnext-theme.zip"

echo "======================================================"
echo " Prompt Next Deployment & Synchronization Engine"
echo " OS:         macOS / Unix (zsh/bash)"
echo " Mode:       Target = $TARGET"
echo " Source:     $SOURCE_DIR"
echo " Deploy Dir: $DEPLOY_DIR"
echo "======================================================"

mkdir -p "$DEPLOY_DIR"

# ------------------------------------------------------------------------------
# PART A: STATIC DEPLOYMENT BUILD
# ------------------------------------------------------------------------------
if [ "$TARGET" = "All" ] || [ "$TARGET" = "Static" ]; then
    echo "--- [1/2] Processing Static Website Build ---"

    # A1. Copy root index.html
    if [ -f "$SOURCE_DIR/index.html" ]; then
        cp "$SOURCE_DIR/index.html" "$DEPLOY_DIR/index.html"
        echo "[OK] Copied: index.html"
    fi

    # A2. Sync core folders: css, assets, js
    for folder in css assets js; do
        if [ -d "$SOURCE_DIR/$folder" ]; then
            rm -rf "$DEPLOY_DIR/$folder"
            cp -R "$SOURCE_DIR/$folder" "$DEPLOY_DIR/$folder"
            echo "[OK] Synced folder: $folder -> $DEPLOY_DIR/$folder"
        fi
    done

    # A3. Copy subpages from Pages/* directly into DEPLOY_DIR root
    if [ -d "$SOURCE_DIR/Pages" ]; then
        for page_dir in "$SOURCE_DIR"/Pages/*/; do
            if [ -d "$page_dir" ]; then
                page_name="$(basename "$page_dir")"
                rm -rf "$DEPLOY_DIR/$page_name"
                cp -R "$page_dir" "$DEPLOY_DIR/$page_name"
                echo "[OK] Synced subpage: Pages/$page_name -> $page_name"
            fi
        done
    fi

    # A4. Normalize links in deploy root index.html
    if [ -f "$DEPLOY_DIR/index.html" ]; then
        sed -i '' 's|href="Pages/|href="|g' "$DEPLOY_DIR/index.html"
        echo "[OK] Normalized root links in index.html"
    fi

    # A5. Normalize relative paths in all flattened subpages (../../ -> ../)
    for sub_dir in "$DEPLOY_DIR"/*/; do
        dir_name="$(basename "$sub_dir")"
        if [ "$dir_name" != "css" ] && [ "$dir_name" != "assets" ] && [ "$dir_name" != "js" ] && [ "$dir_name" != "promptnext-theme" ]; then
            if [ -f "$sub_dir/index.html" ]; then
                sed -i '' 's|\.\./\.\./|../|g' "$sub_dir/index.html"
                echo "[OK] Normalized paths in: $dir_name/index.html"
            fi
        fi
    done
fi

# ------------------------------------------------------------------------------
# PART B: WORDPRESS THEME SYNCHRONIZATION & PACKAGING
# ------------------------------------------------------------------------------
if [ "$TARGET" = "All" ] || [ "$TARGET" = "Theme" ]; then
    echo ""
    echo "--- [2/2] Processing WordPress Theme Package ---"

    if [ ! -d "$THEME_SRC_DIR" ]; then
        echo "[WARN] Source theme directory not found: $THEME_SRC_DIR"
        exit 1
    fi

    echo "[INFO] Synchronizing latest css, js, and assets into WordPress theme..."
    rm -rf "$THEME_SRC_DIR/css" "$THEME_SRC_DIR/js" "$THEME_SRC_DIR/assets"
    cp -R "$SOURCE_DIR/css" "$THEME_SRC_DIR/css"
    cp -R "$SOURCE_DIR/js" "$THEME_SRC_DIR/js"
    cp -R "$SOURCE_DIR/assets" "$THEME_SRC_DIR/assets"
    echo "[OK] Synced latest assets into $THEME_SRC_DIR"

    mkdir -p "$THEME_DEST_DIR"
    rm -rf "$THEME_DEST_DIR"/*
    cp -R "$THEME_SRC_DIR"/* "$THEME_DEST_DIR/"
    echo "[OK] Synced WordPress theme into: $THEME_DEST_DIR"

    echo "[INFO] Compressing promptnext-theme into ZIP package..."
    rm -f "$THEME_ZIP_DEST" "$THEME_ZIP_SRC"
    (cd "$DEPLOY_DIR" && zip -rq "$THEME_ZIP_DEST" "promptnext-theme")
    cp "$THEME_ZIP_DEST" "$THEME_ZIP_SRC"
    echo "[OK] Successfully created and synced: promptnext-theme.zip"
fi

echo ""
echo "======================================================"
echo " DEPLOYMENT AND SYNCHRONIZATION COMPLETED!"
echo " Static Site:    $DEPLOY_DIR"
echo " WP Theme Dir:   $THEME_DEST_DIR"
echo " WP Theme Zip:   $THEME_ZIP_DEST"
echo "======================================================"
