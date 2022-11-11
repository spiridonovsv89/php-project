#!/bin/bash
sudo apt update &&
sudo apt install -y \
apt-transport-https \
ca-certificates \
curl \
gnupg-agent \
software-properties-common &&
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg &&
echo \
"deb [arch=$(dpkg --print-architecture) signed-by=/usr/share/keyrings/docker-archive-keyring.gpg] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable" \
| sudo tee /etc/apt/sources.list.d/docker.list > /dev/null &&
sudo apt update &&
apt-cache policy docker-ce &&
sudo apt install -y docker-ce &&
sudo apt install -y docker-compose &&
sudo apt upgrade -y &&
git clone https://github.com/spiridonovsv89/php-project.git /home/ubuntu/php-project &&
sudo usermod -aG docker ubuntu &&
sudo systemctl reboot