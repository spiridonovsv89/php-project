output "Public_IP" {
  value = aws_instance.docker.public_ip
}

output "Public_DNS" {
  value = aws_instance.docker.public_dns
}
