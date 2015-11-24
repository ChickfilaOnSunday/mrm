set -e
DIR=$(mktemp -d /tmp/msa.XXXX)
curl -sS https://getcomposer.org/installer | php -- --install-dir=$DIR/bin --filename=composer
cd $DIR
php composer require iang/mrm:dev-master
php ./vendor/bin/mrm
