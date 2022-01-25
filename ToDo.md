[  ] Error Handling

[  ] Trafic
 - Trafik Docker-Compose
 -
 - - Entrypoint -> HTTP Router -> HTTP Middleware ->  Services 
 -
 - - Enable Config file 
 - - Make sure web portal is exposed on dev and not prod 
 - - Make sure all container sites are a part of the trafik network
 - - To expose container site to trafic: Add lablel trafic enable = true 
 - - lable: trafik.http.routers.[servicename].entrypoint = web, websecure
 - - label: trafik.http.routers.[servicename].rule = Host( subdomain.domain.tld )
 - - label: trafik.http.routers.[servicename].tls = true 
 - - lable: trafik.http.routers.[servicename].tls.certresolver = (staging or production )
 - - Expose only trafic 
 -
 - - http to https redirection : remove comment entrypoint -> web -> http -> redireciton 
 -
 - forward ocodan.lan:80 -> Personal Site
 - forward mtgcredit.ocodan.tld:80 -> MTGCredit site
 - Enable SSL/TLS from Trafik to Client
 - - Volume to store certificate 
 -
 - reset config file to get refreshed cert 
 -
