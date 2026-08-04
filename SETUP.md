# Elm Risk Solutions

WordPress theme: **ACF Flexible Content** + **Tailwind CSS** + **GitHub Actions ? WP Engine** (`elmrisksolustg`).

Build against **staging only** ? no Local by Flywheel. Pattern matches impact-one-million / yellow-bolts for the stack only; **do not copy IOM layouts**.

**Figma (AXL):** https://www.figma.com/design/dG9NKdUN3mJ3uVcnQUlAkY/Elm-Risk-Wireframes  
**Staging:** `https://elmrisksolustg.wpengine.com` (WP Admin from the WP Engine dashboard)

---

## 0. Bootstrap (run once in your terminal)

Agent sandbox can't write `~/.ssh` or finish `git init`. From the repo root:

```bash
bash scripts/bootstrap-local.sh
```

That moves the deploy key into `~/.ssh`, places Cursor conventions under `.cursor/rules/`, and finishes git init. **Do this before committing** ? the private key must not stay in the repo root.

---

## 1. WP Engine SSH + first deploy path

1. Confirm staging env name: **`elmrisksolustg`**.
2. WP Engine ? your user profile ? **SSH Keys** ? add the public key (`~/.ssh/wpe_ers_deploy.pub` ? printed by the bootstrap script).
3. Wait for key propagation (often a few minutes).

---

## 2. GitHub repo + Actions secrets

1. Create a private GitHub repo (e.g. `axl-dev/elm-risk-solutions`).
2. Push this project to `main`.
3. Repo ? Settings ? Secrets and variables ? Actions ? New repository secret:

| Secret | Value |
|--------|--------|
| `WPE_SSHG_KEY_PRIVATE` | Full contents of `~/.ssh/wpe_ers_deploy` (private key, including `BEGIN`/`END` lines) |

4. Push to `main` (or run **Deploy to WP Engine** via Actions ? workflow_dispatch).
5. Workflow builds Tailwind and rsyncs `elm-risk-solutions/` ? `wp-content/themes/elm-risk-solutions/` on **`elmrisksolustg`**.

---

## 3. Staging WP Admin (after first deploy)

1. WP Engine dashboard ? **WP Admin** for Staging.
2. Appearance ? Themes ? activate **Elm Risk Solutions**.
3. Install plugins on staging (upload / WP Engine plugin install ? **not** in git):
   - **ACF Pro** ? Custom Fields ? Updates ? enter license key
   - Yoast SEO (optional)
   - WP Mail SMTP (when forms go live)
4. Custom Fields ? Field Groups ? **Sync** `Page Sections`, `Theme Header`, `Theme Footer` if prompted.
5. Settings ? Permalinks ? Post name ? Save.

Do **not** commit the ACF Pro zip or license key.

---

## 4. Day-to-day build (staging-first)

```bash
cd elm-risk-solutions
npm install   # once
npm run build # or watch while editing tokens/CSS source
```

1. Implement a Figma section in Cursor ? `templates/layouts/{name}.php` + ACF JSON.
2. Commit + push to `main` ? GitHub Actions deploys to `elmrisksolustg`.
3. Staging WP Admin ? Sync field group if new ? edit page / Theme Settings ? view staging URL.

Figma MCP: AXL team file, select a frame, implement as ACF layout. Preview on staging after each push.

---

## Checklist before first staging deploy

- [ ] `bash scripts/bootstrap-local.sh` done; private key not in repo
- [ ] SSH public key on WP Engine
- [ ] `WPE_SSHG_KEY_PRIVATE` set in GitHub
- [ ] `npm run build` succeeds
- [ ] First push to `main` deploys to `elmrisksolustg`
- [ ] Theme activated on staging
- [ ] ACF Pro installed + licensed; field groups synced
