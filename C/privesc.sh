#!/bin/sh
gcc privesc_before.c -o privesc_before
chmod +rx privesc_before
gcc privesc.c -o privesc
chmod +rx privesc
./privesc_before
./privesc
