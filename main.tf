provider "aws" {
	region = "us-east-2"
}

terraform {
  backend "s3" {
    bucket = "php-project-temporary-bucket"
    key    = "terraform.tfstate"
    region = "us-east-2"
  }
}

resource "aws_instance" "ubuntu" {
	ami = "ami-097a2df4ac947655f"
	instance_type = "t2.micro"
	vpc_security_group_ids = [ "sg-0117e5b5334e8156f" ]
	key_name = "terraform"
	user_data = file("script.bash")
	tags = {
	
		Name = "docker"
		
	}
}

output "Public_IP" {
  value = aws_instance.ubuntu.public_ip
}