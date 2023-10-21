# Consulta Cep
Api para consultar cep pelo ViaCep.

# Requerimentos
- PHP >= 8.1
- Apache

# Configurando Vhost
- Alterar caminho para o caminho onde ficar salvo o projeto direcionado para pasta public.
- Adicionar o ip e ServerName no arquivo hosts e posteriormente reiniciar o Apache
```
  <VirtualHost *:80>
    DocumentRoot "caminho/public"
    ServerName consultarcep.local
    ErrorLog "/var/log/httpd/consultarcepcorreios-error_log"
    CustomLog "/var/log/httpd/consultarcepcorreios-access_log" common

    <Directory "caminho">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

# Retorno esperado

![image](https://github.com/matheusbbdutra/ConsultaCep/assets/88410058/f8e29751-2bad-42a4-8b30-8b99e64822f2)




