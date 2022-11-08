# IntegracaoStone

**Stone Code** - Código do Estabelecimento dentro da Stone, ou seja, é o "ID" dele dentro da base Stone
**Pedido** - É o objeto composto pelas informações do Customer, Item e Cobranças. Um Pedido pode conter uma ou mais Cobranças
**Installment_type** 
    - Merchant: o custo do parcelamento fica sob responsabilidade do estabelecimento. (mais comum)
    - Issuer: : o custo do parcelamento é definido pelo emissor do cartão do portador.


# Fluxo
- Usuário seleciona o caixa
- Selecionar os produtos
- Ir para pagamento
- Selecionar o método de pagamento
- Enviar pagamento para a maquina

# Requisitos
- Usuário devera cadastrar o Stone Code
- No processo de pagamento será necessario travar o PDV
- Fazer o cadastro do PDV
- Usuário deve se logar ao PDV
    - Criar um sessão e gravar o PDV selecionado
    - Vincular o PDV ao usuário
- Cadastro da máquina (POS)

# Tipos de Integração
- Listagem de Pedidos
    Cria um lista de pedidos no POS, o operador seleciona o pedido e da sequência na transação
    - 

- Pagamento Direto
    O POS fica aguardando receber um pedido e ao receber entra diretamente na tela de pagamento
    - O valor pago é **sempre o valor total do pedido**. O sistema não permite pagamentos de outros valores.

# Pedido 
- Um pedido pode ter n pagamentos do POS, para cada transação no POS sera feita uma notificação (webhook) para o parceiro
- Sempre deve se fechar um pedido após a confirmação do pagamento
- Limite de 30 pedido aberto para integração do POS


# Dúvidas
- É possível combinar formas de pagamento (EX: Dois cartões) no pagamento direto?
  Não, a partir da próxima versão que sai em dezembro SIM
- Referente a configuração do webhook, é possível configurar um webhook para cada cliente, ou seria apenas um
    Sim, é possível ter um webhook para cada account ou um webhook geral por parceiro
- Merchant e Account Id, quando vou utilizar essas duas chaves?
    Ainda não sei
- Queria informações sobre o processo de homologação e acesso aos roteiros de teste
    Me passaram todo o processo e o roteiro de testes
- Quando estiver tudo pronto do nosso lado, quais serão os próximos passos
    Já passaram
- Como é o processo para habilitar o cliente a utilizar a integração?
    Também passaram manual

# Problemas
- Como manter a tela em espera 
    -> Poderia fazer uma requisição e ficar aguardando a resposta.
    -> Recebo uma notificação quando o pagamento foi autorizado ou recusado, mas como faço para atualizar a tela nesse estado
    -> WebSockets or HTTP2 Server-Sent Events (SSE) or Pooling  
# Hoje
O PDV inicia o lançamento de uma nota, caso o usuário já tenha iniciado uma nota antes ao abrir o PDV o sistema irá recuperar essa nota

# Run 
docker run -d --name php-cli -v ${PWD}:/app bitnami/php-fpm
php public/index.php

# Anotações
Terminais S920 Q92

Gerar mais de um pedido para a mesma nota.
webhook é possível ter um para cada account ou um geral
    - recomendaram o geral

App de reimpressão, quando der algum problema na impressão.

V128
H384
png

Próxima integração Conciliação

# Pagamento Direto
- Não é possível combinar meios de pagamento na máquina
    - Para burla, no sistema é necessário vincular a venda a varios pedido cada um com um meio de pagamento configurado
- É possível configurar o pagamento no PDV, o operador só necessita passar o cartão, sem configurar nada

# Listagem de Pedido
- É possível configurar o pagamento na máquina, exemplo dividir o valor em dois cartões
- É necessário selecionar o pedido
- Só e feita a busca da nota, quando é feita a transação se você divir o pagamento em dois meios ele só vai chamar
a rotina de impressão da nota após o segundo meio for pago
- O valor do pedido já vem preenchido
- Fica na tela de pagamento até o valor total ser pago
- É possível cobrar um valor diferente
    - Gerando duas ocasiões (pago a maior)
    - A principio não da para pagar menos

- Transações avulsas também disparam o webhook, cria um pedido e vincula a cobrança

# Dúvidas
- Vamos utilizar um webhook geral ou um para cada cliente?
- O que acontece se a transação falhar?
    - Não é disparado nenhum webhook, é tudo controlado no POS


