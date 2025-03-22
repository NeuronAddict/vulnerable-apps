pipeline {
    agent any

    environment {
        GIT_REPO = "https://github.com/NeuronAddict/vulnerable-apps.git"  // URL du dépôt
        IMAGE_NAME = "vulnerable-dvwa"   // Nom de l'image Docker pour DVWA
        IMAGE_TAG = "latest"             // Tag de l'image
        APP_DIR = "vulnerable-apps/dvwa" // Répertoire de l'application vulnérable (DVWA)
    }

    stages {
        stage('Clone Repository') {
            steps {
                // Cette étape clone le dépôt GitHub
                git "${GIT_REPO}"
            }
        }

        stage('Build Docker Image') {
            steps {
                script {
                    // Cette étape construit l'image Docker pour l'application vulnérable (DVWA)
                    sh "cd ${APP_DIR} && docker build -t ${IMAGE_NAME}:${IMAGE_TAG} ."
                }
            }
        }

        stage('Scan Docker Image with Trivy') {
            steps {
                script {
                    // Cette étape scanne l'image construite avec Trivy pour détecter les vulnérabilités
                    sh "trivy image --format json -o trivy-report.json ${IMAGE_NAME}:${IMAGE_TAG}"
                    
                    // Affiche le rapport généré par Trivy dans Jenkins
                    sh "cat trivy-report.json"
                }
            }
        }
    }

    post {
        always {
            // Affiche un message après l'exécution du pipeline
            echo "Analyse de sécurité terminée !"
        }
    }
}
