# Modularity Form Builder

This plugin is a [Municipio LTS](https://github.com/municipio-se/municipio-lts)
version of Helsingborg stad's
[Modularity Form Builder plugin](https://github.com/helsingborg-stad/modularity-form-builder).

## Fork Base

This LTS fork is based on upstream tag
[`3.2.2`](https://github.com/helsingborg-stad/modularity-form-builder/tree/3.2.2),
commit
[`3fd89da`](https://github.com/helsingborg-stad/modularity-form-builder/commit/3fd89dac7717aca9f6214c9157cbaafc2df3321a).

## Changes in this Fork

This LTS version addresses several important issues and includes usability improvements. A critical fix resolves form validation failures caused by Content Security Policy (CSP) restrictions, ensuring forms work correctly in security-hardened environments.

File upload functionality has been improved to properly handle forms containing images and other file attachments. The submission handling has been updated to provide better context for card components, improving the overall user experience.

The fork also includes updated package dependencies and build configurations, along with removal of GitHub Actions workflows to streamline development.

## Installation

1. Install the package:
   ```bash
   composer require municipio/wp-plugin-modularity-form-builder
   ```
2. Activate the plugin in WordPress.
3. Activate the module under _Modularity → Options_.
