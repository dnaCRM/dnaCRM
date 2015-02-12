-- ANIVERSARIANTES DO DIA
SELECT
  *
FROM tb_pessoa_fisica
WHERE date_part('day', dt_nascimento) = (SELECT
                                           DATE_PART('DAY', CURRENT_TIMESTAMP))
      AND date_part('month', dt_nascimento) = (SELECT
                                                 DATE_PART('MONTH', CURRENT_TIMESTAMP))
ORDER BY nm_pessoa_fisica;

-- ANIVERSARIANTES DO MÊS
SELECT
  *
FROM tb_pessoa_fisica
WHERE date_part('month', dt_nascimento) = (SELECT
                                             DATE_PART('MONTH', CURRENT_TIMESTAMP))
ORDER BY nm_pessoa_fisica;

-- APARTAMENTOS VAZIOS
SELECT
  ap.*,
  me.*
FROM tb_setor ap
  LEFT OUTER JOIN tb_morador_endereco me
    ON (ap.cd_setor = me.cd_apartamento)
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
  ap.nm_setor,
  me.fg_residente
FROM tb_pessoa_fisica pf
  JOIN tb_morador_endereco me
    ON (pf.cd_pessoa_fisica = me.cd_pessoa_fisica)
  JOIN tb_setor ap
    ON (me.cd_apartamento = ap.cd_setor)
WHERE me.dt_saida IS NULL
-- Residentes
-- AND me.fg_residente = 'S'
-- Não Residentes
-- AND me.fg_residente = 'N';

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
  pj.nm_fantasia                           AS empresa,
  pf.cd_profissao,
  pr.nm_profissao                          AS profissao,
  pf.nm_pessoa_fisica,
  CASE
  WHEN pf.im_perfil IS NULL
  THEN 'img/uploads/tb_pessoa_fisica/default.jpg'
  ELSE 'img/uploads/tb_pessoa_fisica/' || pf.im_perfil || '.jpg'
  END                                      AS im_perfil,
  pf.cpf,
  pf.rg,
  es.sigla                                 AS uf_rg,
  pf.email,
  extract(YEAR FROM age(pf.dt_nascimento)) AS idade,
  to_char(pf.dt_nascimento, 'DD/MM/YYYY')  AS dt_nascimento,
  CASE pf.ie_sexo
  WHEN 'M' THEN 'Masculino'
  WHEN 'F' THEN 'Feminino'
  ELSE NULL
  END                                      AS ie_sexo
FROM tb_pessoa_fisica pf
  LEFT OUTER JOIN tb_pessoa_juridica pj
    ON (pf.cd_pessoa_juridica = pj.cd_pessoa_juridica)
  LEFT OUTER JOIN tb_profissao pr
    ON (pf.cd_profissao = pr.cd_profissao)
  LEFT OUTER JOIN tb_estados es
    ON (pf.uf_rg = es.id)
  LEFT OUTER JOIN (SELECT
                     ci.*,
                     est.nome,
                     est.sigla
                   FROM tb_cidades ci
                     LEFT OUTER JOIN tb_estados est
                       ON (ci.estado_id = est.id)
                  ) co
    ON (pf.cd_cidade_origem = co.id)
WHERE pf.cd_pessoa_fisica < 999;

----------------------------------------------------------------------------
-- Cursos e Áreas
SELECT
  c.cd_vl_categoria AS id_curso,
  c.desc_vl_catg    AS curso,
  g.cd_vl_categoria AS id_area,
  g.desc_vl_catg    AS area
FROM tb_categoria_valor c
  JOIN tb_categoria_valor g
    ON (c.cd_grupo = g.cd_vl_categoria);
----------------------------------------------------------------------------
-- Atualiza todos os cursos para Humanas
UPDATE tb_categoria_valor
SET
  cd_grupo     = 165,
  cd_cat_grupo = 19
WHERE cd_categoria = 14;

----------------------------------------------------------------------------
-- Retorna duração do curso
SELECT
  extract(YEAR FROM age(dt_fim, dt_inicio)) + 1 AS duracao
FROM tb_info_estudos
WHERE cd_pessoa_fisica IS NOT NULL;
----------------------------------------------------------------------------
-- Ano atual o qual está cursando
SELECT
  extract(YEAR FROM age(now(), dt_inicio)) + 1 AS cursando
FROM tb_info_estudos
WHERE cd_pessoa_fisica IS NOT NULL;