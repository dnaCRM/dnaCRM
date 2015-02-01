-- APARTAMENTOS VAZIOS
SELECT
  ap.*,
  me.*
FROM tb_apartamento ap
  JOIN tb_morador_endereco me
    ON (ap.cd_apartamento = me.cd_apartamento)
WHERE me.dt_saida IS NOT NULL;

-- MORADORES
SELECT
  pf.cd_pessoa_fisica,
  pf.nm_pessoa_fisica,
  CASE
  WHEN pf.im_perfil IS NULL
  THEN 'img/uploads/tb_pessoa_fisica/default.jpg'
  ELSE 'img/uploads/tb_pessoa_fisica/' || pf.im_perfil || '.jpg'
  END AS im_perfil,
  ap.desc_apartamento
FROM tb_pessoa_fisica pf
  JOIN tb_morador_endereco me
    ON (pf.cd_pessoa_fisica = me.cd_pessoa_fisica)
  JOIN tb_apartamento ap
    ON (me.cd_apartamento = ap.cd_apartamento)
WHERE me.dt_saida IS NULL;

-- IDADE
SELECT
  pf.nm_pessoa_fisica,
  extract(YEAR FROM age(pf.dt_nascimento))
FROM tb_pessoa_fisica pf
WHERE pf.cd_pessoa_fisica = 3;

-- ARRAY DADOS PESSOA FÍSICA
SELECT
  pf.cd_pessoa_fisica,
  pf.cd_pessoa_juridica,
  pj.nm_fantasia                            AS empresa,
  pf.cd_profissao,
  pr.nm_profissao                           AS profissao,
  pf.nm_pessoa_fisica,
  CASE
  WHEN pf.im_perfil IS NULL
  THEN 'img/uploads/tb_pessoa_fisica/default.jpg'
  ELSE 'img/uploads/tb_pessoa_fisica/' || pf.im_perfil || '.jpg'
  END                                       AS im_perfil,
  pf.cpf,
  pf.rg,
  cv_uf.desc_vl_catg                        AS uf,
  pf.cd_catg_org_rg,
  pf.cd_vl_catg_org_rg,
  pf.email,
  extract(YEAR FROM age(pf.dt_nascimento))  AS idade,
  to_char(pf.dt_nascimento, 'DD/MM/YYYY')   AS dt_nascimento,
  CASE pf.ie_sexo
  WHEN 'M' THEN 'Masculino'
  WHEN 'F' THEN 'Feminino'
  ELSE NULL
  END                                       AS ie_sexo,
  CASE pf.ie_estuda
  WHEN 's' THEN 'Sim'
  WHEN 'n' THEN 'Não'
  ELSE NULL
  END                                       AS ie_estuda,
  pf.cd_instituicao,
  inst.nm_fantasia                          AS instituicao,
  to_char(pf.dt_inicio_curso, 'DD/MM/YYYY') AS dt_inicio_curso,
  to_char(pf.dt_fim_curso, 'DD/MM/YYYY')    AS dt_fim_curso,
  cv_grau.desc_vl_catg                      AS grau,
  pf.cd_catg_grau_ensino,
  pf.cd_vl_catg_grau_ensino
FROM tb_pessoa_fisica pf
  LEFT OUTER JOIN tb_pessoa_juridica pj ON (pf.cd_pessoa_juridica = pj.cd_pessoa_juridica)
  LEFT OUTER JOIN tb_profissao pr ON (pf.cd_profissao = pr.cd_profissao)
  LEFT OUTER JOIN tb_categoria_valor cv_uf ON (pf.cd_vl_catg_org_rg = cv_uf.cd_vl_categoria)
  LEFT OUTER JOIN tb_pessoa_juridica inst ON (pf.cd_instituicao = inst.cd_pessoa_juridica)
  LEFT OUTER JOIN tb_categoria_valor cv_grau ON (pf.cd_vl_catg_grau_ensino = cv_grau.cd_vl_categoria)
WHERE pf.cd_pessoa_fisica < 999;