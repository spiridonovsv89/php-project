provider "aws" {
  region = var.region
}

terraform {
  backend "s3" {
    bucket = "php-project-temporary-bucket"
    key    = "terraform.tfstate"
    region = "us-east-2"
  }
}

resource "aws_instance" "docker" {
  ami                    = "ami-097a2df4ac947655f"
  instance_type          = "t2.micro"
  vpc_security_group_ids = [aws_security_group.docker_sg.id]
  key_name               = "terraform"
  user_data              = file("script.bash")
  tags = {
    Name    = "Docker"
    Project = "php-project"
  }
  lifecycle {
    create_before_destroy = true
  }
}

resource "aws_security_group" "docker_sg" {
  name = "Docker Security Group"

  dynamic "ingress" {
    for_each = var.ports
    content {
      from_port   = ingress.value
      to_port     = ingress.value
      protocol    = "tcp"
      cidr_blocks = ["0.0.0.0/0"]
    }
  }

  egress {
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = ["0.0.0.0/0"]
  }
}
