wget http://localhost:8080/jnlpJars/jenkins-cli.jar
java –jar jenkins-cli.jar –s http://localhost:8080 install-plugin checkstyle
java –jar jenkins-cli.jar –s http://localhost:8080 install-plugin clover
java –jar jenkins-cli.jar –s http://localhost:8080 install-plugin jdepend
java –jar jenkins-cli.jar –s http://localhost:8080 install-plugin pmd
java –jar jenkins-cli.jar –s http://localhost:8080 install-plugin phing
java –jar jenkins-cli.jar –s http://localhost:8080 install-plugin xunit
java –jar jenkins-cli.jar –s http://localhost:8080 safe-restart