
provider "aws" {
  access_key = ""
  secret_key = ""
  region     = "eu-west-2"
}

resource "aws_instance" "Project" {
  ami           = "ami-0b8cbc838fadfee2a"
  instance_type = "t2.micro"
  key_name = "AWSKeyAshleyPersonalLondon"
}