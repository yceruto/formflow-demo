# Symfony FormFlow Demo

![CI](https://github.com/dunglas/symfony-docker/workflows/CI/badge.svg)

## Getting Started

1. If not already done, [install Docker Compose](https://docs.docker.com/compose/install/) (v2.10+)
2. Run `docker compose build --pull --no-cache` to build fresh images
3. Run `docker compose up --wait` to set up and start a fresh Symfony project
4. Open `https://localhost` in your favorite web browser and [accept the auto-generated TLS certificate](https://stackoverflow.com/a/15076602/1352334)
5. Run `docker compose down --remove-orphans` to stop the Docker containers.

## Features

* **Basic Form Wizard**: Showcases the fundamental features of Symfony FormFlow with a step-by-step form wizard implementation, including multistep form wizard, default form theme, simple step indicator, form validation, and session data storage.

* **Sign In Flow**: A streamlined authentication form showcasing step-by-step login process with email verification and security checks, featuring two-stage login flow, custom form rendering, custom navigator buttons, form validation, and session data storage.

* **Sign Up Process**: A multistep registration form demonstrating user account creation with validation, featuring dynamic steps definition, form step with `inherit_data`, progress tracking, jump to any previous step, confirmation step, custom form theme, form validation, and session data storage.

* **KYC Validation**: A comprehensive KYC (Know Your Customer) validation workflow for identity verification and compliance requirements, featuring dynamic steps definition, file uploading, manage collection, custom form theme, form validation, and session data storage.

* **Settings Interface**: A tab-based form interface where users can freely navigate between sections without following a specific order, featuring tab-based navigation, non-linear form completion, custom form theme, form validation, custom step accessor, and null data storage.

* **Color picker**: An interactive form flow where users select a color and, based on their choice, are guided to pick a matching darker or lighter gradient, featuring dependent choices across steps, dynamic step content, form validation, and session data storage.

**Enjoy!**

## Code and Docs

https://github.com/symfony/symfony/pull/60212

## License

Symfony FormFlow Demo is available under the MIT License.

## Credits

Created by [Yonel Ceruto](https://yceruto.dev).
