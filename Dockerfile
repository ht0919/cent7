# CentOSの最新を指定
FROM centos:latest

# 変数の定義
ENV code_root /code
ENV httpd_conf ${code_root}/httpd.conf

# Apacheのインストール
RUN yum install -y httpd

# php 7.2のインストール
RUN yum install -y http://rpms.famillecollet.com/enterprise/remi-release-7.rpm
RUN yum install -y --enablerepo=remi-php72 php php-cli php-gd php-mbstring php-mcrypt php-mysqlnd php-pdo php-xml
RUN sed -i -e "s|^;date.timezone =.*$|date.timezone = Asia/Tokyo|" /etc/php.ini

# ルートディレクトリを変更（http.confファイルに追記）
ADD . $code_root
RUN test -e $httpd_conf && echo "Include $httpd_conf" >> /etc/httpd/conf/httpd.conf

# 外部に公開するコンテナのポートを指定
EXPOSE 80

# イメージからコンテナを起動するときに実行するコマンドを指定
CMD ["/usr/sbin/httpd", "-D", "FOREGROUND"]
