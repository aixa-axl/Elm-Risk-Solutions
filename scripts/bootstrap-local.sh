#!/usr/bin/env bash
# One-shot bootstrap for Elm Risk Solutions (staging-only workflow).
# Run from the repo root in your own terminal (not the agent sandbox):
#   bash scripts/bootstrap-local.sh

set -euo pipefail

ROOT="$(cd "$(dirname "$0")/.." && pwd)"
cd "$ROOT"

echo "==> Moving deploy keys to ~/.ssh (if present in repo root)"
mkdir -p "$HOME/.ssh"
chmod 700 "$HOME/.ssh"
if [[ -f "$ROOT/wpe_ers_deploy" ]]; then
  mv -n "$ROOT/wpe_ers_deploy" "$HOME/.ssh/wpe_ers_deploy"
  mv -n "$ROOT/wpe_ers_deploy.pub" "$HOME/.ssh/wpe_ers_deploy.pub"
  chmod 600 "$HOME/.ssh/wpe_ers_deploy"
  chmod 644 "$HOME/.ssh/wpe_ers_deploy.pub"
  echo "    Keys at ~/.ssh/wpe_ers_deploy(.pub)"
elif [[ -f "$HOME/.ssh/wpe_ers_deploy" ]]; then
  echo "    ~/.ssh/wpe_ers_deploy already present"
else
  ssh-keygen -t ed25519 -C "github-actions-ers" -f "$HOME/.ssh/wpe_ers_deploy" -N ""
fi

echo "==> Cursor rules"
mkdir -p "$ROOT/.cursor/rules"
if [[ -f "$ROOT/ers-conventions.mdc" ]]; then
  mv -f "$ROOT/ers-conventions.mdc" "$ROOT/.cursor/rules/ers-conventions.mdc"
fi

echo "==> Git init"
if [[ ! -d "$ROOT/.git" ]] || ! git -C "$ROOT" rev-parse --git-dir >/dev/null 2>&1; then
  rm -rf "$ROOT/.git"
  git init -b main
fi
git add -A
git status --short

echo ""
echo "==> Public key - paste into WP Engine > SSH Keys:"
echo "---------------------------------------------------"
cat "$HOME/.ssh/wpe_ers_deploy.pub"
echo "---------------------------------------------------"
echo ""
echo "Next (staging-only - no Local site):"
echo "  1. Add that public key in WP Engine (user profile > SSH Keys)"
echo "  2. Push main to github.com/aixa-axl/Elm-Risk-Solutions"
echo "  3. Add secret WPE_SSHG_KEY_PRIVATE = contents of ~/.ssh/wpe_ers_deploy"
echo "  4. After first deploy: activate theme on elmrisksolustg, install ACF Pro, Sync field groups"
echo ""
echo "Full checklist: SETUP.md"
