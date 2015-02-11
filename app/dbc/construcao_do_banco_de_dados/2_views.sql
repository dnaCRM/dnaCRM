----------------------------------------------------------------------------
-- Seleciona ArrayDados para Estudante
DROP VIEW IF EXISTS vs_estudantes;
CREATE VIEW vs_estudantes AS
  SELECT
    if.cd_info_estudos,
    pf.cd_pessoa_fisica,
    pf.nm_pessoa_fisica AS estudante,
    CASE
    WHEN pf.im_perfil IS NULL
    THEN 'img/uploads/tb_pessoa_fisica/default.jpg'
    ELSE 'img/uploads/tb_pessoa_fisica/' || pf.im_perfil || '.jpg'
    END as foto_estudante,
    pj.cd_pessoa_juridica,
    pj.nm_fantasia AS instituicao,
    CASE WHEN pj.im_perfil IS NULL
    THEN 'img/uploads/tb_pessoa_juridica/default_pj.jpg'
    ELSE 'img/uploads/tb_pessoa_juridica/'||pj.im_perfil||'.jpg'
    END AS foto_intituicao,
    cv_c.id_curso,
    cv_c.curso,
    cv_c.id_area,
    cv_c.area,
    cv_p.cd_vl_categoria AS cd_periodo,
    cv_p.desc_vl_catg AS periodo,
    to_char(dt_inicio,'DD/MM/YYYY') AS dt_inicio,
    to_char(dt_fim, 'DD/MM/YYYY') as dt_fim,
    extract(YEAR FROM age(dt_fim,dt_inicio)) + 1 as duracao,
    extract(YEAR FROM age(now(), dt_inicio)) + 1 as ano_atual
  FROM tb_info_estudos if
    LEFT OUTER JOIN tb_pessoa_fisica pf
      ON (if.cd_pessoa_fisica = pf.cd_pessoa_fisica)
    LEFT OUTER JOIN tb_pessoa_juridica pj
      ON (if.cd_pessoa_juridica = pj.cd_pessoa_juridica)
    LEFT OUTER JOIN (
                      SELECT
                        c.cd_vl_categoria as id_curso,
                        c.desc_vl_catg as curso,
                        g.cd_vl_categoria as id_area,
                        g.desc_vl_catg as area
                      FROM tb_categoria_valor c
                        LEFT OUTER JOIN tb_categoria_valor g
                          ON (c.cd_grupo = g.cd_vl_categoria)
                    ) AS cv_c
      ON (if.cd_vl_catg_curso = cv_c.id_curso)
    LEFT OUTER JOIN tb_categoria_valor cv_p
      ON (if.cd_vl_catg_periodo = cv_p.cd_vl_categoria)
;

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

----------------------------------------------------------------------------
-- Seleciona ArrayDados para Pessoa Física
DROP VIEW IF EXISTS vs_pessoa_fisica_dados;
CREATE VIEW vs_pessoa_fisica_dados AS
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
    es.sigla                        AS uf_rg,
    pf.email,
    extract(YEAR FROM age(pf.dt_nascimento))  AS idade,
    to_char(pf.dt_nascimento, 'DD/MM/YYYY')   AS dt_nascimento,
    CASE pf.ie_sexo
    WHEN 'M' THEN 'Masculino'
    WHEN 'F' THEN 'Feminino'
    ELSE NULL
    END                                       AS ie_sexo
  FROM tb_pessoa_fisica pf
    LEFT OUTER JOIN tb_pessoa_juridica pj
      ON (pf.cd_pessoa_juridica = pj.cd_pessoa_juridica)
    LEFT OUTER JOIN tb_profissao pr
      ON (pf.cd_profissao = pr.cd_profissao)
    LEFT OUTER JOIN tb_estados es
      ON (pf.uf_rg = es.id)
    LEFT OUTER JOIN (SELECT ci.*, est.nome, est.sigla
                     FROM tb_cidades ci
                       LEFT OUTER JOIN tb_estados est
                         ON (ci.estado_id = est.id)
                    ) co
      ON (pf.cd_cidade_origem = co.id)
  WHERE pf.cd_pessoa_fisica < 999;