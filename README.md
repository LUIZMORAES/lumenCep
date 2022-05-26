## LUMEN Microserviço - Pesquisa de grupo de cep

Criação de uma *API* para realizar a consulta de vários *CEPs* no *[ViaCEP](https://viacep.com.br/)* e fazer o retorno dos dados da maneira proposta. 

1. Crie um novo projeto de *API* em [Lumen](https://lumen.laravel.com/docs/9.x) ou [Laravel](https://laravel.com/), nele defina uma nova rota *GET* correspondente a o caminho `/search/local/CEP-1,CEP-2…`.
2. No controlador dessa rota use a *API* do [ViaCEP](https://viacep.com.br/) para realizar e armazenar em *array* a consulta de cada.
3. Reorganize os dados dos endereços para que quando acessado `/search/local/01001000,17560-246` a *API* retorne um *JSON*.
