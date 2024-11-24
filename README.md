# Verificador de Domínios com WHOIS e IANA  
Projeto desenvolvido por [Skylinenando](https://github.com/skylinenando)  

## Descrição  
Este projeto realiza a verificação de domínios combinando palavras pré-definidas com todas as extensões de domínio disponíveis globalmente. Ele utiliza as bases de dados oficiais da **IANA (Internet Assigned Numbers Authority)** para obter todas as extensões e seus respectivos servidores WHOIS. O script exibe os domínios disponíveis em uma interface amigável e eficiente.

---

## Recursos  
- Verificação automática de todas as extensões de domínio do mundo (TLDs).  
- Integração com servidores WHOIS para determinar a disponibilidade.  
- Atualização em tempo real dos resultados encontrados.  
- Interface HTML para exibição dos resultados ou saída em terminal.  

---

## Como Utilizar  

### 1. Clonar o Repositório  
```bash
git clone https://github.com/skylinenando/nome-do-repositorio.git
cd nome-do-repositorio
```

### 2. Executar o Script de Verificação  
Certifique-se de que o **PHP** está instalado e configurado no ambiente.  

1. **Executar a partir do terminal**:  
   ```bash
   php verificar.php
   ```

2. **Acessar a interface web**:  
   - Coloque os arquivos em um servidor local (por exemplo, **XAMPP** ou **PHP built-in server**).  
   - Execute o servidor:  
     ```bash
     php -S localhost:8000
     ```
   - Acesse `http://localhost:8000/index.html` no navegador.  

### 3. Visualizar os Resultados  
Os resultados serão exibidos em tempo real na interface ou diretamente no terminal.

---

## Estrutura do Projeto  

- **`verificar.php`**: Script principal para verificar a disponibilidade dos domínios.  
- **`index.html`**: Interface para exibição dos resultados.  
- **`get_tlds.php`**: (Opcional) Script para obter a lista atualizada de extensões.  
- **`get_whois_servers.php`**: (Opcional) Script para mapear os servidores WHOIS.  

---

## Fontes de Pesquisa  

1. **[IANA - Lista de TLDs Oficiais](https://www.iana.org/domains/root/db)**  
   Base oficial para todas as extensões de domínio e seus respectivos servidores WHOIS.  

2. **[RFC 3912 - WHOIS Protocol](https://tools.ietf.org/html/rfc3912)**  
   Padrão oficial que descreve como o protocolo WHOIS funciona.  

3. **[PHP Documentation - fsockopen](https://www.php.net/manual/en/function.fsockopen.php)**  
   Documentação oficial da função utilizada para conectar aos servidores WHOIS.

---

## Considerações Importantes  

1. **Atualização das Extensões**:  
   - Certifique-se de que a lista de extensões está atualizada para garantir precisão.  
   - Utilize o arquivo oficial da IANA para manter as informações corretas.  

2. **Limitações de Servidores WHOIS**:  
   - Alguns servidores WHOIS podem limitar o número de consultas realizadas em curto período de tempo.  
   - Para evitar bloqueios, considere adicionar intervalos (`sleep`) entre as verificações.  

3. **Resultados Não Garantidos**:  
   - Mesmo que um domínio apareça como disponível, ele pode ser registrado por terceiros imediatamente após a verificação.  
   - Certifique-se de registrar os domínios encontrados o mais rápido possível.  

4. **Erros Durante a Pesquisa**:  
   - A verificação de muitos domínios e extensões pode levar a tempos de resposta mais longos.  
   - Isso pode gerar erros devido ao timeout de servidores WHOIS ou falhas na conexão.  
   - Recomendamos limitar o número de palavras e extensões por verificação ou dividir as consultas em lotes menores para evitar falhas.

---

## Avisos  
- **Tempo de Resposta**: O tempo necessário para realizar a verificação de todos os domínios aumenta proporcionalmente ao número de palavras e extensões. Isso pode gerar atrasos ou falhas em servidores específicos.  
- **Disponibilidade Não Garantida**:  
  - Mesmo que o domínio apareça como disponível no script, ele pode ter sido registrado por outro usuário entre a verificação e o registro.  
  - Alguns servidores podem retornar dados desatualizados, exibindo domínios como disponíveis quando, na verdade, já estão registrados.  

---

**Autor:**  
[Skylinenando](https://github.com/skylinenando)  
Se você tiver dúvidas, sugestões ou encontrar problemas, fique à vontade para abrir um **issue** no repositório. 🚀  
