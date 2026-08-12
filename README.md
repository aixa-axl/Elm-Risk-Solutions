# Elm Risk Solutions

Custom WordPress theme ? ACF Flexible Content, Tailwind CSS, GitHub Actions ? WP Engine (`elmrisksolustg` staging, `elmrisksolutio` production).

Develop against **WP Engine staging** (no Local site). See **[SETUP.md](./SETUP.md)**.

```bash
cd elm-risk-solutions
npm install
npm run build
# push main ? deploys to staging + production
```

## Structure

```
elm-risk-solutions/          ? WordPress theme (deployed)
??? acf-json/                ? ACF field groups (versioned)
??? assets/css|js|images/
??? src/input.css            ? Tailwind source
??? templates/layouts/       ? ACF flexible content partials
??? functions.php
??? page.php
??? .deployignore
.github/workflows/deploy.yml
.cursor/rules/ers-conventions.mdc
```

## Deploy

Push to `main` ? builds CSS ? deploys theme to **staging** (`elmrisksolustg`) and **production** (`elmrisksolutio`).

Secret required: `WPE_SSHG_KEY_PRIVATE`

## Figma

AXL team file: https://www.figma.com/design/dG9NKdUN3mJ3uVcnQUlAkY/Elm-Risk-Wireframes
