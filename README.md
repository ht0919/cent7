# Docker for MacによるLAMP環境の構築(ContOS7編)

- Docker for MacによるLAMP環境(ContOS7)の構築用ファイルです。
- 必要最低限の設定項目で起動しています。

## 環境(バージョン)

- macOS: 10.13.4 (High Sierra)
- Docker for Mac: 18.03.1-ce-mac65 (24312)
- CentOS: 7.4
- Apache: 2.4.6
- PHP: 7.2.5
- MySQL: 8.0.11

## 操作手順(※Docker for Macを起動後に操作)

- $ git clone https\://github/ht0919/cent7.git
- $ cd cent7
- $ docker-compose up -d
- ブラウザで「[http://localhost/](http://localhost/)」を開く→phpinfoの表示
- ブラウザで「[http://localhost/testdb.php](http://localhost/testdb.php)」を開く→データベーステストの表示

## ディレクトリ構成

- [mysql] - my.conf <- MySQLの設定ファイル
- [webroot] - index.php,testdb.php <- webコンテンツのルートディレクトリ
- docket-compose.yml <- Docker Composeの設定ファイル
- Dockerfile <- Dockerの設定ファイル
- httpd.conf <- Apacheの設定ファイル
- README.md <- このファイル

## Docker Composeの使い方

- 開始：docker-compose up -d
- 状態：docker-compose top
- 停止：docker-compose down
- 接続：docker exec -it cent6_web_1 bash
- 一覧：docker images
- 削除：docker rmi <イメージid>
