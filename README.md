# Descrição

Aplicação feita em PHP puro e padrão MVC, feita com uso da bibliotéca https://fullcalendar.io, permitindo aos usuários e administrador gerenciarem seus agendamentos por meio de uma interface de calendário integrada ao sistema. O sistema de agendametos ( cliente X administrador ) é feito por envio de emails via PHPMailer.

# Como funciona?

O usuário escolhe a data e hora de seu agendamento pelo calendário integrado ao sistema e tais informações são enviadas ao email do administrador ( dono ). Caso o dono aceite, clicando no link em seu email, que contém na URL as informações escolhidas pelo usuário, esse link uma vez acessado, irá salvar no banco de dados SQL as informões de agendamento do cliente. As informações de agendamento só serão salvas se o administrador estiver logado e se não houver um mesmo registro no bando de dados, pois o sistema verifica tais condições antes de salvar.
Uma vez salvo o agendamento, o dia e horário escolhidos pelo cliente ficarão indisponíveis para outro cliente escolher, podendo ser escolhidos novamente apenas se o dono deletar o registro do banco de dados, tal possibilidade é dada ao dono em uma página de gerenciamento de agendamentos, onde ele tem acesso a todos agendmentos ativos e pode deletá-los.

# Tecnologias usadas
![Badge](https://img.shields.io/badge/PHP-6D42E8)
![Badge](https://img.shields.io/badge/SQL-FFFFFF)
![Badge](https://img.shields.io/badge/JavaScript-FFFF00)
![Badge](https://img.shields.io/badge/jQuery-243643)
![Badge](https://img.shields.io/badge/Bootstrap-6E2BF2)

![vv](https://github.com/WelerM/PHP-schedule-system-MVC/assets/99507279/55d9233a-dc15-40e1-a8fc-08cdd9c90bb7)

![fefefefe](https://github.com/WelerM/PHP-schedule-system-MVC/assets/99507279/8d98e886-6e21-471d-89fd-9ef8ded1d1cc)

![teste](https://github.com/WelerM/PHP-schedule-system-MVC/assets/99507279/af5d3857-2693-4938-bc42-8929d87bc6bd)
