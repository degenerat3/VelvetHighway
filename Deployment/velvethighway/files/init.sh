#!/bin/sh
cp site.tar.gz ~/VH_BACKUP.tar.gz
tar -xzf site.tar.gz
cd site/utils
sudo bash setup.sh
