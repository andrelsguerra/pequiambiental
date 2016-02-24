/*Responsável em buscar os funcionarios e concatenar os telefones*/

SELECT * , (
concat( F_dddC, F_Celular )
) AS DS_TELEFONE_PESSOAL, (
concat( F_dddB, F_Ramal )
) AS DS_TELEFONE_BIOS, (
concat( F_dddF, F_contatof )
) AS NR_TELEFONE_CONTATO_FAMILIAR
FROM `tblfunc`