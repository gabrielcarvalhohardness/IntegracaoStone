# Cadastro da máquina
- Rótulo
- Código PDV
- StoneCode
- Status


# Configuração
Tipo de cobrança de juro para parcelamento no cartão de crédito (Loja - Cliente)
Fazer o cadastrado dos PDV (por empresa)


# Fluxo 
- Seleciona o caixa
    - Ao abrir o PDV é solicitada a seleção do caixa
        - Armazenar isso no cache ou gravar no usuário
- Seleciona os produtos
- Seleciona o método de pagamento e parcelas
    - Adicionar mais de uma forma de pagamento
- Processo de pagamento
    - Máquina gera o recibo do pagamento
- Retorno da transação (webhook)
    - Armazeno informações para localizar a transação
    - Enviar notificação para atualizar a tela
- transmissão da nota (SEFAZ)    


- envio para fila de impressão
    - NFC-e
    - Recibo simples sem valor fiscal

