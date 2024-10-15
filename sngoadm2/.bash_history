node -v
npm -v
mongosh
mongosh
sudo apt-get install -y gnupg curl
curl -fsSL https://pgp.mongodb.com/server-7.0.asc | sudo gpg -o /usr/share/keyrings/mongodb-server-7.0.gpg --dearmor
echo "deb [ arch=amd64,arm64 signed-by=/usr/share/keyrings/mongodb-server-7.0.gpg ] https://repo.mongodb.org/apt/ubuntu focal/mongodb-org/7.0 multiverse" | sudo tee /etc/apt/sources.list.d/mongodb-org-7.0.list
sudo apt-get update
sudo apt-get install -y mongodb-org
sudo apt-get install -y mongodb-org=7.0.2 mongodb-org-database=7.0.2 mongodb-org-server=7.0.2 mongodb-mongosh=7.0.2 mongodb-org-mongos=7.0.2 mongodb-org-tools=7.0.2
echo "mongodb-org hold" | sudo dpkg --set-selections
echo "mongodb-org-server hold" | sudo dpkg --set-selections
echo "mongodb-mongosh hold" | sudo dpkg --set-selections
sudo systemctl start mongod
sudo systemctl daemon-reload
sudo systemctl status mongod
cd apps
cd searchngo-api
npm i -force
npm run dev
npm install -g yarn
sudo npm install -g yarn
yarn --version
npm run dev
mongosh
cd apps
cd searchngo-api
npm run dev
tmux new -s sngo_backend
mongosh
telnet cloudsms.jegotrip.com 1820
sudo apt install telnet
sudo dpkg --configure -a
sudo apt install telnet
telnet cloudsms.jegotrip.com 1820
nslookup cloudsms.jegotrip.com
ping cloudsms.jegotrip.com
mongosh
cd apps
cd searchngo-api
git log
git pull origin development
tmux ls
tmux attach -t sngo_backend
curl cip.cc
curl https://cloudsms.jegotrip.com:1820/uips
npm start
cd ..
ls
cd sngoadm2
ls
cd apps
ls
cd searchngo-api
ls
npm start
