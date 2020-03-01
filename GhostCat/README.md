# GhostCat

- Anoncement : https://lists.apache.org/thread.html/r7c6f492fbd39af34a68681dbbba0468490ff1a97a1bd79c6a53610ef%40%3Cannounce.tomcat.apache.org%3E
 
## launch vulnerable machine

In this folder :
```
docker-compose up
```

## vulnerable file

The demo application has a file named a.txt that contain jsp code (it can be an image uploaded by an untrusted user).

Relative to the servlet, the path is :
```
/WEB-INF/classes/static/a.txt
```

## access to the application

curl http://localhost/ghostcat-demo/


## AJP connector

The ajp connector is accessible via port 8009.

You can also access directly. To find the ip of the tomcat container:
```
$ docker exec -it ghostcat_tomcat_1 /bin/bash
root@6b7bdcf6cd68:/usr/local/tomcat# ip addr
```
Remember, the port 8009 is exposed for the demo, but it can be acceded via 