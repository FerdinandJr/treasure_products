pipeline {
    agent any

    environment {
        EC2_IP = '13.213.55.242'
        GITHUB_REPO = 'https://github.com/FerdinandJr/treasure_products.git'
        REMOTE_USER = "ubuntu"
    }

    stages {
        stage ('fetch code') {
            steps {
                script {
                    echo "Pull source code from Git"
                    git branch: 'main', url: "${GITHUB_REPO}"
                }
            }
        }
        
        stage ('deploy to EC2') {
            steps {
                script {
                    echo "deploying to shell-script to ec2"
                    def shellCmd = "bash ./php.sh"
                    sshagent (['ec2']) {
                        sh "scp -o StrictHostKeyChecking=no php.sh ${REMOTE_USER}@${EC2_IP}:/home/ubuntu"
                        sh "ssh -o StrictHostKeyChecking=no ${REMOTE_USER}@${EC2_IP} ${shellCmd}"
                    }
                }
            }
        }
    }
}
