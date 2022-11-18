
[![GitHub Actions](https://img.shields.io/endpoint.svg?url=https%3A%2F%2Factions-badge.atrox.dev%2Fatrox%2Fsync-dotenv%2Fbadge&style=flat-square)](https://actions-badge.atrox.dev/atrox/sync-dotenv/goto)

# php-project

Simple PHP application that is deployed in AWS by GitHub actions

## Purpose
Organize a pipeline to deliver changes directly to the registry(Docker Hub) with the following deploy changes on the server
## Usage
To test, just add the following secrets to Actions with your own values:

- DOCKERHUB_USERNAME
- DOCKERHUB_TOKEN
- AWS_ACCESS_KEY_ID
- AWS_SECRET_ACCESS_KEY
## Technologies:
- AWS (ec2, s3)
- PHP + MySQL + Apache
- GitHub Actions
- docker (compose, file, hub)
- terraform
- bash
