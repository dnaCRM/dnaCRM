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
-- Seleciona ArrayDados para Estudante
DROP VIEW IF EXISTS vs_estudantes;
CREATE VIEW vs_estudantes AS
  SELECT
    if.cd_info_estudos,
    pf.cd_pessoa_fisica,
    pf.nm_pessoa_fisica AS estudante,
    pj.cd_pessoa_juridica,
    pj.nm_fantasia AS instituicao,
    cv_c.id_curso,
    cv_c.curso,
    cv_c.id_area,
    cv_c.area,
    cv_p.cd_vl_categoria AS cd_periodo,
    cv_p.desc_vl_catg AS periodo,
    to_char(dt_inicio,'DD/MM/YYYY') AS dt_inicio,
    to_char(dt_fim, 'DD/MM/YYYY') as dt_fim
  FROM tb_info_estudos if
    JOIN tb_pessoa_fisica pf
      ON (if.cd_pessoa_fisica = pf.cd_pessoa_fisica)
    JOIN tb_pessoa_juridica pj
      ON (if.cd_pessoa_juridica = pj.cd_pessoa_juridica)
    JOIN (
           SELECT
             c.cd_vl_categoria as id_curso,
             c.desc_vl_catg as curso,
             g.cd_vl_categoria as id_area,
             g.desc_vl_catg as area

           FROM tb_categoria_valor c
             JOIN tb_categoria_valor g
               ON (c.cd_grupo = g.cd_vl_categoria)
         ) AS cv_c
      ON (if.cd_vl_catg_curso = cv_c.id_curso)
    JOIN tb_categoria_valor cv_p
      ON (if.cd_vl_catg_periodo = cv_p.cd_vl_categoria)
;

SELECT *
FROM vs_estudantes;

----------------------------------------------------------------------------
-- Seleciona ArrayDados para Ocorrência
DROP VIEW IF EXISTS vs_full_ocorrencia;
CREATE VIEW vs_full_ocorrencia AS
  SELECT
    oc.cd_ocorrencia,
    oc.cd_setor,
    se.nm_setor AS setor,
    CASE WHEN se.im_perfil IS NULL
    THEN 'img/uploads/tb_setor/default_setor.jpg'
    ELSE 'img/uploads/tb_setor/'||se.im_perfil||'.jpg'
    END AS setor_foto,
    se.cd_condominio,
    pj.nm_fantasia AS condominio,
    CASE WHEN se.im_perfil IS NULL
    THEN 'img/uploads/tb_pessoa_juridica/default_pj.jpg'
    ELSE 'img/uploads/tb_pessoa_juridica/'||pj.im_perfil||'.jpg'
    END AS condominio_foto,
    pf.cd_pessoa_fisica AS cd_pf_informante,
    pf.nm_pessoa_fisica AS informante,
    oc.desc_assunto,
    oc.desc_ocorrencia,
    TO_CHAR(oc.dt_ocorrencia,'DD/MM/YYYY') AS dt_ocorrencia,
    TO_CHAR(oc.dt_fim,'DD/MM/YYYY') AS dt_fim,
    oc.desc_conclusao,
    oc.cd_catg_estagio,
    oc.cd_vl_catg_estagio,
    cve.desc_vl_catg AS estagio,
    oc.cd_catg_tipo,
    oc.cd_vl_catg_tipo,
    cvt.desc_vl_catg AS tipo
  FROM tb_ocorrencia oc
    LEFT OUTER JOIN tb_categoria_valor cve
      ON (oc.cd_vl_catg_estagio = cve.cd_vl_categoria)
    LEFT OUTER JOIN tb_categoria_valor cvt
      ON (oc.cd_vl_catg_tipo = cvt.cd_vl_categoria)
    LEFT OUTER JOIN tb_setor se
      ON (oc.cd_setor = se.cd_setor)
    LEFT OUTER JOIN tb_pessoa_juridica pj
      ON (se.cd_condominio = pj.cd_pessoa_juridica)
    LEFT OUTER JOIN tb_pessoa_fisica pf
      ON (oc.cd_pf_informante = pf.cd_pessoa_fisica)
;
