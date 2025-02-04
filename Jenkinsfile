pipeline {
    agent any

    environment {
        EC2_IP = '13.213.55.242'
    }

    stages {
        stage ('fetch code') {
            steps {
                script {
                    echo "Pull source code from Git"
                    git branch: 'main', url: 'https://github.com/FerdinandJr/php_mysql_nginx_docker_treasure-products.git'
                }
            }
        }
        
        stage ('deploy to EC2') {
            steps {
                script {
                    echo "deploying to shell-script to ec2"
                    def shellCmd = "bash ./php.sh"
                    sshagent (['ec2']) {
                        sh "scp -o StrictHostKeyChecking=no php.sh ubuntu@${EC2_IP}:/home/ubuntu"
                        sh "ssh -o StrictHostKeyChecking=no ubuntu@${EC2_IP} ${shellCmd}"
                    }
                }
            }
        }
    }
}
