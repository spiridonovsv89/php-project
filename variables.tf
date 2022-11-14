variable "region" {
  type    = string
  default = "us-east-2"
}

variable "ports" {
  type    = list(any)
  default = ["8888", "8887", "22", ]
}

variable "PATH" {
  type  = string
  value = "/home/ubuntu/php-project"
}
