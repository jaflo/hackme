# For nitrous.io

cd public_html
git clone https://github.com/jaflo/hackme.git
mv hackme/* ./
rm -rf hackme
sudo mysql -u nitrous -e "CREATE DATABASE hackthis"
sudo mysql -u nitrous hackthis < init.sql
sudo service apache2 start
