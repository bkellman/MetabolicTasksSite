scriptPath=$(cd -P -- "$(dirname -- "$0")" && pwd -P)

# start sql
sudo service mysql stop
sudo service mysql start

# start apache
sudo service apache2 stop
sudo service apache2 start

# Start Supervisor
$scriptPath/startSupervisor.sh

# Start Kotrans server
$scriptPath/startKoTrans.sh

