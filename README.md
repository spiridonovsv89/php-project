
[![GitHub Actions](https://img.shields.io/endpoint.svg?url=https%3A%2F%2Factions-badge.atrox.dev%2Fatrox%2Fsync-dotenv%2Fbadge&style=flat-square)](https://actions-badge.atrox.dev/atrox/sync-dotenv/goto)

# php-project
A simple PHP application runs on AWS, uses GitHub Actions to build, make changes directly to the registry (Docker Hub) and deploy to the server automatically

## Environment Variables
To run this project, you will need to add the following secrets to GitHub Actions with your own values

`DOCKERHUB_USERNAME`

`DOCKERHUB_TOKEN`

`AWS_ACCESS_KEY_ID`

`AWS_SECRET_ACCESS_KEY`

## 🛠 Tech Stack:

**AWS**
as cloud platform

**Apache+MySQL+PHP**
as web application stack

**GitHub Actions** to auto build and deploy

**Docker**
- build docker image with dockerfile
- docker-compose to running multi-container application with pull image from registry
- docker hub as registry

**Terraform:**
- Create and destroy EC2 instance and auto-assign security group  
- Store terraform state files in S3 bucket
- Bootstrap bash script 
