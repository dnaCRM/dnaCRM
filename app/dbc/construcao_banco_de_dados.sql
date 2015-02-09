----------------------------- Tabelas do Banco -----------------------------
-- Configurar servidor PostgreSQL para timezone correto;
-- Utilizango psql (terminal)
-- set timezone = 'America/Sao_Paulo';
-- Para exibir a configura��o
-- show timezone
CREATE TABLE tb_cidades (
  id integer NOT NULL,
  nome character varying,
  codigo_ibge integer,
  estado_id integer,
  populacao_2010 integer,
  densidade_demo numeric,
  gentilico character varying(250),
  area numeric
);

CREATE SEQUENCE tb_cidades_id_seq
START WITH 1
INCREMENT BY 1
MINVALUE 0
NO MAXVALUE
CACHE 1;



ALTER SEQUENCE tb_cidades_id_seq OWNED BY tb_cidades.id;

SELECT pg_catalog.setval('tb_cidades_id_seq', 5565, true);

CREATE TABLE tb_estados (
  id integer NOT NULL,
  nome character varying,
  sigla character varying
);

CREATE SEQUENCE tb_estados_id_seq
START WITH 1
INCREMENT BY 1
MINVALUE 0
NO MAXVALUE
CACHE 1;

ALTER SEQUENCE tb_estados_id_seq OWNED BY tb_estados.id;

SELECT pg_catalog.setval('tb_estados_id_seq', 27, true);

ALTER TABLE ONLY tb_cidades ALTER COLUMN id SET DEFAULT nextval('tb_cidades_id_seq'::regclass);

ALTER TABLE ONLY tb_estados ALTER COLUMN id SET DEFAULT nextval('tb_estados_id_seq'::regclass);


INSERT INTO tb_cidades VALUES (3, 'Brasil�ia', 120010, 1, 21398, 5.46, 'brasileense', 3916.507);
INSERT INTO tb_cidades VALUES (5, 'Capixaba', 120017, 1, 8798, 5.17, 'capixabense', 1702.581);
INSERT INTO tb_cidades VALUES (7, 'Epitaciol�ndia', 120025, 1, 15100, 9.13, 'epitaciolandense', 1654.773);
INSERT INTO tb_cidades VALUES (8, 'Feij�', 120030, 1, 32412, 1.16, 'feijoense', 27974.551);
INSERT INTO tb_cidades VALUES (10, 'M�ncio Lima', 120033, 1, 15206, 2.79, 'mancio-limense', 5453.042);
INSERT INTO tb_cidades VALUES (12, 'Marechal Thaumaturgo', 120035, 1, 14227, 1.74, 'thaumaturguense', 8191.728);
INSERT INTO tb_cidades VALUES (14, 'Porto Acre', 120080, 1, 14880, 5.71, 'portoacrense', 2604.725);
INSERT INTO tb_cidades VALUES (15, 'Porto Walter', 120039, 1, 9176, 1.42, 'portowaltense', 6443.851);
INSERT INTO tb_cidades VALUES (17, 'Rodrigues Alves', 120042, 1, 14389, 4.68, 'rodriguesalvense', 3076.99);
INSERT INTO tb_cidades VALUES (19, 'Sena Madureira', 120050, 1, 38029, 1.6, 'sena-madureirense', 23751.268);
INSERT INTO tb_cidades VALUES (21, 'Tarauac�', 120060, 1, 35590, 1.76, 'tarauacaense', 20171.019);
INSERT INTO tb_cidades VALUES (22, 'Xapuri', 120070, 1, 16091, 3.01, 'xapuriense', 5347.283);
INSERT INTO tb_cidades VALUES (24, 'Anadia', 270020, 2, 17424, 91.96, 'anadiense', 189.472);
INSERT INTO tb_cidades VALUES (26, 'Atalaia', 270040, 2, 44322, 83.82, 'atalaiense', 528.769);
INSERT INTO tb_cidades VALUES (28, 'Barra De S�o Miguel', 270060, 2, 7574, 98.86, 'barrense', 76.615);
INSERT INTO tb_cidades VALUES (29, 'Batalha', 270070, 2, 17076, 53.21, 'batalhense', 320.921);
INSERT INTO tb_cidades VALUES (31, 'Belo Monte', 270090, 2, 7030, 21.04, 'belo-montense', 334.145);
INSERT INTO tb_cidades VALUES (33, 'Branquinha', 270110, 2, 10583, 63.63, 'branquinhense', 166.322);
INSERT INTO tb_cidades VALUES (34, 'Cacimbinhas', 270120, 2, 10195, 37.35, 'cacimbense', 272.979);
INSERT INTO tb_cidades VALUES (36, 'Campestre', 270135, 2, 6598, 99.39, 'camprestrense', 66.385);
INSERT INTO tb_cidades VALUES (38, 'Campo Grande', 270150, 2, 9032, 53.98, 'campo-grandense', 167.32);
INSERT INTO tb_cidades VALUES (40, 'Capela', 270170, 2, 17077, 70.39, 'capelense', 242.617);
INSERT INTO tb_cidades VALUES (41, 'Carneiros', 270180, 2, 8290, 73.32, 'carneirense', 113.061);
INSERT INTO tb_cidades VALUES (43, 'Coit� Do N�ia', 270200, 2, 10926, 123.45, 'coitenense', 88.509);
INSERT INTO tb_cidades VALUES (45, 'Coqueiro Seco', 270220, 2, 5526, 139.09, 'coqueirense', 39.729);
INSERT INTO tb_cidades VALUES (47, 'Cra�bas', 270235, 2, 22641, 83.44, 'craibense', 271.332);
INSERT INTO tb_cidades VALUES (49, 'Dois Riachos', 270250, 2, 10880, 77.45, 'riachense', 140.474);
INSERT INTO tb_cidades VALUES (50, 'Estrela De Alagoas', 270255, 2, 17251, 66.41, 'estrelense', 259.767);
INSERT INTO tb_cidades VALUES (52, 'Feliz Deserto', 270270, 2, 4345, 47.31, 'feliz-desertense', 91.839);
INSERT INTO tb_cidades VALUES (54, 'Girau Do Ponciano', 270290, 2, 36600, 73.11, 'ponciense', 500.618);
INSERT INTO tb_cidades VALUES (55, 'Ibateguara', 270300, 2, 15149, 57.1, 'ibateguarense', 265.313);
INSERT INTO tb_cidades VALUES (57, 'Igreja Nova', 270320, 2, 23292, 54.55, 'igreja-novense', 426.976);
INSERT INTO tb_cidades VALUES (59, 'Jacar� Dos Homens', 270340, 2, 5413, 38.03, 'jacarezeiro', 142.34);
INSERT INTO tb_cidades VALUES (61, 'Japaratinga', 270360, 2, 7754, 90.22, 'japaratinguense', 85.948);
INSERT INTO tb_cidades VALUES (63, 'Jequi� Da Praia', 270375, 2, 12029, 34.21, 'jequiaenses', 351.611);
INSERT INTO tb_cidades VALUES (64, 'Joaquim Gomes', 270380, 2, 22575, 75.68, 'juruquense', 298.288);
INSERT INTO tb_cidades VALUES (66, 'Junqueiro', 270400, 2, 23836, 98.66, 'junqueirense', 241.592);
INSERT INTO tb_cidades VALUES (68, 'Limoeiro De Anadia', 270420, 2, 26992, 85.48, 'limoeirense', 315.777);
INSERT INTO tb_cidades VALUES (70, 'Major Isidoro', 270440, 2, 18897, 41.63, 'isidorense', 453.893);
INSERT INTO tb_cidades VALUES (71, 'Mar Vermelho', 270490, 2, 3652, 39.23, 'mar-vermelhense', 93.102);
INSERT INTO tb_cidades VALUES (73, 'Maravilha', 270460, 2, 10284, 34.05, 'maravilhense', 302.056);
INSERT INTO tb_cidades VALUES (75, 'Maribondo', 270480, 2, 13619, 78.14, 'maribondense', 174.28);
INSERT INTO tb_cidades VALUES (77, 'Matriz De Camaragibe', 270510, 2, 23785, 108.12, 'matrizense', 219.99);
INSERT INTO tb_cidades VALUES (78, 'Messias', 270520, 2, 15682, 137.77, 'messiense', 113.825);
INSERT INTO tb_cidades VALUES (80, 'Monteir�polis', 270540, 2, 6935, 80.54, 'guaribense', 86.103);
INSERT INTO tb_cidades VALUES (82, 'Novo Lino', 270560, 2, 12060, 51.67, 'novo-linense', 233.408);
INSERT INTO tb_cidades VALUES (84, 'Olho D`�gua Do Casado', 270580, 2, 8491, 26.29, 'casadense', 322.944);
INSERT INTO tb_cidades VALUES (85, 'Olho D`�gua Grande', 270590, 2, 4957, 41.83, 'olho-grandense', 118.509);
INSERT INTO tb_cidades VALUES (87, 'Ouro Branco', 270610, 2, 10912, 53.29, 'ouro-branquense', 204.771);
INSERT INTO tb_cidades VALUES (89, 'Palmeira Dos �ndios', 270630, 2, 70368, 155.44, 'palmeirense', 452.703);
INSERT INTO tb_cidades VALUES (91, 'Pariconha', 270642, 2, 10264, 39.7, 'pariconhense', 258.524);
INSERT INTO tb_cidades VALUES (92, 'Paripueira', 270644, 2, 11347, 122.05, 'paripueirense', 92.972);
INSERT INTO tb_cidades VALUES (94, 'Paulo Jacinto', 270660, 2, 7426, 62.69, 'paulo-jacintense', 118.457);
INSERT INTO tb_cidades VALUES (96, 'Pia�abu�u', 270680, 2, 17203, 71.68, 'pia�abu�uense', 240.013);
INSERT INTO tb_cidades VALUES (97, 'Pilar', 270690, 2, 33305, 133.37, 'pilarense', 249.713);
INSERT INTO tb_cidades VALUES (99, 'Piranhas', 270710, 2, 23045, 56.47, 'piranhense', 408.105);
INSERT INTO tb_cidades VALUES (101, 'Porto Calvo', 270730, 2, 25708, 83.49, 'porto-calvense', 307.914);
INSERT INTO tb_cidades VALUES (103, 'Porto Real Do Col�gio', 270750, 2, 19334, 79.91, 'colegiense', 241.939);
INSERT INTO tb_cidades VALUES (104, 'Quebrangulo', 270760, 2, 11480, 35.89, 'quebrangulense', 319.831);
INSERT INTO tb_cidades VALUES (106, 'Roteiro', 270780, 2, 6656, 51.48, 'roteirense', 129.289);
INSERT INTO tb_cidades VALUES (108, 'Santana Do Ipanema', 270800, 2, 44932, 102.61, 'santanense', 437.875);
INSERT INTO tb_cidades VALUES (109, 'Santana Do Munda�', 270810, 2, 10961, 48.76, 'mundauense', 224.811);
INSERT INTO tb_cidades VALUES (111, 'S�o Jos� Da Laje', 270830, 2, 22686, 88.4, 'lajense', 256.641);
INSERT INTO tb_cidades VALUES (113, 'S�o Lu�s Do Quitunde', 270850, 2, 32412, 81.61, 'quitundense', 397.173);
INSERT INTO tb_cidades VALUES (114, 'S�o Miguel Dos Campos', 270860, 2, 54577, 151.27, 'miguelense', 360.791);
INSERT INTO tb_cidades VALUES (116, 'S�o Sebasti�o', 270880, 2, 32010, 101.59, 'salomeense', 315.103);
INSERT INTO tb_cidades VALUES (117, 'Satuba', 270890, 2, 14603, 342.57, 'satubense', 42.628);
INSERT INTO tb_cidades VALUES (119, 'Tanque D`Arca', 270900, 2, 6122, 47.27, 'tanquense', 129.508);
INSERT INTO tb_cidades VALUES (121, 'Teot�nio Vilela', 270915, 2, 41152, 138.15, 'vilelano', 297.88);
INSERT INTO tb_cidades VALUES (122, 'Traipu', 270920, 2, 25702, 36.82, 'traipusense', 697.963);
INSERT INTO tb_cidades VALUES (124, 'Vi�osa', 270940, 2, 25407, 74, 'vi�osense', 343.356);
INSERT INTO tb_cidades VALUES (126, 'Amatur�', 130006, 3, 9467, 1.99, 'amaturaense', 4758.748);
INSERT INTO tb_cidades VALUES (2713, 'Princesa Isabel', 251230, 15, 21283, 57.84, 'princesense', 367.973);
INSERT INTO tb_cidades VALUES (129, 'Apu�', 130014, 3, 18007, 0.33, 'apuiense', 54239.911);
INSERT INTO tb_cidades VALUES (131, 'Autazes', 130030, 3, 32135, 4.23, 'autazense', 7599.353);
INSERT INTO tb_cidades VALUES (132, 'Barcelos', 130040, 3, 25718, 0.21, 'barcelense', 122476.006);
INSERT INTO tb_cidades VALUES (134, 'Benjamin Constant', 130060, 3, 33411, 3.8, 'benjamin-constantense', 8793.422);
INSERT INTO tb_cidades VALUES (136, 'Boa Vista Do Ramos', 130068, 3, 14979, 5.79, 'boa-vistense', 2586.841);
INSERT INTO tb_cidades VALUES (138, 'Borba', 130080, 3, 34961, 0.79, 'borbense', 44251.701);
INSERT INTO tb_cidades VALUES (140, 'Canutama', 130090, 3, 12738, 0.43, 'canutamense', 29819.725);
INSERT INTO tb_cidades VALUES (141, 'Carauari', 130100, 3, 25774, 1, 'carauariense', 25767.709);
INSERT INTO tb_cidades VALUES (143, 'Careiro Da V�rzea', 130115, 3, 23930, 9.09, 'careirense-da-v�rzea', 2631.141);
INSERT INTO tb_cidades VALUES (145, 'Codaj�s', 130130, 3, 23206, 1.24, 'codajasense', 18711.544);
INSERT INTO tb_cidades VALUES (147, 'Envira', 130150, 3, 16338, 2.18, 'envirense', 7499.426);
INSERT INTO tb_cidades VALUES (149, 'Guajar�', 130165, 3, 13974, 1.84, 'guajaraense', 7579.603);
INSERT INTO tb_cidades VALUES (150, 'Humait�', 130170, 3, 44227, 1.34, 'humaitaense', 33071.803);
INSERT INTO tb_cidades VALUES (152, 'Iranduba', 130185, 3, 40781, 18.42, 'irandubense', 2214.25);
INSERT INTO tb_cidades VALUES (154, 'Itamarati', 130195, 3, 8038, 0.32, 'itamaratiense', 25275.968);
INSERT INTO tb_cidades VALUES (156, 'Japur�', 130210, 3, 7326, 0.13, 'japuraense', 55791.877);
INSERT INTO tb_cidades VALUES (158, 'Juta�', 130230, 3, 17992, 0.26, 'jutaiense', 69551.928);
INSERT INTO tb_cidades VALUES (159, 'L�brea', 130240, 3, 37701, 0.55, 'labrense', 68233.961);
INSERT INTO tb_cidades VALUES (161, 'Manaquiri', 130255, 3, 22801, 5.73, 'manaquirense', 3975.766);
INSERT INTO tb_cidades VALUES (163, 'Manicor�', 130270, 3, 47017, 0.97, 'manicoreense', 48282.659);
INSERT INTO tb_cidades VALUES (165, 'Mau�s', 130290, 3, 52236, 1.31, 'maueense', 39989.873);
INSERT INTO tb_cidades VALUES (166, 'Nhamund�', 130300, 3, 18278, 1.3, 'nhamundaense', 14105.553);
INSERT INTO tb_cidades VALUES (168, 'Novo Air�o', 130320, 3, 14723, 0.39, 'novo-air�oense', 37771.337);
INSERT INTO tb_cidades VALUES (170, 'Parintins', 130340, 3, 102033, 17.14, 'parintinense', 5952.378);
INSERT INTO tb_cidades VALUES (171, 'Pauini', 130350, 3, 18166, 0.44, 'pauiniense', 41610.271);
INSERT INTO tb_cidades VALUES (173, 'Rio Preto Da Eva', 130356, 3, 25719, 4.42, 'rio-pretense', 5813.216);
INSERT INTO tb_cidades VALUES (175, 'Santo Ant�nio Do I��', 130370, 3, 24481, 1.99, 'santoense', 12307.205);
INSERT INTO tb_cidades VALUES (177, 'S�o Paulo De Oliven�a', 130390, 3, 31422, 1.59, 'paulivense', 19745.931);
INSERT INTO tb_cidades VALUES (178, 'S�o Sebasti�o Do Uatum�', 130395, 3, 10705, 1, 'uatumaense', 10741.06);
INSERT INTO tb_cidades VALUES (179, 'Silves', 130400, 3, 8444, 2.25, 'silvense', 3748.826);
INSERT INTO tb_cidades VALUES (181, 'Tapau�', 130410, 3, 19077, 0.21, 'tapauense', 89325.274);
INSERT INTO tb_cidades VALUES (183, 'Tonantins', 130423, 3, 17079, 2.66, 'tonantinense', 6432.682);
INSERT INTO tb_cidades VALUES (185, 'Urucar�', 130430, 3, 17094, 0.61, 'urucaraense', 27903.372);
INSERT INTO tb_cidades VALUES (187, 'Amap�', 160010, 4, 8069, 0.88, 'amapaense', 9175.945);
INSERT INTO tb_cidades VALUES (188, 'Cal�oene', 160020, 4, 9000, 0.63, 'cal�oenense', 14269.299);
INSERT INTO tb_cidades VALUES (190, 'Ferreira Gomes', 160023, 4, 5802, 1.15, 'ferreirense', 5046.236);
INSERT INTO tb_cidades VALUES (192, 'Laranjal Do Jari', 160027, 4, 39942, 1.29, 'laranjalense', 30971.775);
INSERT INTO tb_cidades VALUES (194, 'Mazag�o', 160040, 4, 17032, 1.3, 'mazaganistas', 13130.93);
INSERT INTO tb_cidades VALUES (196, 'Pedra Branca Do Amapar�', 160015, 4, 10772, 1.13, 'pedrabrancanienses', 9495.48);
INSERT INTO tb_cidades VALUES (198, 'Pracu�ba', 160055, 4, 3793, 0.77, 'pracuubenses', 4956.454);
INSERT INTO tb_cidades VALUES (199, 'Santana', 160060, 4, 101262, 64.11, 'santanenses', 1579.6);
INSERT INTO tb_cidades VALUES (201, 'Tartarugalzinho', 160070, 4, 12563, 1.87, 'tartarugalense', 6709.632);
INSERT INTO tb_cidades VALUES (203, 'Aba�ra', 290010, 5, 8316, 15.68, 'abairense', 530.494);
INSERT INTO tb_cidades VALUES (204, 'Abar�', 290020, 5, 17064, 11.49, 'abareense', 1484.961);
INSERT INTO tb_cidades VALUES (206, 'Adustina', 290035, 5, 15702, 24.84, 'adustinense', 632.14);
INSERT INTO tb_cidades VALUES (208, 'Aiquara', 290060, 5, 4602, 28.82, 'aiquarense', 159.691);
INSERT INTO tb_cidades VALUES (210, 'Alcoba�a', 290080, 5, 21271, 14.36, 'alcobacense', 1481.265);
INSERT INTO tb_cidades VALUES (211, 'Almadina', 290090, 5, 6357, 25.32, 'almadinense', 251.11);
INSERT INTO tb_cidades VALUES (213, 'Am�lia Rodrigues', 290110, 5, 25190, 145.2, 'ameliense', 173.484);
INSERT INTO tb_cidades VALUES (215, 'Anag�', 290120, 5, 25516, 13.1, 'anageense', 1947.358);
INSERT INTO tb_cidades VALUES (217, 'Andorinha', 290135, 5, 14414, 11.55, 'andorinhense', 1247.623);
INSERT INTO tb_cidades VALUES (218, 'Angical', 290140, 5, 14073, 9.21, 'angicalense', 1527.945);
INSERT INTO tb_cidades VALUES (220, 'Antas', 290160, 5, 17072, 53.42, 'antense', 319.602);
INSERT INTO tb_cidades VALUES (222, 'Ant�nio Gon�alves', 290180, 5, 11015, 35.09, 'ant�nio-gon�alvense', 313.937);
INSERT INTO tb_cidades VALUES (224, 'Apuarema', 290195, 5, 7459, 48.17, 'apuaremense', 154.857);
INSERT INTO tb_cidades VALUES (225, 'Ara�as', 290205, 5, 11561, 23.73, 'ara�aense', 487.121);
INSERT INTO tb_cidades VALUES (227, 'Araci', 290210, 5, 51651, 33.19, 'araciense', 1556.133);
INSERT INTO tb_cidades VALUES (229, 'Arataca', 290225, 5, 10392, 27.7, 'arataquense', 375.205);
INSERT INTO tb_cidades VALUES (231, 'Aurelino Leal', 290240, 5, 13595, 29.7, 'aurelinense', 457.783);
INSERT INTO tb_cidades VALUES (233, 'Baixa Grande', 290260, 5, 20060, 21.19, 'baixa-grandense', 946.649);
INSERT INTO tb_cidades VALUES (234, 'Banza�', 290265, 5, 11814, 51.99, 'banza�ense', 227.231);
INSERT INTO tb_cidades VALUES (236, 'Barra Da Estiva', 290280, 5, 21187, 15.73, 'barrestivense', 1346.632);
INSERT INTO tb_cidades VALUES (238, 'Barra Do Mendes', 290300, 5, 13987, 9.08, 'barra-mendense', 1540.645);
INSERT INTO tb_cidades VALUES (239, 'Barra Do Rocha', 290310, 5, 6313, 30.3, 'barra-rochense', 208.364);
INSERT INTO tb_cidades VALUES (241, 'Barro Alto', 290323, 5, 13612, 32.67, 'barro-altino', 416.676);
INSERT INTO tb_cidades VALUES (243, 'Barro Preto', 290330, 5, 6453, 50.26, 'barro-pretense', 128.38);
INSERT INTO tb_cidades VALUES (245, 'Belo Campo', 290350, 5, 16021, 25.47, 'belo-campense', 629.095);
INSERT INTO tb_cidades VALUES (246, 'Biritinga', 290360, 5, 14836, 26.97, 'biritinguense', 550.033);
INSERT INTO tb_cidades VALUES (248, 'Boa Vista Do Tupim', 290380, 5, 17991, 6.4, 'tupinense', 2811.146);
INSERT INTO tb_cidades VALUES (250, 'Bom Jesus Da Serra', 290395, 5, 10113, 23.99, 'bom-jesuense', 421.517);
INSERT INTO tb_cidades VALUES (252, 'Bonito', 290405, 5, 14834, 20.42, 'bonitense', 726.607);
INSERT INTO tb_cidades VALUES (253, 'Boquira', 290410, 5, 22037, 14.86, 'boquirense', 1482.704);
INSERT INTO tb_cidades VALUES (255, 'Brej�es', 290430, 5, 14282, 29.7, 'brejoense', 480.832);
INSERT INTO tb_cidades VALUES (2716, 'Quixab�', 251260, 15, 1699, 10.84, 'quixabense', 156.682);
INSERT INTO tb_cidades VALUES (258, 'Brumado', 290460, 5, 64602, 29.01, 'brumadense', 2226.818);
INSERT INTO tb_cidades VALUES (260, 'Buritirama', 290475, 5, 19600, 4.97, 'buritiramense', 3942.193);
INSERT INTO tb_cidades VALUES (262, 'Cabaceiras Do Paragua�u', 290485, 5, 17327, 76.66, 'cabaceirense', 226.022);
INSERT INTO tb_cidades VALUES (264, 'Cacul�', 290500, 5, 22236, 33.27, 'caculense', 668.367);
INSERT INTO tb_cidades VALUES (265, 'Ca�m', 290510, 5, 10368, 18.91, 'caenense', 548.147);
INSERT INTO tb_cidades VALUES (267, 'Caetit�', 290520, 5, 47515, 19.45, 'caetiteense', 2442.887);
INSERT INTO tb_cidades VALUES (269, 'Cairu', 290540, 5, 15374, 33.35, 'cairuense', 460.981);
INSERT INTO tb_cidades VALUES (271, 'Camacan', 290560, 5, 31472, 50.22, 'camacaense', 626.65);
INSERT INTO tb_cidades VALUES (272, 'Cama�ari', 290570, 5, 242970, 309.65, 'cama�ariense', 784.655);
INSERT INTO tb_cidades VALUES (275, 'Campo Formoso', 290600, 5, 66616, 9.18, 'campo-formosense', 7258.574);
INSERT INTO tb_cidades VALUES (276, 'Can�polis', 290610, 5, 9410, 21.52, 'canapolense', 437.212);
INSERT INTO tb_cidades VALUES (278, 'Canavieiras', 290630, 5, 32336, 24.37, 'canavieirense', 1326.954);
INSERT INTO tb_cidades VALUES (279, 'Candeal', 290640, 5, 8895, 19.99, 'candealense', 445.083);
INSERT INTO tb_cidades VALUES (281, 'Candiba', 290660, 5, 13210, 31.6, 'candibense', 417.975);
INSERT INTO tb_cidades VALUES (283, 'Cansan��o', 290680, 5, 32908, 24.47, 'cansan��oense', 1344.82);
INSERT INTO tb_cidades VALUES (285, 'Capela Do Alto Alegre', 290685, 5, 11527, 17.75, 'capelense', 649.473);
INSERT INTO tb_cidades VALUES (287, 'Cara�bas', 290689, 5, 10222, 12.69, 'caraibense', 805.627);
INSERT INTO tb_cidades VALUES (288, 'Caravelas', 290690, 5, 21414, 8.95, 'caravelense', 2393.442);
INSERT INTO tb_cidades VALUES (290, 'Carinhanha', 290710, 5, 28380, 10.37, 'carinhanhense', 2736.874);
INSERT INTO tb_cidades VALUES (292, 'Castro Alves', 290730, 5, 25408, 35.7, 'castro-alvense', 711.727);
INSERT INTO tb_cidades VALUES (293, 'Catol�ndia', 290740, 5, 2612, 4.06, 'catolandiano', 642.584);
INSERT INTO tb_cidades VALUES (295, 'Caturama', 290755, 5, 8843, 13.31, 'caturamense', 664.553);
INSERT INTO tb_cidades VALUES (297, 'Chorroch�', 290770, 5, 10734, 3.57, 'chorrochoense', 3005.31);
INSERT INTO tb_cidades VALUES (299, 'Cip�', 290790, 5, 15755, 122.79, 'cipoense', 128.312);
INSERT INTO tb_cidades VALUES (300, 'Coaraci', 290800, 5, 20964, 74.17, 'coaraciense', 282.648);
INSERT INTO tb_cidades VALUES (302, 'Concei��o Da Feira', 290820, 5, 20391, 125.18, 'concei�oense', 162.892);
INSERT INTO tb_cidades VALUES (304, 'Concei��o Do Coit�', 290840, 5, 62040, 61.06, 'coiteense', 1015.984);
INSERT INTO tb_cidades VALUES (306, 'Conde', 290860, 5, 23620, 24.48, 'condense', 964.673);
INSERT INTO tb_cidades VALUES (307, 'Conde�ba', 290870, 5, 16898, 13.14, 'condeubense', 1285.914);
INSERT INTO tb_cidades VALUES (309, 'Cora��o De Maria', 290890, 5, 22401, 64.34, 'mariense', 348.156);
INSERT INTO tb_cidades VALUES (310, 'Cordeiros', 290900, 5, 8168, 15.25, 'cordeirense', 535.484);
INSERT INTO tb_cidades VALUES (312, 'Coronel Jo�o S�', 290920, 5, 17066, 19.32, 'jo�o-saense', 883.432);
INSERT INTO tb_cidades VALUES (314, 'Cotegipe', 290940, 5, 13636, 3.25, 'cotegipano', 4196.145);
INSERT INTO tb_cidades VALUES (316, 'Cris�polis', 290960, 5, 20046, 32.99, 'crisopolense', 607.662);
INSERT INTO tb_cidades VALUES (317, 'Crist�polis', 290970, 5, 13280, 12.73, 'cristopolense', 1043.1);
INSERT INTO tb_cidades VALUES (319, 'Cura��', 290990, 5, 32168, 5.29, 'cura�aense', 6079.042);
INSERT INTO tb_cidades VALUES (321, 'Dias D`�vila', 291005, 5, 66440, 360.64, 'diasdavilense', 184.229);
INSERT INTO tb_cidades VALUES (322, 'Dom Bas�lio', 291010, 5, 11355, 16.78, 'dom-basiliense', 676.894);
INSERT INTO tb_cidades VALUES (324, 'El�sio Medrado', 291030, 5, 7947, 41.06, 'medradense', 193.527);
INSERT INTO tb_cidades VALUES (326, 'Entre Rios', 291050, 5, 39872, 32.81, 'entrerriense', 1215.289);
INSERT INTO tb_cidades VALUES (328, 'Esplanada', 291060, 5, 32802, 24.84, 'esplanadense', 1320.739);
INSERT INTO tb_cidades VALUES (329, 'Euclides Da Cunha', 291070, 5, 56289, 25.18, 'euclidense', 2235.268);
INSERT INTO tb_cidades VALUES (331, 'F�tima', 291075, 5, 17652, 49.11, 'fatimense', 359.402);
INSERT INTO tb_cidades VALUES (333, 'Feira De Santana', 291080, 5, 556642, 416.03, 'feirense', 1337.988);
INSERT INTO tb_cidades VALUES (334, 'Filad�lfia', 291085, 5, 16740, 29.36, 'filadelfense', 570.077);
INSERT INTO tb_cidades VALUES (336, 'Floresta Azul', 291100, 5, 10660, 36.33, 'floresta-azulense', 293.457);
INSERT INTO tb_cidades VALUES (338, 'Gandu', 291120, 5, 30336, 124.76, 'ganduense', 243.15);
INSERT INTO tb_cidades VALUES (339, 'Gavi�o', 291125, 5, 4561, 12.33, 'gavionense', 369.876);
INSERT INTO tb_cidades VALUES (341, 'Gl�ria', 291140, 5, 15076, 12.01, 'gloriense', 1255.647);
INSERT INTO tb_cidades VALUES (343, 'Governador Mangabeira', 291160, 5, 19818, 186.41, 'mangabeirense', 106.316);
INSERT INTO tb_cidades VALUES (344, 'Guajeru', 291165, 5, 10412, 11.12, 'guajeruense', 936.082);
INSERT INTO tb_cidades VALUES (346, 'Guaratinga', 291180, 5, 22165, 9.53, 'guaratinguense', 2325.382);
INSERT INTO tb_cidades VALUES (348, 'Ia�u', 291190, 5, 25736, 10.5, 'ia�uense', 2451.485);
INSERT INTO tb_cidades VALUES (350, 'Ibicara�', 291210, 5, 24272, 104.65, 'ibicaraiense', 231.938);
INSERT INTO tb_cidades VALUES (352, 'Ibicu�', 291230, 5, 15785, 13.41, 'ibicuiense', 1176.843);
INSERT INTO tb_cidades VALUES (353, 'Ibipeba', 291240, 5, 17008, 12.29, 'ibipebense', 1383.66);
INSERT INTO tb_cidades VALUES (355, 'Ibiquera', 291260, 5, 4866, 5.15, 'ibiquerense', 945.269);
INSERT INTO tb_cidades VALUES (357, 'Ibirapu�', 291280, 5, 7956, 10.1, 'ibirapuense', 787.738);
INSERT INTO tb_cidades VALUES (359, 'Ibitiara', 291300, 5, 15508, 8.39, 'ibitiarense', 1847.57);
INSERT INTO tb_cidades VALUES (360, 'Ibitit�', 291310, 5, 17840, 28.58, 'ibititaense', 624.104);
INSERT INTO tb_cidades VALUES (362, 'Ichu', 291330, 5, 5255, 41.16, 'ichuense', 127.668);
INSERT INTO tb_cidades VALUES (364, 'Igrapi�na', 291345, 5, 13343, 25.31, 'igrapiunense', 527.212);
INSERT INTO tb_cidades VALUES (366, 'Ilh�us', 291360, 5, 184236, 104.68, 'ilheuense', 1760.004);
INSERT INTO tb_cidades VALUES (368, 'Ipecaet�', 291380, 5, 15331, 41.45, 'ipecaetense', 369.883);
INSERT INTO tb_cidades VALUES (369, 'Ipia�', 291390, 5, 44390, 166.05, 'ipiauense', 267.327);
INSERT INTO tb_cidades VALUES (371, 'Ipupiara', 291410, 5, 9285, 8.75, 'ipupiarense', 1061.239);
INSERT INTO tb_cidades VALUES (373, 'Iramaia', 291430, 5, 11990, 6.16, 'iramaense', 1947.34);
INSERT INTO tb_cidades VALUES (375, 'Irar�', 291450, 5, 27466, 98.87, 'iraraense', 277.791);
INSERT INTO tb_cidades VALUES (376, 'Irec�', 291460, 5, 66181, 207.45, 'ireceense', 319.028);
INSERT INTO tb_cidades VALUES (378, 'Itaberaba', 291470, 5, 61631, 26.3, 'itaberabense', 2343.549);
INSERT INTO tb_cidades VALUES (380, 'Itacar�', 291490, 5, 24318, 32.96, 'itacareense', 737.85);
INSERT INTO tb_cidades VALUES (382, 'Itagi', 291510, 5, 13051, 50.36, 'itagiense', 259.172);
INSERT INTO tb_cidades VALUES (384, 'Itagimirim', 291530, 5, 7110, 8.47, 'itagimiriense', 839.058);
INSERT INTO tb_cidades VALUES (387, 'Itaju�pe', 291550, 5, 21081, 74.11, 'itajuipense', 284.474);
INSERT INTO tb_cidades VALUES (389, 'Itamari', 291570, 5, 7903, 71.14, 'itamariense', 111.088);
INSERT INTO tb_cidades VALUES (391, 'Itanagra', 291590, 5, 7598, 15.49, 'itanagrense', 490.526);
INSERT INTO tb_cidades VALUES (392, 'Itanh�m', 291600, 5, 20216, 13.81, 'itanhense', 1463.83);
INSERT INTO tb_cidades VALUES (394, 'Itap�', 291620, 5, 10995, 23.94, 'itapeense', 459.369);
INSERT INTO tb_cidades VALUES (396, 'Itapetinga', 291640, 5, 68273, 41.95, 'itapetinguense', 1627.462);
INSERT INTO tb_cidades VALUES (398, 'Itapitanga', 291660, 5, 10207, 24.99, 'itapitanguense', 408.372);
INSERT INTO tb_cidades VALUES (400, 'Itarantim', 291680, 5, 18539, 10.27, 'itarantinense', 1805.121);
INSERT INTO tb_cidades VALUES (401, 'Itatim', 291685, 5, 14522, 24.89, 'itatinhense', 583.435);
INSERT INTO tb_cidades VALUES (403, 'Iti�ba', 291700, 5, 36113, 20.96, 'itiubense', 1722.706);
INSERT INTO tb_cidades VALUES (405, 'Itua�u', 291720, 5, 18127, 14.9, 'itua�uense', 1216.253);
INSERT INTO tb_cidades VALUES (407, 'Iui�', 291733, 5, 10900, 7.34, 'iuiuense', 1485.775);
INSERT INTO tb_cidades VALUES (409, 'Jacaraci', 291740, 5, 13651, 11.05, 'jacaraciense', 1235.622);
INSERT INTO tb_cidades VALUES (410, 'Jacobina', 291750, 5, 79247, 33.58, 'jacobinense', 2359.965);
INSERT INTO tb_cidades VALUES (412, 'Jaguarari', 291770, 5, 30343, 12.35, 'jaguarariense', 2456.548);
INSERT INTO tb_cidades VALUES (414, 'Janda�ra', 291790, 5, 10331, 16.11, 'jandairense', 641.203);
INSERT INTO tb_cidades VALUES (416, 'Jeremoabo', 291810, 5, 37680, 8.09, 'jeremoabense', 4656.094);
INSERT INTO tb_cidades VALUES (417, 'Jiquiri��', 291820, 5, 14118, 58.97, 'jiquiri�aense', 239.403);
INSERT INTO tb_cidades VALUES (420, 'Juazeiro', 291840, 5, 197965, 30.45, 'juazeirense', 6500.679);
INSERT INTO tb_cidades VALUES (421, 'Jucuru�u', 291845, 5, 10290, 7.36, 'jucuru�uense', 1398.811);
INSERT INTO tb_cidades VALUES (423, 'Jussari', 291855, 5, 6474, 18.14, 'jussariense', 356.847);
INSERT INTO tb_cidades VALUES (424, 'Jussiape', 291860, 5, 8031, 13.72, 'jussiapense', 585.184);
INSERT INTO tb_cidades VALUES (426, 'Lagoa Real', 291875, 5, 13934, 15.88, 'lagoa-realense', 877.435);
INSERT INTO tb_cidades VALUES (428, 'Lajed�o', 291890, 5, 3733, 6.06, 'lajed�oense', 615.518);
INSERT INTO tb_cidades VALUES (430, 'Lajedo Do Tabocal', 291905, 5, 8305, 19.23, 'lagedense', 431.947);
INSERT INTO tb_cidades VALUES (431, 'Lamar�o', 291910, 5, 9560, 54.84, 'lamar�oense', 174.322);
INSERT INTO tb_cidades VALUES (433, 'Lauro De Freitas', 291920, 5, 163449, 2.833, 'lauro-freitense', 57.686);
INSERT INTO tb_cidades VALUES (435, 'Lic�nio De Almeida', 291940, 5, 12311, 14.6, 'lic�nio-de-almeidense', 843.374);
INSERT INTO tb_cidades VALUES (437, 'Lu�s Eduardo Magalh�es', 291955, 5, 60105, 15.25, 'luiseduardense', 3941.139);
INSERT INTO tb_cidades VALUES (438, 'Macajuba', 291960, 5, 11229, 17.27, 'macajubense', 650.285);
INSERT INTO tb_cidades VALUES (440, 'Maca�bas', 291980, 5, 47051, 15.71, 'macaubense', 2994.135);
INSERT INTO tb_cidades VALUES (442, 'Madre De Deus', 291992, 5, 17376, 539.58, 'madre-deusense', 32.203);
INSERT INTO tb_cidades VALUES (444, 'Maiquinique', 292000, 5, 8782, 17.85, 'maiquiniquense', 491.978);
INSERT INTO tb_cidades VALUES (446, 'Malhada', 292020, 5, 16014, 7.97, 'malhadense', 2008.353);
INSERT INTO tb_cidades VALUES (448, 'Manoel Vitorino', 292040, 5, 14387, 6.38, 'manoel-vitorinense', 2254.42);
INSERT INTO tb_cidades VALUES (449, 'Mansid�o', 292045, 5, 12592, 3.96, 'mansid�oense', 3177.42);
INSERT INTO tb_cidades VALUES (451, 'Maragogipe', 292060, 5, 42815, 97.27, 'maragogipano', 440.159);
INSERT INTO tb_cidades VALUES (453, 'Marcion�lio Souza', 292080, 5, 10500, 8.22, 'marcionilense', 1277.171);
INSERT INTO tb_cidades VALUES (455, 'Mata De S�o Jo�o', 292100, 5, 40183, 63.46, 'matense', 633.189);
INSERT INTO tb_cidades VALUES (456, 'Matina', 292105, 5, 11145, 14.37, 'matinense', 775.727);
INSERT INTO tb_cidades VALUES (458, 'Miguel Calmon', 292120, 5, 26475, 16.88, 'calmonense', 1568.22);
INSERT INTO tb_cidades VALUES (460, 'Mirangaba', 292140, 5, 16279, 9.59, 'mirangabense', 1697.691);
INSERT INTO tb_cidades VALUES (461, 'Mirante', 292145, 5, 10507, 9.9, 'mirantense', 1061.005);
INSERT INTO tb_cidades VALUES (463, 'Morpar�', 292160, 5, 8280, 4.88, 'morparaense', 1696.892);
INSERT INTO tb_cidades VALUES (465, 'Mortugaba', 292180, 5, 12477, 20.38, 'mortugabense', 612.191);
INSERT INTO tb_cidades VALUES (467, 'Mucuri', 292200, 5, 36026, 20.23, 'mucuriense', 1780.595);
INSERT INTO tb_cidades VALUES (469, 'Mundo Novo', 292210, 5, 24395, 16.33, 'mundo-novense', 1493.422);
INSERT INTO tb_cidades VALUES (470, 'Muniz Ferreira', 292220, 5, 7317, 66.45, 'ferreirense', 110.114);
INSERT INTO tb_cidades VALUES (472, 'Muritiba', 292230, 5, 28899, 323.58, 'muritibano', 89.31);
INSERT INTO tb_cidades VALUES (473, 'Mutu�pe', 292240, 5, 21449, 75.74, 'mutuipense', 283.205);
INSERT INTO tb_cidades VALUES (475, 'Nilo Pe�anha', 292260, 5, 12530, 31.38, 'nilo-pe�anhense', 399.349);
INSERT INTO tb_cidades VALUES (477, 'Nova Cana�', 292270, 5, 16713, 19.58, 'canaense', 853.709);
INSERT INTO tb_cidades VALUES (479, 'Nova Ibi�', 292275, 5, 6648, 37.19, 'nova-ibiaense', 178.74);
INSERT INTO tb_cidades VALUES (481, 'Nova Reden��o', 292285, 5, 8034, 18.63, 'nova-reden�oense', 431.322);
INSERT INTO tb_cidades VALUES (482, 'Nova Soure', 292290, 5, 24136, 25.4, 'nova-souriense', 950.377);
INSERT INTO tb_cidades VALUES (484, 'Novo Horizonte', 292303, 5, 10673, 17.52, 'novo-horizontino', 609.188);
INSERT INTO tb_cidades VALUES (486, 'Olindina', 292310, 5, 24943, 46, 'olindinense', 542.198);
INSERT INTO tb_cidades VALUES (488, 'Ouri�angas', 292330, 5, 8298, 53.5, 'ouri�anguense', 155.089);
INSERT INTO tb_cidades VALUES (489, 'Ourol�ndia', 292335, 5, 16425, 11.04, 'ourolandense', 1487.743);
INSERT INTO tb_cidades VALUES (491, 'Palmeiras', 292350, 5, 8410, 12.79, 'palmeirense', 657.73);
INSERT INTO tb_cidades VALUES (492, 'Paramirim', 292360, 5, 21001, 17.95, 'paramirinhense', 1170.128);
INSERT INTO tb_cidades VALUES (494, 'Paripiranga', 292380, 5, 27778, 63.75, 'paripiranguense', 435.701);
INSERT INTO tb_cidades VALUES (496, 'Paulo Afonso', 292400, 5, 108396, 68.62, 'paulo-afonsino', 1579.723);
INSERT INTO tb_cidades VALUES (498, 'Pedr�o', 292410, 5, 6876, 43.03, 'pedronense', 159.794);
INSERT INTO tb_cidades VALUES (500, 'Piat�', 292430, 5, 17982, 10.49, 'piat�ense', 1713.474);
INSERT INTO tb_cidades VALUES (501, 'Pil�o Arcado', 292440, 5, 32860, 2.8, 'pil�o-arcadense', 11732.231);
INSERT INTO tb_cidades VALUES (503, 'Pindoba�u', 292460, 5, 20121, 40.54, 'pindoba�uense', 496.279);
INSERT INTO tb_cidades VALUES (505, 'Pira� Do Norte', 292467, 5, 9799, 52.32, 'piraiense', 187.278);
INSERT INTO tb_cidades VALUES (506, 'Pirip�', 292470, 5, 12783, 29.08, 'piripaense', 439.655);
INSERT INTO tb_cidades VALUES (508, 'Planaltino', 292490, 5, 8822, 9.52, 'planaltinense', 926.971);
INSERT INTO tb_cidades VALUES (510, 'Po��es', 292510, 5, 44701, 54.08, 'po�oense', 826.535);
INSERT INTO tb_cidades VALUES (512, 'Ponto Novo', 292525, 5, 15742, 31.65, 'ponto-novense', 497.347);
INSERT INTO tb_cidades VALUES (514, 'Potiragu�', 292540, 5, 9810, 9.95, 'potirag�ense', 985.482);
INSERT INTO tb_cidades VALUES (515, 'Prado', 292550, 5, 27627, 15.87, 'pradense', 1740.299);
INSERT INTO tb_cidades VALUES (518, 'Presidente Tancredo Neves', 292575, 5, 23846, 57.16, 'tancredense', 417.198);
INSERT INTO tb_cidades VALUES (519, 'Queimadas', 292580, 5, 24602, 12.15, 'queimadense', 2024.24);
INSERT INTO tb_cidades VALUES (521, 'Quixabeira', 292593, 5, 9554, 24.64, 'quixabeirense', 387.7);
INSERT INTO tb_cidades VALUES (523, 'Remanso', 292600, 5, 38957, 8.32, 'remansense', 4683.959);
INSERT INTO tb_cidades VALUES (525, 'Riach�o Das Neves', 292620, 5, 21937, 3.87, 'riach�o-nevense', 5670.417);
INSERT INTO tb_cidades VALUES (527, 'Riacho De Santana', 292640, 5, 30646, 11.87, 'riachense', 2582.194);
INSERT INTO tb_cidades VALUES (528, 'Ribeira Do Amparo', 292650, 5, 14276, 22.22, 'amparense', 642.585);
INSERT INTO tb_cidades VALUES (530, 'Ribeir�o Do Largo', 292665, 5, 8602, 6.77, 'ribeirense', 1271.344);
INSERT INTO tb_cidades VALUES (531, 'Rio De Contas', 292670, 5, 13007, 12.23, 'rio-contense', 1063.747);
INSERT INTO tb_cidades VALUES (533, 'Rio Do Pires', 292690, 5, 11918, 14.54, 'rio-pirense', 819.807);
INSERT INTO tb_cidades VALUES (535, 'Rodelas', 292710, 5, 7775, 2.85, 'rodelense', 2723.521);
INSERT INTO tb_cidades VALUES (536, 'Ruy Barbosa', 292720, 5, 29887, 13.76, 'rui-barbosense', 2171.443);
INSERT INTO tb_cidades VALUES (538, 'Salvador', 292740, 5, 2675656, 3.859, 'soteropolitano', 693.292);
INSERT INTO tb_cidades VALUES (540, 'Santa Br�gida', 292760, 5, 15060, 17.06, 'santa-brigidense', 882.852);
INSERT INTO tb_cidades VALUES (542, 'Santa Cruz Da Vit�ria', 292780, 5, 6673, 22.38, 'santa-cruzense', 298.209);
INSERT INTO tb_cidades VALUES (543, 'Santa In�s', 292790, 5, 10363, 32.83, 'santinense', 315.656);
INSERT INTO tb_cidades VALUES (545, 'Santa Maria Da Vit�ria', 292810, 5, 40309, 20.49, 'santa-mariense', 1966.777);
INSERT INTO tb_cidades VALUES (547, 'Santa Teresinha', 292850, 5, 9648, 13.64, 'santa-teresinhense', 707.239);
INSERT INTO tb_cidades VALUES (548, 'Santaluz', 292800, 5, 33838, 21.7, 'luzense', 1559.714);
INSERT INTO tb_cidades VALUES (550, 'Santan�polis', 292830, 5, 8776, 38.02, 'santanopolinense', 230.832);
INSERT INTO tb_cidades VALUES (552, 'Santo Ant�nio De Jesus', 292870, 5, 90985, 348.14, 'santo-antoniense', 261.348);
INSERT INTO tb_cidades VALUES (554, 'S�o Desid�rio', 292890, 5, 27659, 1.82, 's�o-desideriano', 15156.986);
INSERT INTO tb_cidades VALUES (556, 'S�o Felipe', 292910, 5, 20305, 98.57, 's�o-felipense', 205.989);
INSERT INTO tb_cidades VALUES (557, 'S�o F�lix', 292900, 5, 14098, 142.11, 's�o-felista', 99.204);
INSERT INTO tb_cidades VALUES (559, 'S�o Francisco Do Conde', 292920, 5, 33183, 126.24, 'franciscano', 262.855);
INSERT INTO tb_cidades VALUES (561, 'S�o Gon�alo Dos Campos', 292930, 5, 33283, 110.67, 's�o-gon�alense', 300.729);
INSERT INTO tb_cidades VALUES (563, 'S�o Jos� Do Jacu�pe', 292937, 5, 10180, 25.07, 'jacuipense', 406.028);
INSERT INTO tb_cidades VALUES (564, 'S�o Miguel Das Matas', 292940, 5, 10414, 48.57, 'miguelense', 214.417);
INSERT INTO tb_cidades VALUES (566, 'Sapea�u', 292960, 5, 16585, 141.51, 'sapea�uense', 117.204);
INSERT INTO tb_cidades VALUES (567, 'S�tiro Dias', 292970, 5, 18964, 18.78, 'satirense', 1010.029);
INSERT INTO tb_cidades VALUES (569, 'Sa�de', 292980, 5, 11845, 23.49, 'saudense', 504.312);
INSERT INTO tb_cidades VALUES (571, 'Sebasti�o Laranjeiras', 293000, 5, 10371, 5.32, 'sebastianense', 1948.468);
INSERT INTO tb_cidades VALUES (573, 'Sento S�', 293020, 5, 37425, 2.95, 'sento-seense', 12698.8);
INSERT INTO tb_cidades VALUES (574, 'Serra Do Ramalho', 293015, 5, 31638, 12.2, 'serra-malhense', 2593.427);
INSERT INTO tb_cidades VALUES (576, 'Serra Preta', 293040, 5, 15401, 28.71, 'serra-pretense', 536.499);
INSERT INTO tb_cidades VALUES (577, 'Serrinha', 293050, 5, 76762, 116.5, 'serrinhense', 658.925);
INSERT INTO tb_cidades VALUES (579, 'Sim�es Filho', 293070, 5, 118047, 586.65, 'sim�es-filhense', 201.222);
INSERT INTO tb_cidades VALUES (581, 'S�tio Do Quinto', 293076, 5, 12592, 17.94, 's�tio-quintense', 702.06);
INSERT INTO tb_cidades VALUES (583, 'Souto Soares', 293080, 5, 15899, 16.01, 'souto-soarense', 993.312);
INSERT INTO tb_cidades VALUES (585, 'Tanha�u', 293100, 5, 20013, 16.21, 'tanha�uense', 1234.471);
INSERT INTO tb_cidades VALUES (586, 'Tanque Novo', 293105, 5, 16128, 22.31, 'tanque-novense', 722.898);
INSERT INTO tb_cidades VALUES (588, 'Tapero�', 293120, 5, 18748, 45.64, 'taperoense', 410.784);
INSERT INTO tb_cidades VALUES (590, 'Teixeira De Freitas', 293135, 5, 138341, 118.86, 'teixeirense', 1163.871);
INSERT INTO tb_cidades VALUES (592, 'Teofil�ndia', 293150, 5, 21482, 64.02, 'teofilandense', 335.529);
INSERT INTO tb_cidades VALUES (593, 'Teol�ndia', 293160, 5, 14836, 46.68, 'teolandense', 317.826);
INSERT INTO tb_cidades VALUES (595, 'Tremedal', 293180, 5, 17029, 10.14, 'tremedalense', 1679.6);
INSERT INTO tb_cidades VALUES (597, 'Uau�', 293200, 5, 24294, 8, 'uauaense', 3035.151);
INSERT INTO tb_cidades VALUES (598, 'Uba�ra', 293210, 5, 19750, 27.19, 'ubairense', 726.259);
INSERT INTO tb_cidades VALUES (600, 'Ubat�', 293230, 5, 25004, 93.22, 'ubatense', 268.223);
INSERT INTO tb_cidades VALUES (602, 'Umburanas', 293245, 5, 17000, 10.18, 'umburanense', 1670.484);
INSERT INTO tb_cidades VALUES (604, 'Urandi', 293260, 5, 16466, 16.99, 'urandiense', 969.441);
INSERT INTO tb_cidades VALUES (606, 'Utinga', 293280, 5, 18173, 28.47, 'utinguense', 638.224);
INSERT INTO tb_cidades VALUES (608, 'Valente', 293300, 5, 24560, 63.9, 'valentense', 384.321);
INSERT INTO tb_cidades VALUES (609, 'V�rzea Da Ro�a', 293305, 5, 13786, 26.83, 'varzeano', 513.915);
INSERT INTO tb_cidades VALUES (611, 'V�rzea Nova', 293315, 5, 13073, 10.96, 'v�rzea-novense', 1192.899);
INSERT INTO tb_cidades VALUES (613, 'Vera Cruz', 293320, 5, 37567, 125.33, 'vera-cruzense', 299.733);
INSERT INTO tb_cidades VALUES (615, 'Vit�ria Da Conquista', 293330, 5, 306866, 90.11, 'conquistense', 3405.58);
INSERT INTO tb_cidades VALUES (616, 'Wagner', 293340, 5, 8983, 21.34, 'wagnense', 420.997);
INSERT INTO tb_cidades VALUES (619, 'Xique Xique', 293360, 5, 45536, 8.28, 'xiquexiquense', 5502.297);
INSERT INTO tb_cidades VALUES (620, 'Abaiara', 230010, 6, 10496, 58.69, 'abaiarense', 178.833);
INSERT INTO tb_cidades VALUES (621, 'Acarape', 230015, 6, 15338, 95.69, 'acarapense', 160.296);
INSERT INTO tb_cidades VALUES (623, 'Acopiara', 230030, 6, 51160, 22.7, 'acopiarense', 2253.779);
INSERT INTO tb_cidades VALUES (625, 'Alc�ntaras', 230050, 6, 10771, 77.71, 'alcantarense', 138.604);
INSERT INTO tb_cidades VALUES (627, 'Alto Santo', 230070, 6, 16359, 12.22, 'alto-santense', 1338.207);
INSERT INTO tb_cidades VALUES (629, 'Antonina Do Norte', 230080, 6, 6984, 26.85, 'antonino', 260.102);
INSERT INTO tb_cidades VALUES (630, 'Apuiar�s', 230090, 6, 13925, 25.21, 'apuiareense', 552.338);
INSERT INTO tb_cidades VALUES (632, 'Aracati', 230110, 6, 69159, 55.45, 'aracatiense', 1247.301);
INSERT INTO tb_cidades VALUES (634, 'Ararend�', 230125, 6, 10491, 30.49, 'ararendaense', 344.13);
INSERT INTO tb_cidades VALUES (636, 'Aratuba', 230140, 6, 11529, 100.44, 'aratubano', 114.784);
INSERT INTO tb_cidades VALUES (637, 'Arneiroz', 230150, 6, 7650, 7.17, 'arneirozense', 1066.356);
INSERT INTO tb_cidades VALUES (639, 'Aurora', 230170, 6, 24566, 27.61, 'aurorense', 889.876);
INSERT INTO tb_cidades VALUES (641, 'Banabui�', 230185, 6, 17315, 16.03, 'banabuiense', 1079.989);
INSERT INTO tb_cidades VALUES (2718, 'Riach�o', 251274, 15, 3266, 36.23, 'riach�oense', 90.15);
INSERT INTO tb_cidades VALUES (643, 'Barreira', 230195, 6, 19573, 81.25, 'barreirense', 240.903);
INSERT INTO tb_cidades VALUES (645, 'Barroquinha', 230205, 6, 14476, 37.76, 'barroquinhense', 383.403);
INSERT INTO tb_cidades VALUES (647, 'Beberibe', 230220, 6, 49311, 30.37, 'beberibense', 1623.881);
INSERT INTO tb_cidades VALUES (649, 'Boa Viagem', 230240, 6, 52498, 18.51, 'boa-viagense', 2836.764);
INSERT INTO tb_cidades VALUES (650, 'Brejo Santo', 230250, 6, 45193, 68.12, 'brejo-santense', 663.421);
INSERT INTO tb_cidades VALUES (652, 'Campos Sales', 230270, 6, 26506, 24.48, 'campos-salense', 1082.766);
INSERT INTO tb_cidades VALUES (654, 'Capistrano', 230290, 6, 17062, 76.67, 'capistranense', 222.547);
INSERT INTO tb_cidades VALUES (656, 'Carir�', 230310, 6, 18347, 24.24, 'carireense', 756.87);
INSERT INTO tb_cidades VALUES (658, 'Cari�s', 230330, 6, 18567, 17.49, 'cariuense', 1061.797);
INSERT INTO tb_cidades VALUES (659, 'Carnaubal', 230340, 6, 16746, 45.9, 'carnaubalense', 364.804);
INSERT INTO tb_cidades VALUES (661, 'Catarina', 230360, 6, 18745, 38.5, 'catarinense', 486.861);
INSERT INTO tb_cidades VALUES (663, 'Caucaia', 230370, 6, 325441, 265.93, 'caucaiense', 1223.796);
INSERT INTO tb_cidades VALUES (665, 'Chaval', 230390, 6, 12615, 52.95, 'chavalense', 238.234);
INSERT INTO tb_cidades VALUES (666, 'Chor�', 230393, 6, 12853, 15.76, 'choroense', 815.765);
INSERT INTO tb_cidades VALUES (668, 'Corea�', 230400, 6, 21954, 28.3, 'coreauense', 775.792);
INSERT INTO tb_cidades VALUES (670, 'Crato', 230420, 6, 121428, 104.87, 'cratense', 1157.914);
INSERT INTO tb_cidades VALUES (672, 'Cruz', 230425, 6, 22479, 67.28, 'cruzense', 334.121);
INSERT INTO tb_cidades VALUES (674, 'Erer�', 230427, 6, 6840, 17.27, 'erereense', 396.016);
INSERT INTO tb_cidades VALUES (675, 'Eus�bio', 230428, 6, 46033, 582.64, 'eusebiano', 79.008);
INSERT INTO tb_cidades VALUES (677, 'Forquilha', 230435, 6, 21786, 42.14, 'forquilhense', 516.99);
INSERT INTO tb_cidades VALUES (679, 'Fortim', 230445, 6, 14817, 52.53, 'fortinense', 282.066);
INSERT INTO tb_cidades VALUES (680, 'Frecheirinha', 230450, 6, 12991, 71.68, 'frecheirinhense', 181.239);
INSERT INTO tb_cidades VALUES (682, 'Gra�a', 230465, 6, 15049, 53.39, 'gracense', 281.871);
INSERT INTO tb_cidades VALUES (684, 'Granjeiro', 230480, 6, 4629, 46.23, 'granjeirense', 100.127);
INSERT INTO tb_cidades VALUES (686, 'Guai�ba', 230495, 6, 24091, 94.83, 'guaiubano', 254.044);
INSERT INTO tb_cidades VALUES (687, 'Guaraciaba Do Norte', 230500, 6, 37775, 61.78, 'guaraciabense', 611.461);
INSERT INTO tb_cidades VALUES (689, 'Hidrol�ndia', 230520, 6, 19325, 20.84, 'hidrolandiense', 927.377);
INSERT INTO tb_cidades VALUES (691, 'Ibaretama', 230526, 6, 12922, 14.73, 'ibaretamense', 877.252);
INSERT INTO tb_cidades VALUES (693, 'Ibicuitinga', 230533, 6, 11335, 26.72, 'ibicuitinguense', 424.243);
INSERT INTO tb_cidades VALUES (694, 'Icapu�', 230535, 6, 18392, 43.43, 'icapuiense', 423.446);
INSERT INTO tb_cidades VALUES (696, 'Iguatu', 230550, 6, 96495, 94.87, 'iguatuense', 1017.089);
INSERT INTO tb_cidades VALUES (698, 'Ipaporanga', 230565, 6, 11343, 16.16, 'ipaporanguense', 702.131);
INSERT INTO tb_cidades VALUES (700, 'Ipu', 230580, 6, 40296, 64.03, 'ipuense', 629.312);
INSERT INTO tb_cidades VALUES (701, 'Ipueiras', 230590, 6, 37862, 25.63, 'ipueirense', 1477.399);
INSERT INTO tb_cidades VALUES (703, 'Irau�uba', 230610, 6, 22324, 15.39, 'irau�ubense', 1450.707);
INSERT INTO tb_cidades VALUES (705, 'Itaitinga', 230625, 6, 35817, 236.52, 'itaitiguense', 151.436);
INSERT INTO tb_cidades VALUES (707, 'Itapipoca', 230640, 6, 116065, 72.38, 'itapipoquense', 1603.654);
INSERT INTO tb_cidades VALUES (708, 'Itapi�na', 230650, 6, 18626, 31.64, 'itapiunense', 588.696);
INSERT INTO tb_cidades VALUES (710, 'Itatira', 230660, 6, 18894, 24.12, 'itatirense', 783.433);
INSERT INTO tb_cidades VALUES (712, 'Jaguaribara', 230680, 6, 10399, 15.55, 'jaguaribarense', 668.734);
INSERT INTO tb_cidades VALUES (714, 'Jaguaruana', 230700, 6, 32236, 38.05, 'jaguaruanense', 847.261);
INSERT INTO tb_cidades VALUES (715, 'Jardim', 230710, 6, 26688, 51.41, 'jardinense', 519.101);
INSERT INTO tb_cidades VALUES (718, 'Juazeiro Do Norte', 230730, 6, 249939, 1.006, 'juazeirense', 248.223);
INSERT INTO tb_cidades VALUES (719, 'Juc�s', 230740, 6, 23807, 25.4, 'jucaense', 937.184);
INSERT INTO tb_cidades VALUES (721, 'Limoeiro Do Norte', 230760, 6, 56264, 74.84, 'limoeirense', 751.834);
INSERT INTO tb_cidades VALUES (722, 'Madalena', 230763, 6, 18088, 17.63, 'madalenense', 1026.256);
INSERT INTO tb_cidades VALUES (724, 'Maranguape', 230770, 6, 113561, 192.19, 'maranguapense', 590.886);
INSERT INTO tb_cidades VALUES (726, 'Martin�pole', 230790, 6, 10214, 34.17, 'martinolopolitano', 298.959);
INSERT INTO tb_cidades VALUES (728, 'Mauriti', 230810, 6, 44240, 41, 'mauritiense', 1078.963);
INSERT INTO tb_cidades VALUES (729, 'Meruoca', 230820, 6, 13693, 91.38, 'meruoquense', 149.844);
INSERT INTO tb_cidades VALUES (731, 'Milh�', 230835, 6, 13086, 26.05, 'milhanense', 502.342);
INSERT INTO tb_cidades VALUES (733, 'Miss�o Velha', 230840, 6, 34274, 52.69, 'missanvelhense', 650.538);
INSERT INTO tb_cidades VALUES (735, 'Monsenhor Tabosa', 230860, 6, 16705, 18.69, 'tabosense', 893.644);
INSERT INTO tb_cidades VALUES (736, 'Morada Nova', 230870, 6, 62065, 22.33, 'morada-novense', 2779.231);
INSERT INTO tb_cidades VALUES (738, 'Morrinhos', 230890, 6, 20700, 49.81, 'morrinhense', 415.551);
INSERT INTO tb_cidades VALUES (740, 'Mulungu', 230910, 6, 11485, 120.16, 'mulunguense', 95.58);
INSERT INTO tb_cidades VALUES (742, 'Nova Russas', 230930, 6, 30965, 41.69, 'nova-russano', 742.764);
INSERT INTO tb_cidades VALUES (744, 'Ocara', 230945, 6, 24007, 31.37, 'ocarense', 765.407);
INSERT INTO tb_cidades VALUES (745, 'Or�s', 230950, 6, 21389, 37.12, 'oroense', 576.267);
INSERT INTO tb_cidades VALUES (747, 'Pacatuba', 230970, 6, 72299, 498.35, 'pacatubano', 145.077);
INSERT INTO tb_cidades VALUES (749, 'Pacuj�', 230990, 6, 5986, 78.63, 'pacujaense', 76.128);
INSERT INTO tb_cidades VALUES (750, 'Palhano', 231000, 6, 8866, 20.13, 'palhanense', 440.378);
INSERT INTO tb_cidades VALUES (752, 'Paracuru', 231020, 6, 31636, 106.8, 'paracuruense', 296.215);
INSERT INTO tb_cidades VALUES (754, 'Parambu', 231030, 6, 31309, 13.54, 'parambuense', 2312.398);
INSERT INTO tb_cidades VALUES (756, 'Pedra Branca', 231050, 6, 41890, 32.14, 'pedra-branquense', 1303.28);
INSERT INTO tb_cidades VALUES (758, 'Pentecoste', 231070, 6, 35400, 25.68, 'pentecostense', 1378.303);
INSERT INTO tb_cidades VALUES (760, 'Pindoretama', 231085, 6, 18683, 256.06, 'pindoretamense', 72.964);
INSERT INTO tb_cidades VALUES (762, 'Pires Ferreira', 231095, 6, 10216, 42.02, 'pires-ferreirense', 243.097);
INSERT INTO tb_cidades VALUES (763, 'Poranga', 231100, 6, 12001, 9.17, 'poranguense', 1309.253);
INSERT INTO tb_cidades VALUES (765, 'Potengi', 231120, 6, 10276, 30.34, 'potengiense', 338.727);
INSERT INTO tb_cidades VALUES (767, 'Quiterian�polis', 231126, 6, 19921, 19.14, 'quiterianopolense', 1040.984);
INSERT INTO tb_cidades VALUES (769, 'Quixel�', 231135, 6, 15000, 25.72, 'quixeloense', 583.236);
INSERT INTO tb_cidades VALUES (771, 'Quixer�', 231150, 6, 19412, 31.78, 'quixereense', 610.776);
INSERT INTO tb_cidades VALUES (772, 'Reden��o', 231160, 6, 26415, 117.09, 'redencionista', 225.592);
INSERT INTO tb_cidades VALUES (2721, 'Riacho De Santo Ant�nio', 251278, 15, 1722, 18.86, 'riachoantoniense', 91.323);
INSERT INTO tb_cidades VALUES (776, 'Salitre', 231195, 6, 15453, 19.21, 'salitrense', 804.349);
INSERT INTO tb_cidades VALUES (778, 'Santana Do Acara�', 231200, 6, 29946, 30.89, 'santanense-do-acara�', 969.321);
INSERT INTO tb_cidades VALUES (780, 'S�o Benedito', 231230, 6, 44178, 130.61, 'beneditense', 338.243);
INSERT INTO tb_cidades VALUES (781, 'S�o Gon�alo Do Amarante', 231240, 6, 43890, 52.34, 'gon�alense', 838.513);
INSERT INTO tb_cidades VALUES (783, 'S�o Lu�s Do Curu', 231260, 6, 12332, 100.74, 'curuense', 122.42);
INSERT INTO tb_cidades VALUES (784, 'Senador Pompeu', 231270, 6, 26469, 27.68, 'pompeuense', 956.122);
INSERT INTO tb_cidades VALUES (786, 'Sobral', 231290, 6, 188233, 88.67, 'sobralense', 2122.885);
INSERT INTO tb_cidades VALUES (788, 'Tabuleiro Do Norte', 231310, 6, 29204, 33.89, 'tabuleirense', 861.817);
INSERT INTO tb_cidades VALUES (790, 'Tarrafas', 231325, 6, 8910, 19.61, 'tarrafense', 454.389);
INSERT INTO tb_cidades VALUES (791, 'Tau�', 231330, 6, 55716, 13.9, 'tauaense', 4009.271);
INSERT INTO tb_cidades VALUES (793, 'Tiangu�', 231340, 6, 68892, 75.8, 'tianguaense', 908.883);
INSERT INTO tb_cidades VALUES (795, 'Tururu', 231355, 6, 14408, 71.23, 'tururuense', 202.275);
INSERT INTO tb_cidades VALUES (797, 'Umari', 231370, 6, 7545, 28.59, 'umariense', 263.928);
INSERT INTO tb_cidades VALUES (798, 'Umirim', 231375, 6, 18802, 59.35, 'umiriense', 316.816);
INSERT INTO tb_cidades VALUES (800, 'Uruoca', 231390, 6, 12883, 18.49, 'uruoquense', 696.749);
INSERT INTO tb_cidades VALUES (802, 'V�rzea Alegre', 231400, 6, 38434, 45.99, 'varzea-alegrense', 835.705);
INSERT INTO tb_cidades VALUES (804, 'Bras�lia', 530010, 7, 2570160, 444.07, 'brasiliense', 5787.784);
INSERT INTO tb_cidades VALUES (806, '�gua Doce Do Norte', 320016, 8, 11771, 24.32, '�gua-docense', 484.047);
INSERT INTO tb_cidades VALUES (807, '�guia Branca', 320013, 8, 9519, 21.17, 'aguiabranquense', 449.633);
INSERT INTO tb_cidades VALUES (809, 'Alfredo Chaves', 320030, 8, 13955, 22.67, 'alfredense', 615.595);
INSERT INTO tb_cidades VALUES (811, 'Anchieta', 320040, 8, 23902, 58.61, 'anchietense', 407.811);
INSERT INTO tb_cidades VALUES (812, 'Apiac�', 320050, 8, 7512, 38.8, 'apiacaense', 193.587);
INSERT INTO tb_cidades VALUES (815, 'Baixo Guandu', 320080, 8, 29081, 31.68, 'guanduense', 917.892);
INSERT INTO tb_cidades VALUES (816, 'Barra De S�o Francisco', 320090, 8, 40649, 43.53, 'franciscano', 933.754);
INSERT INTO tb_cidades VALUES (818, 'Bom Jesus Do Norte', 320110, 8, 9476, 106.45, 'bom-jesuense', 89.02);
INSERT INTO tb_cidades VALUES (819, 'Brejetuba', 320115, 8, 11915, 34.79, 'brejetubense', 342.509);
INSERT INTO tb_cidades VALUES (821, 'Cariacica', 320130, 8, 348738, 1.245, 'cariaciquense', 279.976);
INSERT INTO tb_cidades VALUES (823, 'Colatina', 320150, 8, 111788, 78.54, 'colatinense', 1423.277);
INSERT INTO tb_cidades VALUES (825, 'Concei��o Do Castelo', 320170, 8, 11681, 31.63, 'concei��oense', 369.279);
INSERT INTO tb_cidades VALUES (826, 'Divino De S�o Louren�o', 320180, 8, 4516, 25.69, 's�o-lourencense', 175.792);
INSERT INTO tb_cidades VALUES (828, 'Dores Do Rio Preto', 320200, 8, 6397, 40.35, 'rio-pretense', 158.528);
INSERT INTO tb_cidades VALUES (829, 'Ecoporanga', 320210, 8, 23212, 10.17, 'ecoporanguense', 2283.227);
INSERT INTO tb_cidades VALUES (832, 'Gua�u�', 320230, 8, 27851, 59.54, 'gua�uiense', 467.759);
INSERT INTO tb_cidades VALUES (833, 'Guarapari', 320240, 8, 105286, 176.81, 'guarapariense', 595.483);
INSERT INTO tb_cidades VALUES (835, 'Ibira�u', 320250, 8, 11178, 55.93, 'ibira�uense', 199.849);
INSERT INTO tb_cidades VALUES (836, 'Ibitirama', 320255, 8, 8957, 27.19, 'ibitiranense', 329.449);
INSERT INTO tb_cidades VALUES (838, 'Irupi', 320265, 8, 11723, 63.56, 'irupiense', 184.428);
INSERT INTO tb_cidades VALUES (840, 'Itapemirim', 320280, 8, 30988, 55.6, 'itapemirinense', 557.325);
INSERT INTO tb_cidades VALUES (842, 'I�na', 320300, 8, 27328, 59.36, 'iunense', 460.365);
INSERT INTO tb_cidades VALUES (843, 'Jaguar�', 320305, 8, 24678, 37.6, 'jaguarense', 656.37);
INSERT INTO tb_cidades VALUES (845, 'Jo�o Neiva', 320313, 8, 15809, 57.94, 'jo�o-neivense', 272.834);
INSERT INTO tb_cidades VALUES (847, 'Linhares', 320320, 8, 141306, 40.35, 'linharense', 3501.627);
INSERT INTO tb_cidades VALUES (849, 'Marata�zes', 320332, 8, 34140, 252.23, 'marataizense', 135.35);
INSERT INTO tb_cidades VALUES (850, 'Marechal Floriano', 320334, 8, 14262, 49.85, 'florianense', 286.103);
INSERT INTO tb_cidades VALUES (852, 'Mimoso Do Sul', 320340, 8, 25902, 29.87, 'mimosense', 867.283);
INSERT INTO tb_cidades VALUES (854, 'Mucurici', 320360, 8, 5655, 10.5, 'mucuriciense', 538.813);
INSERT INTO tb_cidades VALUES (856, 'Muqui', 320380, 8, 14396, 44.04, 'muquiense', 326.874);
INSERT INTO tb_cidades VALUES (857, 'Nova Ven�cia', 320390, 8, 46031, 31.78, 'veneciano', 1448.362);
INSERT INTO tb_cidades VALUES (859, 'Pedro Can�rio', 320405, 8, 23794, 54.82, 'canariense', 434.054);
INSERT INTO tb_cidades VALUES (861, 'Pi�ma', 320420, 8, 18123, 242.79, 'piumense', 74.645);
INSERT INTO tb_cidades VALUES (862, 'Ponto Belo', 320425, 8, 6979, 19.6, 'pontobelense', 356.158);
INSERT INTO tb_cidades VALUES (864, 'Rio Bananal', 320435, 8, 17530, 27.16, 'ribanense', 645.482);
INSERT INTO tb_cidades VALUES (866, 'Santa Leopoldina', 320450, 8, 12240, 17.08, 'leopoldinense', 716.444);
INSERT INTO tb_cidades VALUES (868, 'Santa Teresa', 320460, 8, 21823, 31.42, 'teresense', 694.534);
INSERT INTO tb_cidades VALUES (869, 'S�o Domingos Do Norte', 320465, 8, 8001, 26.72, 'dominguense', 299.49);
INSERT INTO tb_cidades VALUES (871, 'S�o Jos� Do Cal�ado', 320480, 8, 10408, 38.17, 'cal�adense', 272.645);
INSERT INTO tb_cidades VALUES (872, 'S�o Mateus', 320490, 8, 109028, 46.53, 'mateense', 2343.15);
INSERT INTO tb_cidades VALUES (874, 'Serra', 320500, 8, 409267, 739.38, 'serrano', 553.526);
INSERT INTO tb_cidades VALUES (875, 'Sooretama', 320501, 8, 23843, 40.18, 'sooretamense', 593.387);
INSERT INTO tb_cidades VALUES (877, 'Venda Nova Do Imigrante', 320506, 8, 20447, 108.82, 'venda-novense', 187.895);
INSERT INTO tb_cidades VALUES (879, 'Vila Pav�o', 320515, 8, 8672, 20.04, 'pavoense', 432.745);
INSERT INTO tb_cidades VALUES (881, 'Vila Velha', 320520, 8, 414586, 1.951, 'vila-velhense', 212.392);
INSERT INTO tb_cidades VALUES (882, 'Vit�ria', 320530, 8, 327801, 3.327, 'capixaba', 98.506);
INSERT INTO tb_cidades VALUES (884, 'Abadi�nia', 520010, 9, 15757, 15.08, 'abadiense', 1045.126);
INSERT INTO tb_cidades VALUES (886, 'Adel�ndia', 520015, 9, 2477, 21.47, 'adelandense', 115.353);
INSERT INTO tb_cidades VALUES (888, '�gua Limpa', 520020, 9, 2013, 4.45, '�gua-limpense', 452.858);
INSERT INTO tb_cidades VALUES (889, '�guas Lindas De Goi�s', 520025, 9, 159378, 846.03, '�guas lindense', 188.384);
INSERT INTO tb_cidades VALUES (891, 'Alo�ndia', 520050, 9, 2051, 20.08, 'aloandense', 102.16);
INSERT INTO tb_cidades VALUES (893, 'Alto Para�so De Goi�s', 520060, 9, 6885, 2.65, 'alto-paraisense', 2593.901);
INSERT INTO tb_cidades VALUES (894, 'Alvorada Do Norte', 520080, 9, 8084, 6.42, 'alvoradense', 1259.364);
INSERT INTO tb_cidades VALUES (896, 'Americano Do Brasil', 520085, 9, 5508, 41.24, 'americanense-do-Brasil', 133.563);
INSERT INTO tb_cidades VALUES (898, 'An�polis', 520110, 9, 334613, 358.58, 'anapolino', 933.156);
INSERT INTO tb_cidades VALUES (2724, 'Salgadinho', 251300, 15, 3508, 19.04, 'salgadinhense', 184.239);
INSERT INTO tb_cidades VALUES (902, 'Aparecida Do Rio Doce', 520145, 9, 2427, 4.03, 'riodocense', 602.134);
INSERT INTO tb_cidades VALUES (903, 'Apor�', 520150, 9, 3803, 1.31, 'aporeano', 2900.162);
INSERT INTO tb_cidades VALUES (905, 'Aragar�as', 520170, 9, 18305, 27.61, 'aragarcense', 662.917);
INSERT INTO tb_cidades VALUES (907, 'Araguapaz', 520215, 9, 7510, 3.42, 'araguapaense', 2193.699);
INSERT INTO tb_cidades VALUES (909, 'Aruan�', 520250, 9, 7496, 2.46, 'aruanense', 3050.304);
INSERT INTO tb_cidades VALUES (910, 'Auril�ndia', 520260, 9, 3650, 6.46, 'aurilandense', 565.34);
INSERT INTO tb_cidades VALUES (912, 'Baliza', 520310, 9, 3714, 2.08, 'balizense', 1782.596);
INSERT INTO tb_cidades VALUES (914, 'Bela Vista De Goi�s', 520330, 9, 24554, 19.56, 'bela-vistense', 1255.419);
INSERT INTO tb_cidades VALUES (916, 'Bom Jesus De Goi�s', 520350, 9, 20727, 14.75, 'bom-jesuense', 1405.119);
INSERT INTO tb_cidades VALUES (917, 'Bonfin�polis', 520355, 9, 7536, 61.62, 'bonfinopolino', 122.29);
INSERT INTO tb_cidades VALUES (919, 'Brazabrantes', 520360, 9, 3232, 26.26, 'brazabrantino', 123.072);
INSERT INTO tb_cidades VALUES (921, 'Buriti Alegre', 520390, 9, 9054, 10.11, 'buriti-alegrense', 895.456);
INSERT INTO tb_cidades VALUES (923, 'Buritin�polis', 520396, 9, 3321, 13.44, 'buritinopolense', 247.047);
INSERT INTO tb_cidades VALUES (924, 'Cabeceiras', 520400, 9, 7354, 6.52, 'cabeceirense', 1127.604);
INSERT INTO tb_cidades VALUES (926, 'Cachoeira De Goi�s', 520420, 9, 1417, 3.35, 'cachoeirense', 422.751);
INSERT INTO tb_cidades VALUES (928, 'Ca�u', 520430, 9, 13283, 5.9, 'ca�uense', 2251.008);
INSERT INTO tb_cidades VALUES (929, 'Caiap�nia', 520440, 9, 16757, 1.94, 'caiaponiense', 8637.872);
INSERT INTO tb_cidades VALUES (931, 'Caldazinha', 520455, 9, 3325, 13.25, 'caldazinhense', 250.887);
INSERT INTO tb_cidades VALUES (933, 'Campina�u', 520465, 9, 3656, 1.85, 'campina�uense', 1974.372);
INSERT INTO tb_cidades VALUES (934, 'Campinorte', 520470, 9, 11111, 10.41, 'campinortense', 1067.196);
INSERT INTO tb_cidades VALUES (936, 'Campo Limpo De Goi�s', 520485, 9, 6241, 39.11, 'campolimpense', 159.557);
INSERT INTO tb_cidades VALUES (938, 'Campos Verdes', 520495, 9, 5020, 11.37, 'campo-verdense', 441.645);
INSERT INTO tb_cidades VALUES (940, 'Castel�ndia', 520505, 9, 3638, 12.23, 'castelandense', 297.428);
INSERT INTO tb_cidades VALUES (941, 'Catal�o', 520510, 9, 86647, 22.67, 'catalano', 3821.461);
INSERT INTO tb_cidades VALUES (943, 'Cavalcante', 520530, 9, 9392, 1.35, 'cavalcantense', 6953.654);
INSERT INTO tb_cidades VALUES (944, 'Ceres', 520540, 9, 20722, 96.69, 'ceresino', 214.321);
INSERT INTO tb_cidades VALUES (946, 'Chapad�o Do C�u', 520547, 9, 7001, 3.2, 'chapadense', 2185.125);
INSERT INTO tb_cidades VALUES (948, 'Cocalzinho De Goi�s', 520551, 9, 17407, 9.73, 'cocalzinhense', 1789.039);
INSERT INTO tb_cidades VALUES (950, 'C�rrego Do Ouro', 520570, 9, 2632, 5.69, 'corregorino', 462.304);
INSERT INTO tb_cidades VALUES (951, 'Corumb� De Goi�s', 520580, 9, 10361, 9.76, 'corumbaense', 1061.954);
INSERT INTO tb_cidades VALUES (953, 'Cristalina', 520620, 9, 46580, 7.56, 'cristalinense', 6162.056);
INSERT INTO tb_cidades VALUES (955, 'Crix�s', 520640, 9, 15760, 3.38, 'crixasense', 4661.158);
INSERT INTO tb_cidades VALUES (957, 'Cumari', 520660, 9, 2964, 5.2, 'cumarino', 570.541);
INSERT INTO tb_cidades VALUES (958, 'Damian�polis', 520670, 9, 3292, 7.93, 'damianopolino', 415.348);
INSERT INTO tb_cidades VALUES (960, 'Davin�polis', 520690, 9, 2056, 4.27, 'davinopolino', 481.296);
INSERT INTO tb_cidades VALUES (962, 'Divin�polis De Goi�s', 520830, 9, 4962, 5.97, 'divinopolino', 830.976);
INSERT INTO tb_cidades VALUES (964, 'Edealina', 520735, 9, 3733, 6.18, 'edealinense', 603.654);
INSERT INTO tb_cidades VALUES (965, 'Ed�ia', 520740, 9, 11266, 7.71, 'edeiense', 1461.503);
INSERT INTO tb_cidades VALUES (967, 'Faina', 520753, 9, 6983, 3.59, 'fainense', 1945.657);
INSERT INTO tb_cidades VALUES (969, 'Firmin�polis', 520780, 9, 11580, 27.33, 'firminopolense', 423.649);
INSERT INTO tb_cidades VALUES (971, 'Formosa', 520800, 9, 100085, 17.22, 'formosense', 5811.782);
INSERT INTO tb_cidades VALUES (972, 'Formoso', 520810, 9, 4883, 5.78, 'formosense ', 844.288);
INSERT INTO tb_cidades VALUES (974, 'Goian�polis', 520840, 9, 10695, 65.84, 'goianapolino', 162.435);
INSERT INTO tb_cidades VALUES (975, 'Goiandira', 520850, 9, 5265, 9.32, 'goiandirense', 564.687);
INSERT INTO tb_cidades VALUES (977, 'Goi�nia', 520870, 9, 1302001, 1.776, 'goianiense', 732.801);
INSERT INTO tb_cidades VALUES (979, 'Goi�s', 520890, 9, 24727, 7.96, 'goiano', 3108.018);
INSERT INTO tb_cidades VALUES (981, 'Gouvel�ndia', 520915, 9, 4949, 6, 'gouvelandense', 824.26);
INSERT INTO tb_cidades VALUES (982, 'Guap�', 520920, 9, 13976, 27.04, 'guapoense', 516.844);
INSERT INTO tb_cidades VALUES (984, 'Guarani De Goi�s', 520940, 9, 4258, 3.46, 'guaraniense', 1229.145);
INSERT INTO tb_cidades VALUES (986, 'Heitora�', 520960, 9, 3571, 15.55, 'heitoraiense', 229.638);
INSERT INTO tb_cidades VALUES (988, 'Hidrolina', 520980, 9, 4029, 6.94, 'hidrolinense', 580.39);
INSERT INTO tb_cidades VALUES (989, 'Iaciara', 520990, 9, 12427, 8.02, 'iaciarense', 1550.373);
INSERT INTO tb_cidades VALUES (991, 'Indiara', 520995, 9, 13687, 14.31, 'indiarense', 956.474);
INSERT INTO tb_cidades VALUES (993, 'Ipameri', 521010, 9, 24735, 5.66, 'ipamerino', 4368.985);
INSERT INTO tb_cidades VALUES (995, 'Ipor�', 521020, 9, 31274, 30.47, 'iporaense', 1026.383);
INSERT INTO tb_cidades VALUES (996, 'Israel�ndia', 521030, 9, 2887, 5, 'israelandense', 577.482);
INSERT INTO tb_cidades VALUES (998, 'Itaguari', 521056, 9, 4513, 30.78, 'itaguarino', 146.638);
INSERT INTO tb_cidades VALUES (1000, 'Itaj�', 521080, 9, 5062, 2.42, 'itajaense', 2091.399);
INSERT INTO tb_cidades VALUES (1002, 'Itapirapu�', 521100, 9, 7835, 3.83, 'itapirapuano', 2043.714);
INSERT INTO tb_cidades VALUES (1003, 'Itapuranga', 521120, 9, 26125, 20.47, 'itapuranguense', 1276.478);
INSERT INTO tb_cidades VALUES (1005, 'Itau�u', 521140, 9, 8575, 22.34, 'itau�uense', 383.842);
INSERT INTO tb_cidades VALUES (1007, 'Ivol�ndia', 521160, 9, 2663, 2.12, 'ivolandense', 1257.663);
INSERT INTO tb_cidades VALUES (1009, 'Jaragu�', 521180, 9, 41870, 22.64, 'jaraguense', 1849.551);
INSERT INTO tb_cidades VALUES (1011, 'Jaupaci', 521200, 9, 3000, 5.69, 'jaupacino', 527.103);
INSERT INTO tb_cidades VALUES (1012, 'Jes�polis', 521205, 9, 2300, 18.78, 'jesupolino', 122.475);
INSERT INTO tb_cidades VALUES (1014, 'Jussara', 521220, 9, 19153, 4.69, 'jussariano', 4084.113);
INSERT INTO tb_cidades VALUES (1016, 'Leopoldo De Bulh�es', 521230, 9, 7882, 16.39, 'leopoldense', 480.891);
INSERT INTO tb_cidades VALUES (1018, 'Mairipotaba', 521260, 9, 2374, 5.08, 'mairipotabense', 467.428);
INSERT INTO tb_cidades VALUES (1020, 'Mara Rosa', 521280, 9, 10649, 6.31, 'mara-rosense', 1687.903);
INSERT INTO tb_cidades VALUES (1021, 'Marzag�o', 521290, 9, 2072, 9.32, 'marzagonense', 222.428);
INSERT INTO tb_cidades VALUES (1023, 'Mauril�ndia', 521300, 9, 11521, 29.56, 'maurilandense', 389.756);
INSERT INTO tb_cidades VALUES (1025, 'Mina�u', 521308, 9, 31154, 10.89, 'mina�uense', 2860.731);
INSERT INTO tb_cidades VALUES (1027, 'Moipor�', 521340, 9, 1763, 3.83, 'moiporaense', 460.624);
INSERT INTO tb_cidades VALUES (2863, 'Ipojuca', 260720, 16, 80637, 151.39, 'ipojuquense', 532.644);
INSERT INTO tb_cidades VALUES (1029, 'Montes Claros De Goi�s', 521370, 9, 7987, 2.75, 'montes-clarense', 2899.176);
INSERT INTO tb_cidades VALUES (1031, 'Montividiu Do Norte', 521377, 9, 4122, 3.09, 'montividense', 1332.994);
INSERT INTO tb_cidades VALUES (1033, 'Morro Agudo De Goi�s', 521385, 9, 2356, 8.34, 'morro-agudense', 282.616);
INSERT INTO tb_cidades VALUES (1034, 'Moss�medes', 521390, 9, 5007, 7.32, 'mossamedino', 684.452);
INSERT INTO tb_cidades VALUES (1036, 'Mundo Novo', 521405, 9, 6438, 3, 'mundo-novense', 2146.649);
INSERT INTO tb_cidades VALUES (1038, 'Naz�rio', 521440, 9, 7874, 29.26, 'nazarinense', 269.103);
INSERT INTO tb_cidades VALUES (1039, 'Ner�polis', 521450, 9, 24210, 118.55, 'neropolino', 204.217);
INSERT INTO tb_cidades VALUES (1041, 'Nova Am�rica', 521470, 9, 2259, 10.65, 'nova-americano', 212.025);
INSERT INTO tb_cidades VALUES (1043, 'Nova Crix�s', 521483, 9, 11927, 1.63, 'nova-crixaense', 7298.775);
INSERT INTO tb_cidades VALUES (1045, 'Nova Igua�u De Goi�s', 521487, 9, 2826, 4.5, 'nova igua�uense', 628.444);
INSERT INTO tb_cidades VALUES (1046, 'Nova Roma', 521490, 9, 3471, 1.63, 'nova-romano', 2135.956);
INSERT INTO tb_cidades VALUES (1048, 'Novo Brasil', 521520, 9, 3519, 5.41, 'novo-brasilense', 649.954);
INSERT INTO tb_cidades VALUES (1050, 'Novo Planalto', 521525, 9, 3956, 3.18, 'planaltense', 1242.733);
INSERT INTO tb_cidades VALUES (1052, 'Ouro Verde De Goi�s', 521540, 9, 4034, 19.32, 'ouro-verdense', 208.769);
INSERT INTO tb_cidades VALUES (1054, 'Padre Bernardo', 521560, 9, 27671, 8.82, 'padre-bernardense', 3138.86);
INSERT INTO tb_cidades VALUES (1056, 'Palmeiras De Goi�s', 521570, 9, 23338, 15.16, 'palmeirense', 1539.692);
INSERT INTO tb_cidades VALUES (1057, 'Palmelo', 521580, 9, 2335, 39.6, 'palmelino', 58.959);
INSERT INTO tb_cidades VALUES (1059, 'Panam�', 521600, 9, 2682, 6.18, 'panamenho', 433.761);
INSERT INTO tb_cidades VALUES (1061, 'Para�na', 521640, 9, 10863, 2.87, 'paraunense', 3779.384);
INSERT INTO tb_cidades VALUES (1062, 'Perol�ndia', 521645, 9, 2950, 2.87, 'perolandense', 1029.625);
INSERT INTO tb_cidades VALUES (1064, 'Pilar De Goi�s', 521690, 9, 2773, 3.06, 'pilarense', 906.649);
INSERT INTO tb_cidades VALUES (1066, 'Piranhas', 521720, 9, 11266, 5.5, 'piranhense', 2047.765);
INSERT INTO tb_cidades VALUES (1068, 'Pires Do Rio', 521740, 9, 28762, 26.8, 'piresino', 1073.36);
INSERT INTO tb_cidades VALUES (1069, 'Planaltina', 521760, 9, 81649, 32.17, 'planaltinense', 2538.196);
INSERT INTO tb_cidades VALUES (1071, 'Porangatu', 521800, 9, 42355, 8.79, 'porangatuense', 4820.508);
INSERT INTO tb_cidades VALUES (1073, 'Portel�ndia', 521810, 9, 3839, 6.9, 'portelandense', 556.576);
INSERT INTO tb_cidades VALUES (1074, 'Posse', 521830, 9, 31419, 15.52, 'possense', 2024.533);
INSERT INTO tb_cidades VALUES (1076, 'Quirin�polis', 521850, 9, 43220, 11.41, 'quirinopolino', 3786.695);
INSERT INTO tb_cidades VALUES (1078, 'Rian�polis', 521870, 9, 4566, 28.67, 'rianapolino', 159.255);
INSERT INTO tb_cidades VALUES (1080, 'Rio Verde', 521880, 9, 176424, 21.05, 'rio-verdense', 8379.661);
INSERT INTO tb_cidades VALUES (1081, 'Rubiataba', 521890, 9, 18915, 25.28, 'rubiatabense', 748.264);
INSERT INTO tb_cidades VALUES (1083, 'Santa B�rbara De Goi�s', 521910, 9, 5751, 41.2, 'santa-barbarense', 139.598);
INSERT INTO tb_cidades VALUES (1085, 'Santa F� De Goi�s', 521925, 9, 4762, 4.07, 'santa-feense', 1169.167);
INSERT INTO tb_cidades VALUES (1087, 'Santa Isabel', 521935, 9, 3686, 4.57, 'santa-isabelense', 807.204);
INSERT INTO tb_cidades VALUES (1088, 'Santa Rita Do Araguaia', 521940, 9, 6924, 5.08, 'santa-ritense', 1361.772);
INSERT INTO tb_cidades VALUES (1090, 'Santa Rosa De Goi�s', 521950, 9, 2909, 17.73, 'santa-rosense', 164.097);
INSERT INTO tb_cidades VALUES (1092, 'Santa Terezinha De Goi�s', 521970, 9, 10302, 8.57, 'terezinhense', 1202.238);
INSERT INTO tb_cidades VALUES (1093, 'Santo Ant�nio Da Barra', 521971, 9, 4423, 9.79, 'santatoniense', 451.598);
INSERT INTO tb_cidades VALUES (1095, 'Santo Ant�nio Do Descoberto', 521975, 9, 63248, 67, 'descobertense', 944.046);
INSERT INTO tb_cidades VALUES (1096, 'S�o Domingos', 521980, 9, 11272, 3.42, 'dominicano', 3295.727);
INSERT INTO tb_cidades VALUES (1098, 'S�o Jo�o D`Alian�a', 522000, 9, 10257, 3.08, 's�o-joanense', 3327.374);
INSERT INTO tb_cidades VALUES (1100, 'S�o Lu�s De Montes Belos', 522010, 9, 30034, 36.36, 'monte-belense', 825.999);
INSERT INTO tb_cidades VALUES (1101, 'S�o Lu�z Do Norte', 522015, 9, 4617, 7.88, 's�o-luizense', 586.058);
INSERT INTO tb_cidades VALUES (1103, 'S�o Miguel Do Passa Quatro', 522026, 9, 3757, 6.99, 'passa-quatrense', 537.785);
INSERT INTO tb_cidades VALUES (1104, 'S�o Patr�cio', 522028, 9, 1991, 11.58, 'sampatriciense', 171.957);
INSERT INTO tb_cidades VALUES (1106, 'Senador Canedo', 522045, 9, 84443, 344.27, 'canedense', 245.283);
INSERT INTO tb_cidades VALUES (1108, 'Silv�nia', 522060, 9, 19089, 8.14, 'silvaniense', 2345.939);
INSERT INTO tb_cidades VALUES (1109, 'Simol�ndia', 522068, 9, 6514, 18.72, 'simolandense', 347.976);
INSERT INTO tb_cidades VALUES (1111, 'Taquaral De Goi�s', 522100, 9, 3541, 17.34, 'taquaralense', 204.218);
INSERT INTO tb_cidades VALUES (1113, 'Terez�polis De Goi�s', 522119, 9, 6561, 61.37, 'terezopolino', 106.913);
INSERT INTO tb_cidades VALUES (1115, 'Trindade', 522140, 9, 104488, 147.02, 'trindadense', 710.713);
INSERT INTO tb_cidades VALUES (1116, 'Trombas', 522145, 9, 3452, 4.32, 'trombense', 799.124);
INSERT INTO tb_cidades VALUES (1118, 'Turvel�ndia', 522155, 9, 4399, 4.71, 'turvelandense', 933.957);
INSERT INTO tb_cidades VALUES (1120, 'Urua�u', 522160, 9, 36929, 17.24, 'urua�uense', 2141.815);
INSERT INTO tb_cidades VALUES (1122, 'Uruta�', 522180, 9, 3074, 4.9, 'uruta�no', 626.722);
INSERT INTO tb_cidades VALUES (1124, 'Varj�o', 522190, 9, 3659, 7.05, 'varj�oense', 519.194);
INSERT INTO tb_cidades VALUES (1125, 'Vian�polis', 522200, 9, 12548, 13.15, 'vianopolino', 954.283);
INSERT INTO tb_cidades VALUES (1127, 'Vila Boa', 522220, 9, 4735, 4.47, 'vilaboense', 1060.17);
INSERT INTO tb_cidades VALUES (1128, 'Vila Prop�cio', 522230, 9, 5145, 2.36, 'propiciense', 2181.58);
INSERT INTO tb_cidades VALUES (1130, 'Afonso Cunha', 210010, 10, 5905, 15.9, 'afonso-cunhense', 371.336);
INSERT INTO tb_cidades VALUES (1132, 'Alc�ntara', 210020, 10, 21851, 14.7, 'alcantarense', 1486.67);
INSERT INTO tb_cidades VALUES (1133, 'Aldeias Altas', 210030, 10, 23952, 12.33, 'aldeias-altense', 1942.105);
INSERT INTO tb_cidades VALUES (1135, 'Alto Alegre Do Maranh�o', 210043, 10, 24599, 64.18, 'alto-alegrense ', 383.303);
INSERT INTO tb_cidades VALUES (1137, 'Alto Parna�ba', 210050, 10, 10766, 0.97, 'alto-parnaibano', 11132.142);
INSERT INTO tb_cidades VALUES (1138, 'Amap� Do Maranh�o', 210055, 10, 6431, 12.8, 'amapaense', 502.397);
INSERT INTO tb_cidades VALUES (1140, 'Anajatuba', 210070, 10, 25291, 25.01, 'anajatubense', 1011.124);
INSERT INTO tb_cidades VALUES (1141, 'Anapurus', 210080, 10, 13939, 22.91, 'anapuruense', 608.293);
INSERT INTO tb_cidades VALUES (1143, 'Araguan�', 210087, 10, 13973, 17.35, 'araguanaense ', 805.194);
INSERT INTO tb_cidades VALUES (1145, 'Arame', 210095, 10, 31702, 10.54, 'aramense', 3008.675);
INSERT INTO tb_cidades VALUES (1147, 'Axix�', 210110, 10, 11407, 56.15, 'axixaense', 203.152);
INSERT INTO tb_cidades VALUES (1148, 'Bacabal', 210120, 10, 100014, 59.42, 'bacabalense', 1683.064);
INSERT INTO tb_cidades VALUES (1152, 'Balsas', 210140, 10, 83528, 6.36, 'balsense', 13141.688);
INSERT INTO tb_cidades VALUES (1154, 'Barra Do Corda', 210160, 10, 82830, 15.92, 'barra-cordense', 5202.679);
INSERT INTO tb_cidades VALUES (1156, 'Bela Vista Do Maranh�o', 210177, 10, 12049, 47.17, 'bela-vistense', 255.415);
INSERT INTO tb_cidades VALUES (1157, 'Bel�gua', 210173, 10, 6524, 13.06, 'belaguaense ', 499.424);
INSERT INTO tb_cidades VALUES (1159, 'Bequim�o', 210190, 10, 20344, 26.46, 'bequim�oense', 768.951);
INSERT INTO tb_cidades VALUES (1161, 'Boa Vista Do Gurupi', 210197, 10, 7949, 19.7, 'boa-vistense', 403.457);
INSERT INTO tb_cidades VALUES (1162, 'Bom Jardim', 210200, 10, 39049, 5.93, 'bom-jardinense', 6590.501);
INSERT INTO tb_cidades VALUES (1164, 'Bom Lugar', 210207, 10, 14818, 33.23, 'bom-lugarense', 445.978);
INSERT INTO tb_cidades VALUES (1166, 'Brejo De Areia', 210215, 10, 5577, 5.26, 'brejareiense ', 1059.279);
INSERT INTO tb_cidades VALUES (1167, 'Buriti', 210220, 10, 27013, 18.33, 'buritiense', 1473.994);
INSERT INTO tb_cidades VALUES (1169, 'Buriticupu', 210232, 10, 65237, 25.63, 'buriticupuense', 2545.566);
INSERT INTO tb_cidades VALUES (1171, 'Cachoeira Grande', 210237, 10, 8446, 11.97, 'cachoeirense', 705.641);
INSERT INTO tb_cidades VALUES (1173, 'Cajari', 210250, 10, 18338, 27.7, 'cajariense', 662.063);
INSERT INTO tb_cidades VALUES (1175, 'C�ndido Mendes', 210260, 10, 18505, 11.33, 'c�ndido-mendense', 1633.72);
INSERT INTO tb_cidades VALUES (1176, 'Cantanhede', 210270, 10, 20448, 26.45, 'cantanhedense', 773.006);
INSERT INTO tb_cidades VALUES (1178, 'Carolina', 210280, 10, 23959, 3.72, 'carolinense', 6441.581);
INSERT INTO tb_cidades VALUES (1179, 'Carutapera', 210290, 10, 22006, 17.86, 'carutaperense', 1232.074);
INSERT INTO tb_cidades VALUES (1181, 'Cedral', 210310, 10, 10297, 35.63, 'cedralense', 289.024);
INSERT INTO tb_cidades VALUES (1183, 'Centro Do Guilherme', 210315, 10, 12565, 11.7, 'centroguilhermense', 1074.061);
INSERT INTO tb_cidades VALUES (1185, 'Chapadinha', 210320, 10, 73350, 22.59, 'chapadinhense', 3247.366);
INSERT INTO tb_cidades VALUES (1186, 'Cidel�ndia', 210325, 10, 13681, 9.34, 'cidelandense', 1464.027);
INSERT INTO tb_cidades VALUES (1188, 'Coelho Neto', 210340, 10, 46750, 47.92, 'coelho-netense', 975.544);
INSERT INTO tb_cidades VALUES (1190, 'Concei��o Do Lago A�u', 210355, 10, 14436, 19.69, 'lagoa�uense', 733.227);
INSERT INTO tb_cidades VALUES (1191, 'Coroat�', 210360, 10, 61725, 27.27, 'coroataense', 2263.769);
INSERT INTO tb_cidades VALUES (1193, 'Davin�polis', 210375, 10, 12579, 37.44, 'davinopolitano', 335.969);
INSERT INTO tb_cidades VALUES (1195, 'Duque Bacelar', 210390, 10, 10649, 33.5, 'bacelarense', 317.918);
INSERT INTO tb_cidades VALUES (1197, 'Estreito', 210405, 10, 35835, 13.18, 'estreitense', 2718.97);
INSERT INTO tb_cidades VALUES (1199, 'Fernando Falc�o', 210408, 10, 9241, 1.82, 'fernandense', 5086.563);
INSERT INTO tb_cidades VALUES (1200, 'Formosa Da Serra Negra', 210409, 10, 17757, 4.49, 'formosense', 3950.516);
INSERT INTO tb_cidades VALUES (1202, 'Fortuna', 210420, 10, 15098, 21.72, 'fortunense', 694.992);
INSERT INTO tb_cidades VALUES (1203, 'Godofredo Viana', 210430, 10, 10635, 15.77, 'godofredense', 674.419);
INSERT INTO tb_cidades VALUES (1205, 'Governador Archer', 210450, 10, 10205, 22.63, 'archense', 450.894);
INSERT INTO tb_cidades VALUES (1207, 'Governador Eug�nio Barros', 210460, 10, 15991, 19.57, ' eug�nio-barrense', 816.99);
INSERT INTO tb_cidades VALUES (1209, 'Governador Newton Bello', 210465, 10, 11921, 10.27, 'newton-belense', 1160.49);
INSERT INTO tb_cidades VALUES (1210, 'Governador Nunes Freire', 210467, 10, 25401, 24.49, 'nunes-freirense', 1037.125);
INSERT INTO tb_cidades VALUES (1212, 'Graja�', 210480, 10, 62093, 7.03, 'grajauense', 8830.886);
INSERT INTO tb_cidades VALUES (1213, 'Guimar�es', 210490, 10, 12081, 20.29, 'vimaranense', 595.379);
INSERT INTO tb_cidades VALUES (1215, 'Icatu', 210510, 10, 25145, 17.36, 'icatuense', 1448.793);
INSERT INTO tb_cidades VALUES (1217, 'Igarap� Grande', 210520, 10, 11041, 29.5, 'igarap�-grandense', 374.246);
INSERT INTO tb_cidades VALUES (1218, 'Imperatriz', 210530, 10, 247505, 180.79, 'imperatrizense', 1368.982);
INSERT INTO tb_cidades VALUES (1220, 'Itapecuru Mirim', 210540, 10, 62110, 42.21, 'itapecuruense', 1471.431);
INSERT INTO tb_cidades VALUES (1222, 'Jatob�', 210545, 10, 8526, 14.42, 'jatobaense', 591.38);
INSERT INTO tb_cidades VALUES (1224, 'Jo�o Lisboa', 210550, 10, 20381, 32, 'jo�o-lisboense', 636.889);
INSERT INTO tb_cidades VALUES (1225, 'Josel�ndia', 210560, 10, 15433, 22.64, 'joselandense', 681.688);
INSERT INTO tb_cidades VALUES (1227, 'Lago Da Pedra', 210570, 10, 46083, 37.68, 'lago-pedrense', 1223.171);
INSERT INTO tb_cidades VALUES (1229, 'Lago Dos Rodrigues', 210594, 10, 7794, 43.21, 'lago-rodriguense', 180.369);
INSERT INTO tb_cidades VALUES (1230, 'Lago Verde', 210590, 10, 15412, 24.73, 'lago-verdense', 623.231);
INSERT INTO tb_cidades VALUES (1232, 'Lagoa Grande Do Maranh�o', 210596, 10, 10517, 14.13, 'lagoa-grandense', 744.293);
INSERT INTO tb_cidades VALUES (1234, 'Lima Campos', 210600, 10, 11423, 35.48, 'lima-campense', 321.93);
INSERT INTO tb_cidades VALUES (1235, 'Loreto', 210610, 10, 11390, 3.17, 'lorentense', 3596.826);
INSERT INTO tb_cidades VALUES (1237, 'Magalh�es De Almeida', 210630, 10, 17587, 40.6, 'magalhense', 433.148);
INSERT INTO tb_cidades VALUES (1239, 'Maraj� Do Sena', 210635, 10, 8051, 5.56, 'marajaense', 1447.669);
INSERT INTO tb_cidades VALUES (1241, 'Mata Roma', 210640, 10, 15150, 27.63, 'mata-romense', 548.411);
INSERT INTO tb_cidades VALUES (1242, 'Matinha', 210650, 10, 21885, 53.54, 'matinhense', 408.725);
INSERT INTO tb_cidades VALUES (1244, 'Mat�es Do Norte', 210663, 10, 13794, 17.36, 'norte-mat�ense', 794.647);
INSERT INTO tb_cidades VALUES (1246, 'Mirador', 210670, 10, 20452, 2.42, 'miradoense', 8450.811);
INSERT INTO tb_cidades VALUES (1247, 'Miranda Do Norte', 210675, 10, 24427, 71.61, 'mirandense-do-norte', 341.105);
INSERT INTO tb_cidades VALUES (1249, 'Mon��o', 210690, 10, 31738, 24.38, 'mon�onense', 1301.961);
INSERT INTO tb_cidades VALUES (1251, 'Morros', 210710, 10, 17783, 10.37, 'morroense', 1715.13);
INSERT INTO tb_cidades VALUES (1252, 'Nina Rodrigues', 210720, 10, 12464, 21.77, 'ninense', 572.506);
INSERT INTO tb_cidades VALUES (1254, 'Nova Iorque', 210730, 10, 4590, 4.7, 'nova-iorquino', 976.849);
INSERT INTO tb_cidades VALUES (1256, 'Olho D`�gua Das Cunh�s', 210740, 10, 18601, 26.75, 'olho-daguense', 695.345);
INSERT INTO tb_cidades VALUES (1258, 'Pa�o Do Lumiar', 210750, 10, 105121, 842.63, 'luminense', 124.753);
INSERT INTO tb_cidades VALUES (1259, 'Palmeir�ndia', 210760, 10, 18764, 35.7, 'palmeirandense', 525.58);
INSERT INTO tb_cidades VALUES (1261, 'Parnarama', 210780, 10, 34586, 10.06, 'parnaramense', 3439.208);
INSERT INTO tb_cidades VALUES (1262, 'Passagem Franca', 210790, 10, 17562, 12.93, 'passagense', 1358.321);
INSERT INTO tb_cidades VALUES (1264, 'Paulino Neves', 210805, 10, 14519, 14.83, 'paulinoense', 979.173);
INSERT INTO tb_cidades VALUES (1266, 'Pedreiras', 210820, 10, 39448, 136.77, 'pedreirense', 288.431);
INSERT INTO tb_cidades VALUES (1268, 'Penalva', 210830, 10, 34267, 46.42, 'penalvense', 738.25);
INSERT INTO tb_cidades VALUES (1269, 'Peri Mirim', 210840, 10, 13803, 34.06, 'peri-miriense', 405.3);
INSERT INTO tb_cidades VALUES (1271, 'Pindar� Mirim', 210850, 10, 31152, 127.25, 'pindareense', 244.815);
INSERT INTO tb_cidades VALUES (1273, 'Pio Xii', 210870, 10, 22016, 40.39, 'piodocense ', 545.137);
INSERT INTO tb_cidades VALUES (1276, 'Porto Franco', 210900, 10, 21530, 15.19, 'porto-franquino', 1417.488);
INSERT INTO tb_cidades VALUES (1277, 'Porto Rico Do Maranh�o', 210905, 10, 6030, 28.31, 'porto-riquense', 213.009);
INSERT INTO tb_cidades VALUES (1279, 'Presidente Juscelino', 210920, 10, 11541, 32.54, 'juscelinense', 354.694);
INSERT INTO tb_cidades VALUES (1281, 'Presidente Sarney', 210927, 10, 17165, 23.7, 'sarneyense', 724.151);
INSERT INTO tb_cidades VALUES (1282, 'Presidente Vargas', 210930, 10, 10717, 23.33, 'presidentino', 459.358);
INSERT INTO tb_cidades VALUES (1284, 'Raposa', 210945, 10, 26327, 409.1, 'raposense', 64.353);
INSERT INTO tb_cidades VALUES (1286, 'Ribamar Fiquene', 210955, 10, 7318, 9.75, 'fiquenense', 750.55);
INSERT INTO tb_cidades VALUES (1287, 'Ros�rio', 210960, 10, 39576, 57.77, 'rosariense', 685.032);
INSERT INTO tb_cidades VALUES (1290, 'Santa Helena', 210980, 10, 39110, 16.94, 'santa-helenense', 2308.182);
INSERT INTO tb_cidades VALUES (1291, 'Santa In�s', 210990, 10, 77282, 188.49, 'santa-inesense', 410.001);
INSERT INTO tb_cidades VALUES (1293, 'Santa Luzia Do Paru�', 211003, 10, 22644, 25.24, 'santa-luziense-do-paru�', 897.142);
INSERT INTO tb_cidades VALUES (1295, 'Santa Rita', 211020, 10, 32366, 45.82, 'santa-ritense', 706.381);
INSERT INTO tb_cidades VALUES (1296, 'Santana Do Maranh�o', 211023, 10, 11661, 12.51, 'santanense', 932.011);
INSERT INTO tb_cidades VALUES (1298, 'Santo Ant�nio Dos Lopes', 211030, 10, 14288, 18.53, 'santo-antoense', 770.919);
INSERT INTO tb_cidades VALUES (1300, 'S�o Bento', 211050, 10, 40736, 88.74, 'sambentuense', 459.068);
INSERT INTO tb_cidades VALUES (1301, 'S�o Bernardo', 211060, 10, 26476, 26.29, 'bernardense', 1006.913);
INSERT INTO tb_cidades VALUES (1303, 'S�o Domingos Do Maranh�o', 211070, 10, 33607, 29.17, 's�o-dominguense', 1151.973);
INSERT INTO tb_cidades VALUES (1304, 'S�o F�lix De Balsas', 211080, 10, 4702, 2.31, 's�o-felense', 2032.356);
INSERT INTO tb_cidades VALUES (1306, 'S�o Francisco Do Maranh�o', 211090, 10, 12146, 5.17, 's�o-franciscano', 2347.187);
INSERT INTO tb_cidades VALUES (1308, 'S�o Jo�o Do Car�', 211102, 10, 12309, 19.99, 'caruense', 615.692);
INSERT INTO tb_cidades VALUES (1310, 'S�o Jo�o Do Soter', 211107, 10, 17238, 11.99, ' sotense', 1438.063);
INSERT INTO tb_cidades VALUES (1311, 'S�o Jo�o Dos Patos', 211110, 10, 24928, 16.61, 'patoense', 1500.621);
INSERT INTO tb_cidades VALUES (1313, 'S�o Jos� Dos Bas�lios', 211125, 10, 7496, 20.67, 'basiliense', 362.69);
INSERT INTO tb_cidades VALUES (1314, 'S�o Lu�s', 211130, 10, 1014837, 1.215, 's�o-luisense', 834.78);
INSERT INTO tb_cidades VALUES (1316, 'S�o Mateus Do Maranh�o', 211150, 10, 39093, 49.91, 's�o-mateuense ', 783.22);
INSERT INTO tb_cidades VALUES (1317, 'S�o Pedro Da �gua Branca', 211153, 10, 12028, 16.69, 'agua-braquense', 720.456);
INSERT INTO tb_cidades VALUES (1319, 'S�o Raimundo Das Mangabeiras', 211160, 10, 17474, 4.96, 'mangabeirense', 3521.511);
INSERT INTO tb_cidades VALUES (1321, 'S�o Roberto', 211167, 10, 5957, 26.19, 's�o-robertense', 227.462);
INSERT INTO tb_cidades VALUES (1322, 'S�o Vicente Ferrer', 211170, 10, 20863, 53.38, 'vicentino', 390.843);
INSERT INTO tb_cidades VALUES (1324, 'Senador Alexandre Costa', 211174, 10, 10256, 24.05, 'alexandrecostense', 426.432);
INSERT INTO tb_cidades VALUES (1326, 'Serrano Do Maranh�o', 211178, 10, 10940, 9.06, 'serranense', 1207.053);
INSERT INTO tb_cidades VALUES (1327, 'S�tio Novo', 211180, 10, 17002, 5.46, 'sitio-novense', 3114.859);
INSERT INTO tb_cidades VALUES (1329, 'Sucupira Do Riach�o', 211195, 10, 4613, 8.17, 'sucupirense', 564.965);
INSERT INTO tb_cidades VALUES (1331, 'Timbiras', 211210, 10, 27997, 18.83, 'timbirense', 1486.58);
INSERT INTO tb_cidades VALUES (1332, 'Timon', 211220, 10, 155460, 89.18, 'timonense', 1743.228);
INSERT INTO tb_cidades VALUES (1334, 'Tufil�ndia', 211227, 10, 5596, 20.65, 'tufilandense', 271.009);
INSERT INTO tb_cidades VALUES (1336, 'Turia�u', 211240, 10, 33933, 13.16, 'turiense', 2578.483);
INSERT INTO tb_cidades VALUES (1337, 'Turil�ndia', 211245, 10, 22846, 15.11, 'turilandense', 1511.849);
INSERT INTO tb_cidades VALUES (1339, 'Urbano Santos', 211260, 10, 24573, 20.35, 'urbano-santense', 1207.628);
INSERT INTO tb_cidades VALUES (1341, 'Viana', 211280, 10, 49496, 42.36, 'vianense', 1168.437);
INSERT INTO tb_cidades VALUES (1343, 'Vit�ria Do Mearim', 211290, 10, 31217, 43.56, 'vitoriense', 716.716);
INSERT INTO tb_cidades VALUES (1344, 'Vitorino Freire', 211300, 10, 31658, 24.26, 'vitorinense', 1305.088);
INSERT INTO tb_cidades VALUES (1346, 'Abadia Dos Dourados', 310010, 11, 6704, 7.61, 'abadiense', 881.063);
INSERT INTO tb_cidades VALUES (1348, 'Abre Campo', 310030, 11, 13311, 28.29, 'abre-campense', 470.551);
INSERT INTO tb_cidades VALUES (1350, 'A�ucena', 310050, 11, 10276, 12.6, 'a�ucenense', 815.421);
INSERT INTO tb_cidades VALUES (1351, '�gua Boa', 310060, 11, 15195, 11.51, '�gua-boense', 1320.265);
INSERT INTO tb_cidades VALUES (1353, 'Aguanil', 310080, 11, 4054, 17.47, 'aguanilense', 232.091);
INSERT INTO tb_cidades VALUES (1355, '�guas Vermelhas', 310100, 11, 12722, 10.11, '�guas-vermelhense', 1258.795);
INSERT INTO tb_cidades VALUES (1357, 'Aiuruoca', 310120, 11, 6162, 9.48, 'aiuruocano', 649.68);
INSERT INTO tb_cidades VALUES (1358, 'Alagoa', 310130, 11, 2709, 16.79, 'alagoense', 161.356);
INSERT INTO tb_cidades VALUES (1360, 'Al�m Para�ba', 310150, 11, 34349, 67.3, 'al�m-para�bano', 510.354);
INSERT INTO tb_cidades VALUES (1362, 'Alfredo Vasconcelos', 310163, 11, 6075, 46.44, 'vasconcelense', 130.815);
INSERT INTO tb_cidades VALUES (1364, 'Alpercata', 310180, 11, 7172, 42.95, 'alpercatense', 166.972);
INSERT INTO tb_cidades VALUES (1366, 'Alterosa', 310200, 11, 13717, 37.89, 'alterosense', 362.01);
INSERT INTO tb_cidades VALUES (1367, 'Alto Capara�', 310205, 11, 5297, 51.08, 'alto caparoense', 103.69);
INSERT INTO tb_cidades VALUES (1369, 'Alto Rio Doce', 310210, 11, 12159, 23.47, 'alto-rio-docense', 518.052);
INSERT INTO tb_cidades VALUES (1371, 'Alvin�polis', 310230, 11, 15261, 25.46, 'alvinopolense', 599.443);
INSERT INTO tb_cidades VALUES (1373, 'Amparo Do Serra', 310250, 11, 5053, 34.63, 'serrense', 145.908);
INSERT INTO tb_cidades VALUES (1374, 'Andradas', 310260, 11, 37270, 79.4, 'andradense', 469.37);
INSERT INTO tb_cidades VALUES (1376, 'Angel�ndia', 310285, 11, 8003, 43.21, 'angelandense', 185.21);
INSERT INTO tb_cidades VALUES (1378, 'Ant�nio Dias', 310300, 11, 9565, 12.15, 'ant�nio-diense', 787.06);
INSERT INTO tb_cidades VALUES (1380, 'Ara�a�', 310320, 11, 2243, 12.02, 'ara�aiense', 186.543);
INSERT INTO tb_cidades VALUES (1381, 'Aracitaba', 310330, 11, 2058, 19.3, 'aracitabense', 106.608);
INSERT INTO tb_cidades VALUES (1383, 'Araguari', 310350, 11, 109801, 40.23, 'araguarino', 2729.507);
INSERT INTO tb_cidades VALUES (1384, 'Arantina', 310360, 11, 2823, 31.57, 'arantinense', 89.42);
INSERT INTO tb_cidades VALUES (1386, 'Arapor�', 310375, 11, 6144, 20.77, 'araporense', 295.837);
INSERT INTO tb_cidades VALUES (1388, 'Ara�jos', 310390, 11, 7883, 32.08, 'araujense', 245.721);
INSERT INTO tb_cidades VALUES (1390, 'Arceburgo', 310410, 11, 9509, 58.38, 'arceburguense', 162.875);
INSERT INTO tb_cidades VALUES (1392, 'Areado', 310430, 11, 13731, 48.5, 'areadense', 283.124);
INSERT INTO tb_cidades VALUES (1393, 'Argirita', 310440, 11, 2901, 18.2, 'argiritense', 159.378);
INSERT INTO tb_cidades VALUES (1395, 'Arinos', 310450, 11, 17674, 3.35, 'arinense', 5279.411);
INSERT INTO tb_cidades VALUES (2726, 'Santa Cec�lia', 251315, 15, 6658, 29.22, 'ceciliense', 227.874);
INSERT INTO tb_cidades VALUES (1398, 'Augusto De Lima', 310480, 11, 4960, 3.95, 'augusto-limense', 1254.83);
INSERT INTO tb_cidades VALUES (1399, 'Baependi', 310490, 11, 18307, 24.39, 'baependiano', 750.554);
INSERT INTO tb_cidades VALUES (1401, 'Bambu�', 310510, 11, 22734, 15.62, 'bambuiense', 1455.818);
INSERT INTO tb_cidades VALUES (1403, 'Bandeira Do Sul', 310530, 11, 5338, 113.41, 'bandeirante-do-sul', 47.067);
INSERT INTO tb_cidades VALUES (1405, 'Bar�o De Monte Alto', 310550, 11, 5720, 28.84, 'monte-altense', 198.313);
INSERT INTO tb_cidades VALUES (1406, 'Barbacena', 310560, 11, 126284, 166.34, 'barbacenense', 759.185);
INSERT INTO tb_cidades VALUES (1408, 'Barroso', 310590, 11, 19599, 238.81, 'barroense', 82.07);
INSERT INTO tb_cidades VALUES (1410, 'Belmiro Braga', 310610, 11, 3403, 8.66, 'belmirense', 393.13);
INSERT INTO tb_cidades VALUES (1412, 'Belo Oriente', 310630, 11, 23397, 69.86, 'belo-orientino', 334.909);
INSERT INTO tb_cidades VALUES (1413, 'Belo Vale', 310640, 11, 7536, 20.59, 'belo-valense', 365.923);
INSERT INTO tb_cidades VALUES (1415, 'Berizal', 310665, 11, 4370, 8.94, 'berizalense', 488.755);
INSERT INTO tb_cidades VALUES (1417, 'Betim', 310670, 11, 378089, 1.102, 'betinense', 342.846);
INSERT INTO tb_cidades VALUES (1419, 'Bicas', 310690, 11, 13653, 97.46, 'biquense', 140.082);
INSERT INTO tb_cidades VALUES (1420, 'Biquinhas', 310700, 11, 2630, 5.73, 'biquinhense', 458.947);
INSERT INTO tb_cidades VALUES (1422, 'Bocaina De Minas', 310720, 11, 5007, 9.94, 'bocainense', 503.793);
INSERT INTO tb_cidades VALUES (1424, 'Bom Despacho', 310740, 11, 45624, 37.28, 'bom-despachense', 1223.864);
INSERT INTO tb_cidades VALUES (1426, 'Bom Jesus Da Penha', 310760, 11, 3887, 18.66, 'bom-jesuense', 208.349);
INSERT INTO tb_cidades VALUES (1427, 'Bom Jesus Do Amparo', 310770, 11, 5491, 28.07, 'bom-jesuense', 195.611);
INSERT INTO tb_cidades VALUES (1429, 'Bom Repouso', 310790, 11, 10457, 45.5, 'bom-repousense', 229.845);
INSERT INTO tb_cidades VALUES (1431, 'Bonfim', 310810, 11, 6818, 22.59, 'bonfinense ', 301.865);
INSERT INTO tb_cidades VALUES (1433, 'Bonito De Minas', 310825, 11, 9673, 2.48, 'bonitense', 3904.904);
INSERT INTO tb_cidades VALUES (1434, 'Borda Da Mata', 310830, 11, 17118, 56.85, 'borda-matense', 301.108);
INSERT INTO tb_cidades VALUES (1436, 'Botumirim', 310850, 11, 6497, 4.14, 'botumiriense', 1568.881);
INSERT INTO tb_cidades VALUES (1438, 'Brasil�ndia De Minas', 310855, 11, 14226, 5.67, 'brasilandense', 2509.691);
INSERT INTO tb_cidades VALUES (1440, 'Bras�polis', 310890, 11, 14661, 39.87, 'brasopolense', 367.688);
INSERT INTO tb_cidades VALUES (1441, 'Bra�nas', 310880, 11, 5030, 13.3, 'braunense', 378.318);
INSERT INTO tb_cidades VALUES (1443, 'Bueno Brand�o', 310910, 11, 10892, 30.58, 'bueno-brandense', 356.151);
INSERT INTO tb_cidades VALUES (1445, 'Bugre', 310925, 11, 3992, 24.66, 'bugrense', 161.906);
INSERT INTO tb_cidades VALUES (1446, 'Buritis', 310930, 11, 22737, 4.35, 'buritisense', 5225.179);
INSERT INTO tb_cidades VALUES (1448, 'Cabeceira Grande', 310945, 11, 6453, 6.26, 'cabeceirense', 1031.313);
INSERT INTO tb_cidades VALUES (1450, 'Cachoeira Da Prata', 310960, 11, 3654, 59.53, 'cachoeirense', 61.381);
INSERT INTO tb_cidades VALUES (1452, 'Cachoeira De Paje�', 310270, 11, 8959, 12.88, 'cachoeirense', 695.671);
INSERT INTO tb_cidades VALUES (1454, 'Caetan�polis', 310990, 11, 10218, 65.48, 'caetanopolitano', 156.039);
INSERT INTO tb_cidades VALUES (1455, 'Caet�', 311000, 11, 40750, 75.11, 'caeteense', 542.571);
INSERT INTO tb_cidades VALUES (1457, 'Cajuri', 311020, 11, 4047, 48.74, 'cajuriense', 83.038);
INSERT INTO tb_cidades VALUES (1459, 'Camacho', 311040, 11, 3154, 14.14, 'camachense', 223.001);
INSERT INTO tb_cidades VALUES (1460, 'Camanducaia', 311050, 11, 21080, 39.89, 'camanducaiense', 528.477);
INSERT INTO tb_cidades VALUES (1462, 'Cambuquira', 311070, 11, 12602, 51.15, 'cambuquirense', 246.38);
INSERT INTO tb_cidades VALUES (1464, 'Campanha', 311090, 11, 15433, 45.99, 'campanhense', 335.587);
INSERT INTO tb_cidades VALUES (1466, 'Campina Verde', 311110, 11, 19324, 5.29, 'campina-verdense', 3650.751);
INSERT INTO tb_cidades VALUES (1468, 'Campo Belo', 311120, 11, 51544, 97.58, 'campo-belense', 528.225);
INSERT INTO tb_cidades VALUES (1470, 'Campo Florido', 311140, 11, 6870, 5.43, 'campo-floridense', 1264.246);
INSERT INTO tb_cidades VALUES (1471, 'Campos Altos', 311150, 11, 14206, 19.99, 'campos-altense', 710.645);
INSERT INTO tb_cidades VALUES (1473, 'Cana Verde', 311190, 11, 5589, 26.27, 'cana-verdense', 212.721);
INSERT INTO tb_cidades VALUES (1475, 'Can�polis', 311180, 11, 11365, 13.53, 'canapolense', 839.737);
INSERT INTO tb_cidades VALUES (1476, 'Candeias', 311200, 11, 14595, 20.26, 'candeense', 720.512);
INSERT INTO tb_cidades VALUES (1478, 'Capara�', 311210, 11, 5209, 39.86, 'caparaoense', 130.694);
INSERT INTO tb_cidades VALUES (1480, 'Capelinha', 311230, 11, 34803, 36.05, 'capelinhense', 965.367);
INSERT INTO tb_cidades VALUES (1482, 'Capim Branco', 311250, 11, 8881, 93.16, 'capim-branquense', 95.333);
INSERT INTO tb_cidades VALUES (1484, 'Capit�o Andrade', 311265, 11, 4925, 17.65, 'capit�o andradense', 279.088);
INSERT INTO tb_cidades VALUES (1486, 'Capit�lio', 311280, 11, 8183, 15.68, 'capitolino', 521.802);
INSERT INTO tb_cidades VALUES (1487, 'Caputira', 311290, 11, 9030, 48.11, 'caputirense', 187.703);
INSERT INTO tb_cidades VALUES (1489, 'Carana�ba', 311310, 11, 3288, 20.56, 'caranaibense', 159.957);
INSERT INTO tb_cidades VALUES (1491, 'Carangola', 311330, 11, 32296, 91.39, 'carangolense', 353.404);
INSERT INTO tb_cidades VALUES (1493, 'Carbonita', 311350, 11, 9148, 6.28, 'carbonitense', 1456.093);
INSERT INTO tb_cidades VALUES (1494, 'Carea�u', 311360, 11, 6298, 34.79, 'carea�uense', 181.009);
INSERT INTO tb_cidades VALUES (1496, 'Carm�sia', 311380, 11, 2446, 9.44, 'carmesense', 259.103);
INSERT INTO tb_cidades VALUES (1498, 'Carmo Da Mata', 311400, 11, 10927, 30.59, 'carmense', 357.178);
INSERT INTO tb_cidades VALUES (1500, 'Carmo Do Cajuru', 311420, 11, 20012, 43.9, 'cajuruense', 455.807);
INSERT INTO tb_cidades VALUES (1501, 'Carmo Do Parana�ba', 311430, 11, 29735, 22.74, 'carmense', 1307.862);
INSERT INTO tb_cidades VALUES (1503, 'Carm�polis De Minas', 311450, 11, 17048, 42.62, 'carmopolitano', 400.01);
INSERT INTO tb_cidades VALUES (1504, 'Carneirinho', 311455, 11, 9471, 4.59, 'carneirinhense', 2063.316);
INSERT INTO tb_cidades VALUES (1506, 'Carvalh�polis', 311470, 11, 3341, 41.2, 'carvalhense', 81.101);
INSERT INTO tb_cidades VALUES (1508, 'Casa Grande', 311490, 11, 2244, 14.23, 'casa-grandense', 157.727);
INSERT INTO tb_cidades VALUES (1510, 'C�ssia', 311510, 11, 17412, 26.15, 'cassiense', 665.802);
INSERT INTO tb_cidades VALUES (1511, 'Cataguases', 311530, 11, 69757, 141.85, 'cataguasense', 491.767);
INSERT INTO tb_cidades VALUES (1514, 'Catuji', 311545, 11, 6708, 15.99, 'catujiense', 419.525);
INSERT INTO tb_cidades VALUES (1515, 'Catuti', 311547, 11, 5102, 17.73, 'catutiense', 287.812);
INSERT INTO tb_cidades VALUES (1517, 'Cedro Do Abaet�', 311560, 11, 1210, 4.27, 'cedrense', 283.211);
INSERT INTO tb_cidades VALUES (1518, 'Central De Minas', 311570, 11, 6772, 33.14, 'centralense', 204.328);
INSERT INTO tb_cidades VALUES (1520, 'Ch�cara', 311590, 11, 2792, 18.27, 'chacarense', 152.807);
INSERT INTO tb_cidades VALUES (1522, 'Chapada Do Norte', 311610, 11, 15189, 18.28, 'chapadense', 830.968);
INSERT INTO tb_cidades VALUES (2865, 'Itacuruba', 260740, 16, 4369, 10.16, 'itacurubense', 430.031);
INSERT INTO tb_cidades VALUES (1525, 'Cipot�nea', 311630, 11, 6547, 42.66, 'cipotanense', 153.479);
INSERT INTO tb_cidades VALUES (1527, 'Claro Dos Po��es', 311650, 11, 7775, 10.79, 'claro-pocense', 720.423);
INSERT INTO tb_cidades VALUES (1529, 'Coimbra', 311670, 11, 7054, 66, 'coimbraense', 106.875);
INSERT INTO tb_cidades VALUES (1531, 'Comendador Gomes', 311690, 11, 2972, 2.85, 'comendadorense', 1041.047);
INSERT INTO tb_cidades VALUES (1533, 'Concei��o Da Aparecida', 311710, 11, 9820, 27.86, 'aparecidense', 352.521);
INSERT INTO tb_cidades VALUES (1535, 'Concei��o Das Alagoas', 311730, 11, 23043, 17.19, 'garimpense', 1340.25);
INSERT INTO tb_cidades VALUES (1536, 'Concei��o Das Pedras', 311720, 11, 2749, 26.9, 'pedrense', 102.206);
INSERT INTO tb_cidades VALUES (1538, 'Concei��o Do Mato Dentro', 311750, 11, 17908, 10.37, 'conceicionense', 1726.829);
INSERT INTO tb_cidades VALUES (1539, 'Concei��o Do Par�', 311760, 11, 5158, 20.6, 'concei��o-paraense', 250.33);
INSERT INTO tb_cidades VALUES (1541, 'Concei��o Dos Ouros', 311780, 11, 10388, 56.77, 'ourense', 182.97);
INSERT INTO tb_cidades VALUES (1543, 'Confins', 311787, 11, 5936, 140.15, 'confinense', 42.355);
INSERT INTO tb_cidades VALUES (1544, 'Congonhal', 311790, 11, 10468, 51.03, 'congonhalense', 205.125);
INSERT INTO tb_cidades VALUES (1546, 'Congonhas Do Norte', 311810, 11, 4943, 12.39, 'congonhense', 398.851);
INSERT INTO tb_cidades VALUES (1548, 'Conselheiro Lafaiete', 311830, 11, 116512, 314.69, 'lafaietense', 370.245);
INSERT INTO tb_cidades VALUES (1550, 'Consola��o', 311850, 11, 1727, 19.99, 'consolense', 86.388);
INSERT INTO tb_cidades VALUES (1551, 'Contagem', 311860, 11, 603442, 3.09, 'contagense', 195.268);
INSERT INTO tb_cidades VALUES (1553, 'Cora��o De Jesus', 311880, 11, 26033, 11.7, 'corjesuense', 2225.212);
INSERT INTO tb_cidades VALUES (1555, 'Cordisl�ndia', 311900, 11, 3435, 19.13, 'cordislandense', 179.543);
INSERT INTO tb_cidades VALUES (1556, 'Corinto', 311910, 11, 23914, 9.47, 'corintiano', 2525.394);
INSERT INTO tb_cidades VALUES (1558, 'Coromandel', 311930, 11, 27547, 8.31, 'coromandelense', 3313.115);
INSERT INTO tb_cidades VALUES (1560, 'Coronel Murta', 311950, 11, 9117, 11.18, 'murtense', 815.411);
INSERT INTO tb_cidades VALUES (1562, 'Coronel Xavier Chaves', 311970, 11, 3301, 23.42, 'xavierense', 140.954);
INSERT INTO tb_cidades VALUES (1563, 'C�rrego Danta', 311980, 11, 3391, 5.16, 'c�rrego-dantense', 657.425);
INSERT INTO tb_cidades VALUES (1565, 'C�rrego Fundo', 311995, 11, 5790, 57.26, 'corregofundense', 101.112);
INSERT INTO tb_cidades VALUES (1567, 'Couto De Magalh�es De Minas', 312010, 11, 4204, 8.66, 'couto-magalhense', 485.653);
INSERT INTO tb_cidades VALUES (1568, 'Cris�lita', 312015, 11, 6047, 6.26, 'crisolitense', 966.2);
INSERT INTO tb_cidades VALUES (1570, 'Crist�lia', 312030, 11, 5760, 6.85, 'cristalense', 840.701);
INSERT INTO tb_cidades VALUES (1572, 'Cristina', 312050, 11, 10210, 32.79, 'cristinense', 311.33);
INSERT INTO tb_cidades VALUES (1574, 'Cruzeiro Da Fortaleza', 312070, 11, 3934, 20.91, 'cruzeirense', 188.131);
INSERT INTO tb_cidades VALUES (1575, 'Cruz�lia', 312080, 11, 14591, 27.93, 'cruzilense', 522.419);
INSERT INTO tb_cidades VALUES (1577, 'Curral De Dentro', 312087, 11, 6913, 12.17, 'curraldentense', 568.262);
INSERT INTO tb_cidades VALUES (1579, 'Datas', 312100, 11, 5211, 16.8, 'datense', 310.099);
INSERT INTO tb_cidades VALUES (1581, 'Delfin�polis', 312120, 11, 6830, 4.95, 'delfinopolitano', 1378.423);
INSERT INTO tb_cidades VALUES (1582, 'Delta', 312125, 11, 8089, 78.66, 'deltense', 102.84);
INSERT INTO tb_cidades VALUES (1584, 'Desterro De Entre Rios', 312140, 11, 7002, 18.56, 'desterrense', 377.164);
INSERT INTO tb_cidades VALUES (1586, 'Diamantina', 312160, 11, 45880, 11.79, 'diamantinense', 3891.654);
INSERT INTO tb_cidades VALUES (1588, 'Dion�sio', 312180, 11, 8739, 25.37, 'dionisiano', 344.442);
INSERT INTO tb_cidades VALUES (1589, 'Divin�sia', 312190, 11, 3293, 28.15, 'divinesiano', 116.97);
INSERT INTO tb_cidades VALUES (1591, 'Divino Das Laranjeiras', 312210, 11, 4937, 14.43, 'divinense', 342.248);
INSERT INTO tb_cidades VALUES (1593, 'Divin�polis', 312230, 11, 213016, 300.82, 'divinopolitano', 708.115);
INSERT INTO tb_cidades VALUES (1594, 'Divisa Alegre', 312235, 11, 5884, 49.95, 'divisalegrense', 117.801);
INSERT INTO tb_cidades VALUES (1596, 'Divis�polis', 312245, 11, 8974, 15.66, 'divisopolense', 572.924);
INSERT INTO tb_cidades VALUES (1597, 'Dom Bosco', 312247, 11, 3814, 4.67, 'dom bosquense', 817.382);
INSERT INTO tb_cidades VALUES (1599, 'Dom Joaquim', 312260, 11, 4535, 11.37, 'dom-joaquinense', 398.821);
INSERT INTO tb_cidades VALUES (1601, 'Dom Vi�oso', 312280, 11, 2994, 26.28, 'dom-vi�osense', 113.921);
INSERT INTO tb_cidades VALUES (1603, 'Dores De Campos', 312300, 11, 9299, 74.49, 'dorense', 124.842);
INSERT INTO tb_cidades VALUES (1604, 'Dores De Guanh�es', 312310, 11, 5223, 13.67, 'dorense', 382.123);
INSERT INTO tb_cidades VALUES (1606, 'Dores Do Turvo', 312330, 11, 4462, 19.3, 'dorense', 231.169);
INSERT INTO tb_cidades VALUES (1607, 'Dores�polis', 312340, 11, 1440, 9.42, 'doresopolitano', 152.912);
INSERT INTO tb_cidades VALUES (1609, 'Durand�', 312352, 11, 7423, 34.13, 'durandeense', 217.461);
INSERT INTO tb_cidades VALUES (1611, 'Engenheiro Caldas', 312370, 11, 10280, 54.96, 'engenheiro-caldense', 187.058);
INSERT INTO tb_cidades VALUES (1613, 'Entre Folhas', 312385, 11, 5175, 60.73, 'entrefolhense', 85.209);
INSERT INTO tb_cidades VALUES (1614, 'Entre Rios De Minas', 312390, 11, 14242, 31.18, 'entrerrianos', 456.796);
INSERT INTO tb_cidades VALUES (1616, 'Esmeraldas', 312410, 11, 60271, 66.13, 'esmeraldense', 911.418);
INSERT INTO tb_cidades VALUES (1618, 'Espinosa', 312430, 11, 31113, 16.65, 'espinosense', 1868.965);
INSERT INTO tb_cidades VALUES (1620, 'Estiva', 312450, 11, 10845, 44.47, 'estivense', 243.872);
INSERT INTO tb_cidades VALUES (1621, 'Estrela Dalva', 312460, 11, 2470, 18.8, 'estrela-dalvense', 131.365);
INSERT INTO tb_cidades VALUES (1623, 'Estrela Do Sul', 312480, 11, 7446, 9.05, 'estrela-sulense', 822.454);
INSERT INTO tb_cidades VALUES (1625, 'Ewbank Da C�mara', 312500, 11, 3753, 36.14, 'ewbanquense', 103.834);
INSERT INTO tb_cidades VALUES (1626, 'Extrema', 312510, 11, 28599, 116.93, 'extremense', 244.575);
INSERT INTO tb_cidades VALUES (1628, 'Faria Lemos', 312530, 11, 3376, 20.43, 'faria-lemense', 165.224);
INSERT INTO tb_cidades VALUES (1630, 'Felisburgo', 312560, 11, 6877, 11.53, 'felisburguense', 596.214);
INSERT INTO tb_cidades VALUES (1631, 'Felixl�ndia', 312570, 11, 14121, 9.08, 'felixlandense', 1554.626);
INSERT INTO tb_cidades VALUES (1633, 'Ferros', 312590, 11, 10837, 9.95, 'ferrense', 1088.794);
INSERT INTO tb_cidades VALUES (1635, 'Florestal', 312600, 11, 6600, 34.48, 'florestalense', 191.421);
INSERT INTO tb_cidades VALUES (1637, 'Formoso', 312620, 11, 8177, 2.22, 'formosense', 3685.696);
INSERT INTO tb_cidades VALUES (1638, 'Fortaleza De Minas', 312630, 11, 4098, 18.73, 'fortalezense', 218.792);
INSERT INTO tb_cidades VALUES (1640, 'Francisco Badar�', 312650, 11, 10248, 22.21, 'badarosense', 461.344);
INSERT INTO tb_cidades VALUES (1642, 'Francisco S�', 312670, 11, 24912, 9.07, 'francisco-saense', 2747.283);
INSERT INTO tb_cidades VALUES (1644, 'Frei Gaspar', 312680, 11, 5879, 9.38, 'frei-gasparense', 626.671);
INSERT INTO tb_cidades VALUES (1645, 'Frei Inoc�ncio', 312690, 11, 8920, 19, 'frei-inocenciano', 469.556);
INSERT INTO tb_cidades VALUES (2867, 'Itamb�', 260765, 16, 35398, 116.13, 'itambeense ', 304.811);
INSERT INTO tb_cidades VALUES (1649, 'Fruta De Leite', 312707, 11, 5940, 7.79, 'fruta de leitense', 762.783);
INSERT INTO tb_cidades VALUES (1650, 'Frutal', 312710, 11, 53468, 22.03, 'frutalense', 2426.966);
INSERT INTO tb_cidades VALUES (1652, 'Galil�ia', 312730, 11, 6951, 9.65, 'galileense', 720.354);
INSERT INTO tb_cidades VALUES (1654, 'Glaucil�ndia', 312735, 11, 2962, 20.31, 'glaucilandense', 145.861);
INSERT INTO tb_cidades VALUES (1655, 'Goiabeira', 312737, 11, 3053, 27.15, 'goiabeirense', 112.442);
INSERT INTO tb_cidades VALUES (1657, 'Gon�alves', 312740, 11, 4220, 22.52, 'gon�alvense', 187.353);
INSERT INTO tb_cidades VALUES (1659, 'Gouveia', 312760, 11, 11681, 13.48, 'gouveano', 866.6);
INSERT INTO tb_cidades VALUES (1661, 'Gr�o Mogol', 312780, 11, 15024, 3.87, 'gr�o-mogolense', 3885.286);
INSERT INTO tb_cidades VALUES (1662, 'Grupiara', 312790, 11, 1373, 7.11, 'grupiarense', 193.141);
INSERT INTO tb_cidades VALUES (1664, 'Guap�', 312810, 11, 13872, 14.85, 'guapense', 934.345);
INSERT INTO tb_cidades VALUES (1666, 'Guaraciama', 312825, 11, 4718, 12.09, 'guaraciamense', 390.262);
INSERT INTO tb_cidades VALUES (1668, 'Guarani', 312840, 11, 8678, 32.85, 'guaraniense', 264.193);
INSERT INTO tb_cidades VALUES (1669, 'Guarar�', 312850, 11, 3929, 44.32, 'guararense', 88.655);
INSERT INTO tb_cidades VALUES (1671, 'Guaxup�', 312870, 11, 49430, 172.59, 'guaxupeano', 286.398);
INSERT INTO tb_cidades VALUES (1673, 'Guimar�nia', 312890, 11, 7265, 19.8, 'guimaranense', 366.833);
INSERT INTO tb_cidades VALUES (1675, 'Gurinhat�', 312910, 11, 6137, 3.32, 'gurinhantense', 1849.138);
INSERT INTO tb_cidades VALUES (1677, 'Iapu', 312930, 11, 10315, 30.29, 'iapuense', 340.579);
INSERT INTO tb_cidades VALUES (1678, 'Ibertioga', 312940, 11, 5036, 14.54, 'ibertiogano', 346.24);
INSERT INTO tb_cidades VALUES (1680, 'Ibia�', 312960, 11, 7839, 8.96, 'ibiaiense', 874.759);
INSERT INTO tb_cidades VALUES (1682, 'Ibiraci', 312970, 11, 12176, 21.66, 'ibiraciense', 562.093);
INSERT INTO tb_cidades VALUES (1684, 'Ibiti�ra De Minas', 312990, 11, 3382, 49.51, 'ibitiurense', 68.316);
INSERT INTO tb_cidades VALUES (1686, 'Icara� De Minas', 313005, 11, 10746, 17.18, 'icaraiense', 625.663);
INSERT INTO tb_cidades VALUES (1687, 'Igarap�', 313010, 11, 34851, 316.07, 'igarapeense', 110.262);
INSERT INTO tb_cidades VALUES (1689, 'Iguatama', 313030, 11, 8029, 12.78, 'iguatamense', 628.2);
INSERT INTO tb_cidades VALUES (1691, 'Ilic�nea', 313050, 11, 11488, 30.53, 'ilicineaense', 376.341);
INSERT INTO tb_cidades VALUES (1693, 'Inconfidentes', 313060, 11, 6908, 46.17, 'inconfidentino', 149.611);
INSERT INTO tb_cidades VALUES (1694, 'Indaiabira', 313065, 11, 7330, 7.3, 'indaiabirense', 1004.146);
INSERT INTO tb_cidades VALUES (1696, 'Inga�', 313080, 11, 2629, 8.6, 'ingaiense', 305.591);
INSERT INTO tb_cidades VALUES (1698, 'Inha�ma', 313100, 11, 5760, 23.51, 'inhaumense', 244.996);
INSERT INTO tb_cidades VALUES (1700, 'Ipaba', 313115, 11, 16708, 147.69, 'ipabense', 113.128);
INSERT INTO tb_cidades VALUES (1701, 'Ipanema', 313120, 11, 18170, 39.79, 'ipanemense', 456.64);
INSERT INTO tb_cidades VALUES (1703, 'Ipia�u', 313140, 11, 4107, 8.81, 'ipia�uense', 466.02);
INSERT INTO tb_cidades VALUES (1705, 'Ira� De Minas', 313160, 11, 6467, 18.15, 'iraiense', 356.264);
INSERT INTO tb_cidades VALUES (1707, 'Itabirinha', 313180, 11, 10692, 51.16, 'itabirense', 208.982);
INSERT INTO tb_cidades VALUES (1708, 'Itabirito', 313190, 11, 45449, 83.76, 'itabiritense', 542.609);
INSERT INTO tb_cidades VALUES (1710, 'Itacarambi', 313210, 11, 17720, 14.46, 'itacarambiense', 1225.27);
INSERT INTO tb_cidades VALUES (1712, 'Itaip�', 313230, 11, 11798, 24.54, 'itaipeense', 480.828);
INSERT INTO tb_cidades VALUES (1714, 'Itamarandiba', 313250, 11, 32175, 11.76, 'itamarandibano', 2735.569);
INSERT INTO tb_cidades VALUES (1716, 'Itambacuri', 313270, 11, 22809, 16.07, 'itambacuriense', 1419.207);
INSERT INTO tb_cidades VALUES (1718, 'Itamogi', 313290, 11, 10349, 42.46, 'itamogiense', 243.734);
INSERT INTO tb_cidades VALUES (1719, 'Itamonte', 313300, 11, 14003, 32.43, 'itamontense', 431.786);
INSERT INTO tb_cidades VALUES (1721, 'Itanhomi', 313320, 11, 11856, 24.25, 'itanhomense', 488.842);
INSERT INTO tb_cidades VALUES (1722, 'Itaobim', 313330, 11, 21001, 30.93, 'itaobinhense', 679.022);
INSERT INTO tb_cidades VALUES (1724, 'Itapecerica', 313350, 11, 21377, 20.54, 'itapecericano', 1040.518);
INSERT INTO tb_cidades VALUES (1726, 'Itatiaiu�u', 313370, 11, 9928, 33.64, 'itatiaiu�uense', 295.145);
INSERT INTO tb_cidades VALUES (1728, 'Ita�na', 313380, 11, 85463, 172.39, 'itaunense', 495.768);
INSERT INTO tb_cidades VALUES (1729, 'Itaverava', 313390, 11, 5799, 20.4, 'itaveravense', 284.22);
INSERT INTO tb_cidades VALUES (1731, 'Itueta', 313410, 11, 5830, 12.88, 'ituetano', 452.675);
INSERT INTO tb_cidades VALUES (1733, 'Itumirim', 313430, 11, 6139, 26.15, 'itumirinense', 234.802);
INSERT INTO tb_cidades VALUES (1735, 'Itutinga', 313450, 11, 3913, 10.52, 'itutinguense', 372.018);
INSERT INTO tb_cidades VALUES (1737, 'Jacinto', 313470, 11, 12134, 8.71, 'jacintense', 1393.606);
INSERT INTO tb_cidades VALUES (1738, 'Jacu�', 313480, 11, 7502, 18.33, 'jacuiense', 409.229);
INSERT INTO tb_cidades VALUES (1740, 'Jaguara�u', 313500, 11, 2990, 18.26, 'jaguara�uense', 163.76);
INSERT INTO tb_cidades VALUES (1742, 'Jampruca', 313507, 11, 5067, 9.8, 'jampruquense', 517.094);
INSERT INTO tb_cidades VALUES (1743, 'Jana�ba', 313510, 11, 66803, 30.63, 'janaubense', 2181.315);
INSERT INTO tb_cidades VALUES (1745, 'Japara�ba', 313530, 11, 3939, 22.88, 'japara�bano', 172.141);
INSERT INTO tb_cidades VALUES (1747, 'Jeceaba', 313540, 11, 5395, 22.84, 'jeceabense ', 236.25);
INSERT INTO tb_cidades VALUES (1749, 'Jequeri', 313550, 11, 12848, 23.45, 'jequeriense', 547.897);
INSERT INTO tb_cidades VALUES (1750, 'Jequita�', 313560, 11, 8005, 6.31, 'jequitaiense', 1268.441);
INSERT INTO tb_cidades VALUES (1753, 'Jesu�nia', 313590, 11, 4768, 30.99, 'jesuanense', 153.852);
INSERT INTO tb_cidades VALUES (1754, 'Joa�ma', 313600, 11, 14941, 8.98, 'joaimense', 1664.186);
INSERT INTO tb_cidades VALUES (1756, 'Jo�o Monlevade', 313620, 11, 73610, 742.35, 'monlevadense', 99.158);
INSERT INTO tb_cidades VALUES (1758, 'Joaquim Fel�cio', 313640, 11, 4305, 5.44, 'feliciano', 790.934);
INSERT INTO tb_cidades VALUES (1759, 'Jord�nia', 313650, 11, 10324, 18.88, 'jordainense', 546.704);
INSERT INTO tb_cidades VALUES (1761, 'Jos� Raydan', 313655, 11, 4376, 24.2, 'jos� raydanense', 180.822);
INSERT INTO tb_cidades VALUES (1763, 'Juatuba', 313665, 11, 22202, 223.18, 'juatubense', 99.482);
INSERT INTO tb_cidades VALUES (1764, 'Juiz De Fora', 313670, 11, 516247, 359.59, 'juiz-forano ', 1435.664);
INSERT INTO tb_cidades VALUES (1766, 'Juruaia', 313690, 11, 9238, 41.92, 'juruaiense', 220.353);
INSERT INTO tb_cidades VALUES (1768, 'Ladainha', 313700, 11, 16994, 19.62, 'ladainhense', 866.288);
INSERT INTO tb_cidades VALUES (1770, 'Lagoa Da Prata', 313720, 11, 45984, 104.51, 'lago-pratense', 439.984);
INSERT INTO tb_cidades VALUES (1771, 'Lagoa Dos Patos', 313730, 11, 4225, 7.04, 'lagoa-patense', 600.546);
INSERT INTO tb_cidades VALUES (1773, 'Lagoa Formosa', 313750, 11, 17161, 20.41, 'lagoense', 840.92);
INSERT INTO tb_cidades VALUES (1775, 'Lagoa Santa', 313760, 11, 52520, 228.27, 'lagoa-santense', 230.082);
INSERT INTO tb_cidades VALUES (1776, 'Lajinha', 313770, 11, 19609, 45.4, 'lajinhense', 431.92);
INSERT INTO tb_cidades VALUES (2870, 'Itaquitinga', 260780, 16, 15692, 151.73, 'itaquitinguense', 103.423);
INSERT INTO tb_cidades VALUES (1779, 'Laranjal', 313800, 11, 6465, 31.55, 'laranjalense', 204.882);
INSERT INTO tb_cidades VALUES (1781, 'Lavras', 313820, 11, 92200, 163.26, 'lavrense', 564.743);
INSERT INTO tb_cidades VALUES (1783, 'Leme Do Prado', 313835, 11, 4804, 17.15, 'lemepradense', 280.036);
INSERT INTO tb_cidades VALUES (1785, 'Liberdade', 313850, 11, 5346, 13.32, 'libertense', 401.337);
INSERT INTO tb_cidades VALUES (1786, 'Lima Duarte', 313860, 11, 16149, 19.03, 'limaduartino', 848.563);
INSERT INTO tb_cidades VALUES (1788, 'Lontra', 313865, 11, 8397, 32.4, 'lontrense', 259.2);
INSERT INTO tb_cidades VALUES (1790, 'Luisl�ndia', 313868, 11, 6400, 15.54, 'luislandense', 411.714);
INSERT INTO tb_cidades VALUES (1792, 'Luz', 313880, 11, 17486, 14.92, 'luzense', 1171.659);
INSERT INTO tb_cidades VALUES (1793, 'Machacalis', 313890, 11, 6976, 20.99, 'machacalisense', 332.377);
INSERT INTO tb_cidades VALUES (1795, 'Madre De Deus De Minas', 313910, 11, 4904, 9.95, 'madre-deusense', 492.909);
INSERT INTO tb_cidades VALUES (1797, 'Mamonas', 313925, 11, 6321, 21.69, 'mamonense', 291.429);
INSERT INTO tb_cidades VALUES (1799, 'Manhua�u', 313940, 11, 79574, 126.65, 'manhua�uense', 628.318);
INSERT INTO tb_cidades VALUES (1800, 'Manhumirim', 313950, 11, 21382, 116.91, 'manhumiriense', 182.899);
INSERT INTO tb_cidades VALUES (1802, 'Mar De Espanha', 313980, 11, 11749, 31.62, 'mar-de-espanhense', 371.6);
INSERT INTO tb_cidades VALUES (1804, 'Maria Da F�', 313990, 11, 14216, 70.06, 'mariense', 202.898);
INSERT INTO tb_cidades VALUES (1806, 'Marilac', 314010, 11, 4219, 26.57, 'marilaquense', 158.809);
INSERT INTO tb_cidades VALUES (1808, 'Marip� De Minas', 314020, 11, 2788, 36.05, 'maripaense', 77.338);
INSERT INTO tb_cidades VALUES (1809, 'Marli�ria', 314030, 11, 4012, 7.35, 'marlierense', 545.812);
INSERT INTO tb_cidades VALUES (1811, 'Martinho Campos', 314050, 11, 12611, 12.03, 'martinho-campense', 1048.098);
INSERT INTO tb_cidades VALUES (1813, 'Mata Verde', 314055, 11, 7874, 34.61, 'mataverdense', 227.515);
INSERT INTO tb_cidades VALUES (1815, 'Mateus Leme', 314070, 11, 27856, 92, 'mateus-lemense', 302.773);
INSERT INTO tb_cidades VALUES (1816, 'Mathias Lobato', 317150, 11, 3370, 19.56, 'matiense', 172.302);
INSERT INTO tb_cidades VALUES (1818, 'Matias Cardoso', 314085, 11, 9979, 5.12, 'matiense', 1949.734);
INSERT INTO tb_cidades VALUES (1820, 'Mato Verde', 314100, 11, 12684, 26.86, 'mato-verdense', 472.244);
INSERT INTO tb_cidades VALUES (1821, 'Matozinhos', 314110, 11, 33955, 134.59, 'matozinhense', 252.28);
INSERT INTO tb_cidades VALUES (1823, 'Medeiros', 314130, 11, 3444, 3.64, 'medeirense', 946.437);
INSERT INTO tb_cidades VALUES (1825, 'Mendes Pimentel', 314150, 11, 6331, 20.72, 'pimentelense', 305.507);
INSERT INTO tb_cidades VALUES (1827, 'Mesquita', 314170, 11, 6069, 22.07, 'mesquitense', 274.938);
INSERT INTO tb_cidades VALUES (1828, 'Minas Novas', 314180, 11, 30794, 16.99, 'minas-novense', 1812.395);
INSERT INTO tb_cidades VALUES (1830, 'Mirabela', 314200, 11, 13042, 18.03, 'mirabelense', 723.276);
INSERT INTO tb_cidades VALUES (1832, 'Mira�', 314220, 11, 13808, 43.06, 'miraiense', 320.695);
INSERT INTO tb_cidades VALUES (1834, 'Moeda', 314230, 11, 4689, 30.23, 'moedense', 155.112);
INSERT INTO tb_cidades VALUES (1836, 'Monjolos', 314250, 11, 2360, 3.63, 'monjolense', 650.91);
INSERT INTO tb_cidades VALUES (1838, 'Montalv�nia', 314270, 11, 15862, 10.55, 'montalvanense', 1503.783);
INSERT INTO tb_cidades VALUES (1839, 'Monte Alegre De Minas', 314280, 11, 19619, 7.56, 'monte-alegrense', 2595.957);
INSERT INTO tb_cidades VALUES (1841, 'Monte Belo', 314300, 11, 13061, 31, 'monte-belano', 421.283);
INSERT INTO tb_cidades VALUES (1843, 'Monte Formoso', 314315, 11, 4656, 12.08, 'monte formosense', 385.552);
INSERT INTO tb_cidades VALUES (1845, 'Monte Si�o', 314340, 11, 21203, 72.71, 'monte-sionense', 291.594);
INSERT INTO tb_cidades VALUES (1846, 'Montes Claros', 314330, 11, 361915, 101.41, 'montes-clarense', 3568.935);
INSERT INTO tb_cidades VALUES (1848, 'Morada Nova De Minas', 314350, 11, 8255, 3.96, 'moradense', 2084.274);
INSERT INTO tb_cidades VALUES (1850, 'Morro Do Pilar', 314370, 11, 3399, 7.12, 'morrense', 477.548);
INSERT INTO tb_cidades VALUES (1851, 'Munhoz', 314380, 11, 6257, 32.66, 'munhozense', 191.564);
INSERT INTO tb_cidades VALUES (1853, 'Mutum', 314400, 11, 26661, 21.31, 'mutuense', 1250.822);
INSERT INTO tb_cidades VALUES (1855, 'Nacip Raydan', 314420, 11, 3154, 13.51, 'nacipense', 233.493);
INSERT INTO tb_cidades VALUES (1856, 'Nanuque', 314430, 11, 40834, 26.9, 'nanuquense', 1517.966);
INSERT INTO tb_cidades VALUES (1858, 'Natal�ndia', 314437, 11, 3280, 7, 'natalandense', 468.659);
INSERT INTO tb_cidades VALUES (1860, 'Nazareno', 314450, 11, 7954, 24.17, 'nazarenense', 329.128);
INSERT INTO tb_cidades VALUES (1862, 'Ninheira', 314465, 11, 9815, 8.86, 'ninheirense', 1108.232);
INSERT INTO tb_cidades VALUES (1864, 'Nova Era', 314470, 11, 17528, 48.43, 'nova-erense', 361.926);
INSERT INTO tb_cidades VALUES (1865, 'Nova Lima', 314480, 11, 80998, 188.78, 'nova-limense', 429.063);
INSERT INTO tb_cidades VALUES (1867, 'Nova Ponte', 314500, 11, 12812, 11.53, 'nova-pontense', 1111.011);
INSERT INTO tb_cidades VALUES (1869, 'Nova Resende', 314510, 11, 15374, 39.41, 'resendense', 390.152);
INSERT INTO tb_cidades VALUES (1871, 'Nova Uni�o', 313660, 11, 5555, 32.27, 'nova-uniense', 172.131);
INSERT INTO tb_cidades VALUES (1872, 'Novo Cruzeiro', 314530, 11, 30725, 18.04, 'novo-cruzeirense', 1702.978);
INSERT INTO tb_cidades VALUES (1874, 'Novorizonte', 314537, 11, 4963, 18.26, 'novorizontino', 271.87);
INSERT INTO tb_cidades VALUES (1876, 'Olhos D`�gua', 314545, 11, 5267, 2.52, 'olhos-d''aguense', 2092.075);
INSERT INTO tb_cidades VALUES (1878, 'Oliveira', 314560, 11, 39466, 43.98, 'oliveirense', 897.294);
INSERT INTO tb_cidades VALUES (1879, 'Oliveira Fortes', 314570, 11, 2123, 19.1, 'oliveira-fortense', 111.133);
INSERT INTO tb_cidades VALUES (1881, 'Orat�rios', 314585, 11, 4493, 50.44, 'oratoriense', 89.068);
INSERT INTO tb_cidades VALUES (1883, 'Ouro Branco', 314590, 11, 35268, 136.31, 'ouro-branquense', 258.726);
INSERT INTO tb_cidades VALUES (1884, 'Ouro Fino', 314600, 11, 31568, 59.15, 'ouro-finense', 533.659);
INSERT INTO tb_cidades VALUES (1886, 'Ouro Verde De Minas', 314620, 11, 6016, 34.28, 'ouro-verdense', 175.482);
INSERT INTO tb_cidades VALUES (1888, 'Padre Para�so', 314630, 11, 18849, 34.63, 'padre-paraisense', 544.374);
INSERT INTO tb_cidades VALUES (1890, 'Paineiras', 314640, 11, 4631, 7.27, 'paineirense', 637.308);
INSERT INTO tb_cidades VALUES (1891, 'Pains', 314650, 11, 8014, 19, 'painense', 421.862);
INSERT INTO tb_cidades VALUES (1893, 'Palma', 314670, 11, 6545, 20.68, 'palmense', 316.486);
INSERT INTO tb_cidades VALUES (1895, 'Papagaios', 314690, 11, 14175, 25.61, 'papagaiense', 553.576);
INSERT INTO tb_cidades VALUES (1897, 'Paracatu', 314700, 11, 84718, 10.29, 'paracatuense', 8229.588);
INSERT INTO tb_cidades VALUES (1898, 'Paragua�u', 314720, 11, 20245, 47.71, 'paragua�uense', 424.296);
INSERT INTO tb_cidades VALUES (1900, 'Paraopeba', 314740, 11, 22563, 36.06, 'paraopebense', 625.623);
INSERT INTO tb_cidades VALUES (1902, 'Passa Tempo', 314770, 11, 8197, 19.1, 'passa-tempense', 429.172);
INSERT INTO tb_cidades VALUES (1904, 'Passab�m', 314750, 11, 1766, 18.75, 'passabenense', 94.182);
INSERT INTO tb_cidades VALUES (1905, 'Passos', 314790, 11, 106290, 79.44, 'passense', 1338.07);
INSERT INTO tb_cidades VALUES (2728, 'Santa Helena', 251330, 15, 5369, 25.53, 'santa-helenense', 210.321);
INSERT INTO tb_cidades VALUES (1908, 'Patroc�nio', 314810, 11, 82471, 28.69, 'patrocinense', 2874.343);
INSERT INTO tb_cidades VALUES (1910, 'Paula C�ndido', 314830, 11, 9271, 34.55, 'paula-candense', 268.321);
INSERT INTO tb_cidades VALUES (1912, 'Pav�o', 314850, 11, 8589, 14.29, 'pavoense', 601.189);
INSERT INTO tb_cidades VALUES (1913, 'Pe�anha', 314860, 11, 17260, 17.32, 'pe�anhense', 996.645);
INSERT INTO tb_cidades VALUES (1915, 'Pedra Bonita', 314875, 11, 6673, 38.37, 'pedrabonitense', 173.928);
INSERT INTO tb_cidades VALUES (1917, 'Pedra Do Indai�', 314890, 11, 3875, 11.14, 'andaiaense', 347.92);
INSERT INTO tb_cidades VALUES (1919, 'Pedralva', 314910, 11, 11467, 52.6, 'pedralvense', 217.99);
INSERT INTO tb_cidades VALUES (1920, 'Pedras De Maria Da Cruz', 314915, 11, 10315, 6.76, 'pedrense', 1525.49);
INSERT INTO tb_cidades VALUES (1922, 'Pedro Leopoldo', 314930, 11, 58740, 200.49, 'pedro-leopoldense', 292.989);
INSERT INTO tb_cidades VALUES (1924, 'Pequeri', 314950, 11, 3165, 34.84, 'pequeriense', 90.833);
INSERT INTO tb_cidades VALUES (1925, 'Pequi', 314960, 11, 4076, 19.98, 'pequiense', 203.991);
INSERT INTO tb_cidades VALUES (1927, 'Perdizes', 314980, 11, 14404, 5.88, 'perdizense', 2450.814);
INSERT INTO tb_cidades VALUES (1929, 'Periquito', 314995, 11, 7036, 30.74, 'periquitense', 228.907);
INSERT INTO tb_cidades VALUES (1931, 'Piau', 315010, 11, 2841, 14.78, 'piauense', 192.196);
INSERT INTO tb_cidades VALUES (1933, 'Piedade De Ponte Nova', 315020, 11, 4062, 48.51, 'piedadense', 83.733);
INSERT INTO tb_cidades VALUES (1934, 'Piedade Do Rio Grande', 315030, 11, 4709, 14.59, 'piedadense', 322.814);
INSERT INTO tb_cidades VALUES (1936, 'Pimenta', 315050, 11, 8236, 19.85, 'pimentense', 414.969);
INSERT INTO tb_cidades VALUES (1938, 'Pint�polis', 315057, 11, 7211, 5.87, 'pintopolense', 1228.734);
INSERT INTO tb_cidades VALUES (1939, 'Piracema', 315060, 11, 6406, 22.85, 'piracemense', 280.335);
INSERT INTO tb_cidades VALUES (1941, 'Piranga', 315080, 11, 17232, 26.16, 'piranguense', 658.811);
INSERT INTO tb_cidades VALUES (1943, 'Piranguinho', 315100, 11, 8016, 64.23, 'piranguinhense', 124.803);
INSERT INTO tb_cidades VALUES (1944, 'Pirapetinga', 315110, 11, 10364, 54.35, 'pirapetinguense', 190.676);
INSERT INTO tb_cidades VALUES (1946, 'Pira�ba', 315130, 11, 10862, 75.28, 'piraubano', 144.289);
INSERT INTO tb_cidades VALUES (1948, 'Piumhi', 315150, 11, 31883, 35.33, 'piuiense', 902.468);
INSERT INTO tb_cidades VALUES (1950, 'Po�o Fundo', 315170, 11, 15959, 33.65, 'po�o-fundense', 474.244);
INSERT INTO tb_cidades VALUES (1952, 'Pocrane', 315190, 11, 8986, 13, 'pocranense', 691.065);
INSERT INTO tb_cidades VALUES (1953, 'Pomp�u', 315200, 11, 29105, 11.41, 'pompeano', 2551.072);
INSERT INTO tb_cidades VALUES (1955, 'Ponto Chique', 315213, 11, 3966, 6.58, 'ponto chiquense', 602.798);
INSERT INTO tb_cidades VALUES (1957, 'Porteirinha', 315220, 11, 37627, 21.51, 'porteirinhense', 1749.679);
INSERT INTO tb_cidades VALUES (1958, 'Porto Firme', 315230, 11, 10417, 36.58, 'porto-firmense', 284.777);
INSERT INTO tb_cidades VALUES (1960, 'Pouso Alegre', 315250, 11, 130615, 240.51, 'pouso-alegrense', 543.068);
INSERT INTO tb_cidades VALUES (1962, 'Prados', 315270, 11, 8391, 31.77, 'pradense', 264.115);
INSERT INTO tb_cidades VALUES (1964, 'Prat�polis', 315290, 11, 8807, 40.86, 'pratapolense', 215.516);
INSERT INTO tb_cidades VALUES (1966, 'Presidente Bernardes', 315310, 11, 5537, 23.38, 'bernardense', 236.798);
INSERT INTO tb_cidades VALUES (1968, 'Presidente Kubitschek', 315330, 11, 2959, 15.64, 'kubitschekano', 189.235);
INSERT INTO tb_cidades VALUES (1969, 'Presidente Oleg�rio', 315340, 11, 18577, 5.3, 'olegariense', 3503.795);
INSERT INTO tb_cidades VALUES (1971, 'Quartel Geral', 315370, 11, 3303, 5.94, 'quartelense', 556.435);
INSERT INTO tb_cidades VALUES (1972, 'Queluzito', 315380, 11, 1861, 12.12, 'queluzitano', 153.56);
INSERT INTO tb_cidades VALUES (1974, 'Raul Soares', 315400, 11, 23818, 31.2, 'raul-soarense', 763.364);
INSERT INTO tb_cidades VALUES (1976, 'Reduto', 315415, 11, 6569, 43.26, 'redutense', 151.859);
INSERT INTO tb_cidades VALUES (1978, 'Resplendor', 315430, 11, 17089, 15.8, 'resplendorense', 1081.794);
INSERT INTO tb_cidades VALUES (1979, 'Ressaquinha', 315440, 11, 4711, 25.52, 'ressaquinhense', 184.609);
INSERT INTO tb_cidades VALUES (1981, 'Riacho Dos Machados', 315450, 11, 9360, 7.11, 'riachense', 1315.537);
INSERT INTO tb_cidades VALUES (1983, 'Ribeir�o Vermelho', 315470, 11, 3826, 77.68, 'ribeirense', 49.251);
INSERT INTO tb_cidades VALUES (1985, 'Rio Casca', 315490, 11, 14201, 36.95, 'rio-casquense', 384.362);
INSERT INTO tb_cidades VALUES (1986, 'Rio Do Prado', 315510, 11, 5217, 10.87, 'rio-pradense', 479.814);
INSERT INTO tb_cidades VALUES (1988, 'Rio Espera', 315520, 11, 6070, 25.44, 'rio-esperense', 238.602);
INSERT INTO tb_cidades VALUES (1990, 'Rio Novo', 315540, 11, 8712, 41.62, 'rio-novense', 209.31);
INSERT INTO tb_cidades VALUES (1992, 'Rio Pardo De Minas', 315560, 11, 29099, 9.33, 'rio-pardense', 3117.43);
INSERT INTO tb_cidades VALUES (1993, 'Rio Piracicaba', 315570, 11, 14149, 37.93, 'piracicabense', 373.037);
INSERT INTO tb_cidades VALUES (1995, 'Rio Preto', 315590, 11, 5292, 15.2, 'rio-pretense', 348.14);
INSERT INTO tb_cidades VALUES (1997, 'Rit�polis', 315610, 11, 4925, 12.17, 'ritapolitano', 404.804);
INSERT INTO tb_cidades VALUES (1999, 'Rodeiro', 315630, 11, 6867, 94.49, 'rodeirense', 72.673);
INSERT INTO tb_cidades VALUES (2000, 'Romaria', 315640, 11, 3596, 8.82, 'romariense', 407.557);
INSERT INTO tb_cidades VALUES (2002, 'Rubelita', 315650, 11, 7772, 7, 'rubelitense', 1110.292);
INSERT INTO tb_cidades VALUES (2004, 'Sabar�', 315670, 11, 126269, 417.87, 'sabaraense', 302.173);
INSERT INTO tb_cidades VALUES (2006, 'Sacramento', 315690, 11, 23896, 7.78, 'sacramentense', 3073.268);
INSERT INTO tb_cidades VALUES (2007, 'Salinas', 315700, 11, 39178, 20.75, 'salinense', 1887.642);
INSERT INTO tb_cidades VALUES (2009, 'Santa B�rbara', 315720, 11, 27876, 40.75, 'santa-barbarense', 684.059);
INSERT INTO tb_cidades VALUES (2011, 'Santa B�rbara Do Monte Verde', 315727, 11, 2788, 6.67, 'barbarense', 417.83);
INSERT INTO tb_cidades VALUES (2012, 'Santa B�rbara Do Tug�rio', 315730, 11, 4570, 23.49, 'tugurense', 194.562);
INSERT INTO tb_cidades VALUES (2014, 'Santa Cruz De Salinas', 315737, 11, 4397, 7.46, 'santacruzense', 589.572);
INSERT INTO tb_cidades VALUES (2016, 'Santa Efig�nia De Minas', 315750, 11, 4600, 34.86, 'santa-efigense', 131.965);
INSERT INTO tb_cidades VALUES (2017, 'Santa F� De Minas', 315760, 11, 3968, 1.36, 'santa-feense', 2917.445);
INSERT INTO tb_cidades VALUES (2019, 'Santa Juliana', 315770, 11, 11337, 15.66, 'santa-julianense', 723.783);
INSERT INTO tb_cidades VALUES (2020, 'Santa Luzia', 315780, 11, 202942, 862.38, 'luziense', 235.327);
INSERT INTO tb_cidades VALUES (2022, 'Santa Maria De Itabira', 315800, 11, 10552, 17.66, 'santa-mariense', 597.437);
INSERT INTO tb_cidades VALUES (2024, 'Santa Maria Do Sua�u�', 315820, 11, 14395, 23.07, 'santa-mariense', 624.046);
INSERT INTO tb_cidades VALUES (2026, 'Santa Rita De Ibitipoca', 315940, 11, 3583, 11.05, 'ibitipoquense', 324.234);
INSERT INTO tb_cidades VALUES (2027, 'Santa Rita De Jacutinga', 315930, 11, 4993, 11.86, 'santa-ritense ', 420.94);
INSERT INTO tb_cidades VALUES (2029, 'Santa Rita Do Itueto', 315950, 11, 5697, 11.74, 'santa-ritense ', 485.081);
INSERT INTO tb_cidades VALUES (2033, 'Santana Da Vargem', 315830, 11, 7231, 41.93, 'vargense', 172.444);
INSERT INTO tb_cidades VALUES (2035, 'Santana De Pirapama', 315850, 11, 8009, 6.38, 'pirapamenho', 1255.83);
INSERT INTO tb_cidades VALUES (2036, 'Santana Do Deserto', 315860, 11, 3860, 21.13, 'santanense', 182.655);
INSERT INTO tb_cidades VALUES (2038, 'Santana Do Jacar�', 315880, 11, 4607, 43.39, 'santanense', 106.169);
INSERT INTO tb_cidades VALUES (2040, 'Santana Do Para�so', 315895, 11, 27265, 98.76, 'paraisense', 276.067);
INSERT INTO tb_cidades VALUES (2041, 'Santana Do Riacho', 315900, 11, 4023, 5.94, 'riachense', 677.206);
INSERT INTO tb_cidades VALUES (2043, 'Santo Ant�nio Do Amparo', 315990, 11, 17345, 35.48, 'amparense', 488.884);
INSERT INTO tb_cidades VALUES (2045, 'Santo Ant�nio Do Grama', 316010, 11, 4085, 31.37, 'gramense', 130.212);
INSERT INTO tb_cidades VALUES (2046, 'Santo Ant�nio Do Itamb�', 316020, 11, 4135, 13.52, 'itambeano', 305.736);
INSERT INTO tb_cidades VALUES (2048, 'Santo Ant�nio Do Monte', 316040, 11, 25975, 23.07, 'santo-antoniense', 1125.779);
INSERT INTO tb_cidades VALUES (2050, 'Santo Ant�nio Do Rio Abaixo', 316050, 11, 1777, 16.57, 'santo-antoniense', 107.269);
INSERT INTO tb_cidades VALUES (2051, 'Santo Hip�lito', 316060, 11, 3238, 7.52, 'santo-hipolitense', 430.656);
INSERT INTO tb_cidades VALUES (2053, 'S�o Bento Abade', 316080, 11, 4577, 56.93, 's�o-bentista', 80.403);
INSERT INTO tb_cidades VALUES (2055, 'S�o Domingos Das Dores', 316095, 11, 5408, 88.85, 'sandominguense', 60.865);
INSERT INTO tb_cidades VALUES (2056, 'S�o Domingos Do Prata', 316100, 11, 17357, 23.34, 'pratense', 743.767);
INSERT INTO tb_cidades VALUES (2058, 'S�o Francisco', 316110, 11, 53828, 16.27, 's�o-franciscano', 3308.094);
INSERT INTO tb_cidades VALUES (2060, 'S�o Francisco De Sales', 316130, 11, 5776, 5.12, 's�o-francisco-salense', 1128.865);
INSERT INTO tb_cidades VALUES (2062, 'S�o Geraldo', 316150, 11, 10263, 55.3, 's�o-geraldense', 185.578);
INSERT INTO tb_cidades VALUES (2063, 'S�o Geraldo Da Piedade', 316160, 11, 4389, 28.81, 's�o-geraldense', 152.336);
INSERT INTO tb_cidades VALUES (2065, 'S�o Gon�alo Do Abaet�', 316170, 11, 6264, 2.33, 's�o-gon�alense', 2692.168);
INSERT INTO tb_cidades VALUES (2066, 'S�o Gon�alo Do Par�', 316180, 11, 10398, 39.13, 's�o-gon�alense', 265.73);
INSERT INTO tb_cidades VALUES (2068, 'S�o Gon�alo Do Rio Preto', 312550, 11, 3056, 9.72, 's�o-gon�alense', 314.458);
INSERT INTO tb_cidades VALUES (2070, 'S�o Gotardo', 316210, 11, 31819, 36.74, 's�o-gotardense', 866.087);
INSERT INTO tb_cidades VALUES (2071, 'S�o Jo�o Batista Do Gl�ria', 316220, 11, 6887, 12.57, 'gloriense', 547.908);
INSERT INTO tb_cidades VALUES (2073, 'S�o Jo�o Da Mata', 316230, 11, 2731, 22.66, 's�o-joanense-da-mata', 120.536);
INSERT INTO tb_cidades VALUES (2075, 'S�o Jo�o Das Miss�es', 316245, 11, 11715, 17.27, 'missionense', 678.273);
INSERT INTO tb_cidades VALUES (2076, 'S�o Jo�o Del Rei', 316250, 11, 84469, 57.68, 's�o-joanense', 1464.327);
INSERT INTO tb_cidades VALUES (2078, 'S�o Jo�o Do Manteninha', 316257, 11, 5188, 37.61, 'manteniense', 137.927);
INSERT INTO tb_cidades VALUES (2080, 'S�o Jo�o Do Pacu�', 316265, 11, 4060, 9.76, 'pacu�ense', 415.921);
INSERT INTO tb_cidades VALUES (2081, 'S�o Jo�o Do Para�so', 316270, 11, 22319, 11.59, 'paraisense', 1925.571);
INSERT INTO tb_cidades VALUES (2083, 'S�o Jo�o Nepomuceno', 316290, 11, 25057, 61.5, 's�o-joanense', 407.427);
INSERT INTO tb_cidades VALUES (2085, 'S�o Jos� Da Barra', 316294, 11, 6778, 21.57, 's�o jos� barrense', 314.253);
INSERT INTO tb_cidades VALUES (2086, 'S�o Jos� Da Lapa', 316295, 11, 19799, 413.09, 'lapense', 47.929);
INSERT INTO tb_cidades VALUES (2088, 'S�o Jos� Da Varginha', 316310, 11, 4198, 20.43, 'varginense-de-s�o-jos�', 205.501);
INSERT INTO tb_cidades VALUES (2090, 'S�o Jos� Do Divino', 316330, 11, 3834, 11.66, 's�o-jos�-divinense', 328.703);
INSERT INTO tb_cidades VALUES (2091, 'S�o Jos� Do Goiabal', 316340, 11, 5636, 30.55, 'goiabalense', 184.511);
INSERT INTO tb_cidades VALUES (2093, 'S�o Jos� Do Mantimento', 316360, 11, 2592, 47.38, 'mantimentense', 54.701);
INSERT INTO tb_cidades VALUES (2095, 'S�o Miguel Do Anta', 316380, 11, 6760, 44.44, 's�o-miguelense', 152.111);
INSERT INTO tb_cidades VALUES (2096, 'S�o Pedro Da Uni�o', 316390, 11, 5040, 19.32, 's�o-pedrense', 260.827);
INSERT INTO tb_cidades VALUES (2098, 'S�o Pedro Dos Ferros', 316400, 11, 8356, 20.75, 'ferrense', 402.757);
INSERT INTO tb_cidades VALUES (2099, 'S�o Rom�o', 316420, 11, 10276, 4.22, 's�o-romano', 2434.001);
INSERT INTO tb_cidades VALUES (2101, 'S�o Sebasti�o Da Bela Vista', 316440, 11, 4948, 29.6, 'bela-vistense', 167.157);
INSERT INTO tb_cidades VALUES (2103, 'S�o Sebasti�o Do Anta', 316447, 11, 5739, 71.19, 'antense', 80.618);
INSERT INTO tb_cidades VALUES (2104, 'S�o Sebasti�o Do Maranh�o', 316450, 11, 10647, 20.56, 'maranhense', 517.829);
INSERT INTO tb_cidades VALUES (2106, 'S�o Sebasti�o Do Para�so', 316470, 11, 64980, 79.74, 'paraisense', 814.925);
INSERT INTO tb_cidades VALUES (2108, 'S�o Sebasti�o Do Rio Verde', 316490, 11, 2110, 22.89, 'rio-verdense', 92.194);
INSERT INTO tb_cidades VALUES (2109, 'S�o Thom� Das Letras', 316520, 11, 6655, 18, 's�o-tomeense ', 369.747);
INSERT INTO tb_cidades VALUES (2110, 'S�o Tiago', 316500, 11, 10561, 18.45, 's�o-tiaguense', 572.4);
INSERT INTO tb_cidades VALUES (2112, 'S�o Vicente De Minas', 316530, 11, 7008, 17.85, 'vicenciano', 392.651);
INSERT INTO tb_cidades VALUES (2114, 'Sardo�', 316550, 11, 5594, 39.42, 'sardoense', 141.904);
INSERT INTO tb_cidades VALUES (2115, 'Sarzedo', 316553, 11, 25814, 415.46, 'sarzedense', 62.134);
INSERT INTO tb_cidades VALUES (2117, 'Senador Amaral', 316557, 11, 5219, 34.54, 'amaralense', 151.098);
INSERT INTO tb_cidades VALUES (2119, 'Senador Firmino', 316570, 11, 7230, 43.42, 'firminense', 166.495);
INSERT INTO tb_cidades VALUES (2121, 'Senador Modestino Gon�alves', 316590, 11, 4574, 4.8, 'modestinense', 952.054);
INSERT INTO tb_cidades VALUES (2122, 'Senhora De Oliveira', 316600, 11, 5683, 33.28, 'oliveirense', 170.749);
INSERT INTO tb_cidades VALUES (2124, 'Senhora Dos Rem�dios', 316620, 11, 10196, 42.87, 'remediense', 237.816);
INSERT INTO tb_cidades VALUES (2126, 'Seritinga', 316640, 11, 1789, 15.59, 'seritinguense', 114.769);
INSERT INTO tb_cidades VALUES (2127, 'Serra Azul De Minas', 316650, 11, 4220, 19.31, 'serra-azulense', 218.594);
INSERT INTO tb_cidades VALUES (2129, 'Serra Do Salitre', 316680, 11, 10549, 8.14, 'serralitrense ', 1295.272);
INSERT INTO tb_cidades VALUES (2131, 'Serrania', 316690, 11, 7542, 36.04, 'serraniense', 209.27);
INSERT INTO tb_cidades VALUES (2133, 'Serranos', 316700, 11, 1995, 9.36, 'serranense', 213.173);
INSERT INTO tb_cidades VALUES (2134, 'Serro', 316710, 11, 20835, 17.11, 'serrano', 1217.812);
INSERT INTO tb_cidades VALUES (2136, 'Setubinha', 316555, 11, 10885, 20.36, 'setubinhense', 534.654);
INSERT INTO tb_cidades VALUES (2137, 'Silveir�nia', 316730, 11, 2192, 13.92, 'silveiranense', 157.456);
INSERT INTO tb_cidades VALUES (2139, 'Sim�o Pereira', 316750, 11, 2537, 18.7, 'simonense', 135.689);
INSERT INTO tb_cidades VALUES (2141, 'Sobr�lia', 316770, 11, 5830, 28.19, 'sobraliense', 206.786);
INSERT INTO tb_cidades VALUES (2143, 'Tabuleiro', 316790, 11, 4079, 19.32, 'tabuleirense', 211.084);
INSERT INTO tb_cidades VALUES (2144, 'Taiobeiras', 316800, 11, 30917, 25.88, 'taiobeirense', 1194.524);
INSERT INTO tb_cidades VALUES (2731, 'Santa Rita', 251370, 15, 120310, 165.52, 'santa-ritense', 726.843);
INSERT INTO tb_cidades VALUES (2147, 'Tapira�', 316820, 11, 1873, 4.59, 'tapiraiense', 407.919);
INSERT INTO tb_cidades VALUES (2149, 'Tarumirim', 316840, 11, 14293, 19.53, 'tarumirinhense', 731.752);
INSERT INTO tb_cidades VALUES (2150, 'Teixeiras', 316850, 11, 11355, 68.1, 'teixeirense', 166.735);
INSERT INTO tb_cidades VALUES (2152, 'Tim�teo', 316870, 11, 81243, 562.7, 'timotense', 144.381);
INSERT INTO tb_cidades VALUES (2154, 'Tiros', 316890, 11, 6906, 3.3, 'tirense', 2091.772);
INSERT INTO tb_cidades VALUES (2155, 'Tocantins', 316900, 11, 15823, 91.01, 'tocantinense', 173.866);
INSERT INTO tb_cidades VALUES (2157, 'Toledo', 316910, 11, 5764, 42.14, 'toledense', 136.776);
INSERT INTO tb_cidades VALUES (2159, 'Tr�s Cora��es', 316930, 11, 72765, 87.88, 'tricordiano', 828.038);
INSERT INTO tb_cidades VALUES (2161, 'Tr�s Pontas', 316940, 11, 53860, 78.08, 'tr�s-pontano', 689.794);
INSERT INTO tb_cidades VALUES (2162, 'Tumiritinga', 316950, 11, 6293, 12.58, 'tumiritinguense', 500.072);
INSERT INTO tb_cidades VALUES (2164, 'Turmalina', 316970, 11, 18055, 15.66, 'turmalinense', 1153.109);
INSERT INTO tb_cidades VALUES (2166, 'Ub�', 316990, 11, 101519, 249.16, 'ubaense', 407.452);
INSERT INTO tb_cidades VALUES (2167, 'Uba�', 317000, 11, 11681, 14.24, 'ubaiense', 820.523);
INSERT INTO tb_cidades VALUES (2169, 'Uberaba', 317010, 11, 295988, 65.43, 'uberabense', 4523.957);
INSERT INTO tb_cidades VALUES (2171, 'Umburatiba', 317030, 11, 2705, 6.67, 'umburatibense', 405.832);
INSERT INTO tb_cidades VALUES (2173, 'Uni�o De Minas', 317043, 11, 4418, 3.85, 'uniense', 1147.407);
INSERT INTO tb_cidades VALUES (2174, 'Uruana De Minas', 317047, 11, 3235, 5.41, 'uruanense', 598.501);
INSERT INTO tb_cidades VALUES (2176, 'Urucuia', 317052, 11, 13604, 6.55, 'urucuiano', 2076.939);
INSERT INTO tb_cidades VALUES (2178, 'Vargem Bonita', 317060, 11, 2163, 5.28, 'vargiano', 409.888);
INSERT INTO tb_cidades VALUES (2180, 'Varginha', 317070, 11, 123081, 311.29, 'varginhense', 395.396);
INSERT INTO tb_cidades VALUES (2181, 'Varj�o De Minas', 317075, 11, 6054, 9.29, 'varjonense', 651.555);
INSERT INTO tb_cidades VALUES (2183, 'Varzel�ndia', 317090, 11, 19116, 23.46, 'varzelandense', 814.993);
INSERT INTO tb_cidades VALUES (2184, 'Vazante', 317100, 11, 19723, 10.31, 'vazantino', 1913.395);
INSERT INTO tb_cidades VALUES (2186, 'Veredinha', 317107, 11, 5549, 8.78, 'veredinhense', 631.69);
INSERT INTO tb_cidades VALUES (2188, 'Vermelho Novo', 317115, 11, 4689, 40.69, 'vermelhense', 115.242);
INSERT INTO tb_cidades VALUES (2190, 'Vi�osa', 317130, 11, 72220, 241.2, 'vi�osense', 299.418);
INSERT INTO tb_cidades VALUES (2191, 'Vieiras', 317140, 11, 3731, 33.11, 'vieirense', 112.691);
INSERT INTO tb_cidades VALUES (2193, 'Virg�nia', 317170, 11, 8623, 26.41, 'virginense', 326.515);
INSERT INTO tb_cidades VALUES (2195, 'Virgol�ndia', 317190, 11, 5658, 20.13, 'virgolandense', 281.022);
INSERT INTO tb_cidades VALUES (2197, 'Volta Grande', 317210, 11, 5070, 24.36, 'volta-grandense', 208.131);
INSERT INTO tb_cidades VALUES (2198, 'Wenceslau Braz', 317220, 11, 2553, 24.91, 'wenceslauense', 102.487);
INSERT INTO tb_cidades VALUES (2200, 'Alcin�polis', 500025, 12, 4569, 1.04, 'alcinopolense', 4399.685);
INSERT INTO tb_cidades VALUES (2202, 'Anast�cio', 500070, 12, 23835, 8.08, 'anastaciano', 2949.135);
INSERT INTO tb_cidades VALUES (2203, 'Anauril�ndia', 500080, 12, 8493, 2.5, 'anaurilandense', 3395.443);
INSERT INTO tb_cidades VALUES (2205, 'Ant�nio Jo�o', 500090, 12, 8208, 7.17, 'ant�nio-joanense', 1145.178);
INSERT INTO tb_cidades VALUES (2207, 'Aquidauana', 500110, 12, 45614, 2.69, 'aquidauanense', 16957.783);
INSERT INTO tb_cidades VALUES (2209, 'Bandeirantes', 500150, 12, 6609, 2.12, 'bandeirantense', 3115.688);
INSERT INTO tb_cidades VALUES (2210, 'Bataguassu', 500190, 12, 19839, 8.21, 'bataguassuense', 2415.301);
INSERT INTO tb_cidades VALUES (2212, 'Bela Vista', 500210, 12, 23181, 4.74, 'bela-vistense', 4892.616);
INSERT INTO tb_cidades VALUES (2214, 'Bonito', 500220, 12, 19587, 3.97, 'bonitense', 4934.425);
INSERT INTO tb_cidades VALUES (2216, 'Caarap�', 500240, 12, 25767, 12.33, 'caarapoense', 2089.605);
INSERT INTO tb_cidades VALUES (2217, 'Camapu�', 500260, 12, 13625, 2.19, 'camapuense ', 6229.628);
INSERT INTO tb_cidades VALUES (2219, 'Caracol', 500280, 12, 5398, 1.84, 'caracolense', 2940.259);
INSERT INTO tb_cidades VALUES (2221, 'Chapad�o Do Sul', 500295, 12, 19648, 5.1, 'chapadense', 3851.004);
INSERT INTO tb_cidades VALUES (2222, 'Corguinho', 500310, 12, 4862, 1.84, 'corguinhense ', 2639.855);
INSERT INTO tb_cidades VALUES (2224, 'Corumb�', 500320, 12, 103703, 1.6, 'corumbaense', 64962.836);
INSERT INTO tb_cidades VALUES (2226, 'Coxim', 500330, 12, 32159, 5.02, 'coxinense', 6409.232);
INSERT INTO tb_cidades VALUES (2227, 'Deod�polis', 500345, 12, 12139, 14.6, 'deodapolense', 831.213);
INSERT INTO tb_cidades VALUES (2229, 'Douradina', 500350, 12, 5364, 19.1, 'douradinense', 280.787);
INSERT INTO tb_cidades VALUES (2231, 'Eldorado', 500375, 12, 11694, 11.49, 'eldoradense', 1017.788);
INSERT INTO tb_cidades VALUES (2233, 'Figueir�o', 500390, 12, 2928, 0.6, '', 4882.879);
INSERT INTO tb_cidades VALUES (2234, 'Gl�ria De Dourados', 500400, 12, 9927, 20.19, 'gl�ria-douradense', 491.749);
INSERT INTO tb_cidades VALUES (2236, 'Iguatemi', 500430, 12, 14875, 5.05, 'iguatemiense', 2946.524);
INSERT INTO tb_cidades VALUES (2237, 'Inoc�ncia', 500440, 12, 7669, 1.33, 'inocentino', 5776.033);
INSERT INTO tb_cidades VALUES (2239, 'Itaquira�', 500460, 12, 18614, 9.02, 'itaquirense ', 2063.785);
INSERT INTO tb_cidades VALUES (2241, 'Japor�', 500480, 12, 7731, 18.43, 'japoraense ', 419.398);
INSERT INTO tb_cidades VALUES (2243, 'Jardim', 500500, 12, 24346, 11.06, 'jardinense', 2201.52);
INSERT INTO tb_cidades VALUES (2245, 'Juti', 500515, 12, 5900, 3.72, 'jutiense', 1584.543);
INSERT INTO tb_cidades VALUES (2246, 'Lad�rio', 500520, 12, 19617, 57.57, 'ladarense', 340.765);
INSERT INTO tb_cidades VALUES (2248, 'Maracaju', 500540, 12, 37405, 7.06, 'maracajuense ', 5299.195);
INSERT INTO tb_cidades VALUES (2250, 'Mundo Novo', 500568, 12, 17043, 35.67, 'mundo-novense', 477.783);
INSERT INTO tb_cidades VALUES (2252, 'Nioaque', 500580, 12, 14391, 3.67, 'nioaquense', 3923.799);
INSERT INTO tb_cidades VALUES (2254, 'Nova Andradina', 500620, 12, 45585, 9.54, 'nova-andradinense ', 4776.011);
INSERT INTO tb_cidades VALUES (2255, 'Novo Horizonte Do Sul', 500625, 12, 4940, 5.82, 'novo horizontino do sul', 849.095);
INSERT INTO tb_cidades VALUES (2257, 'Paranhos', 500635, 12, 12350, 9.43, 'paranhense', 1309.159);
INSERT INTO tb_cidades VALUES (2259, 'Ponta Por�', 500660, 12, 77872, 14.61, 'ponta-poranense', 5330.461);
INSERT INTO tb_cidades VALUES (2261, 'Ribas Do Rio Pardo', 500710, 12, 20946, 1.21, 'rio-pardense', 17308.107);
INSERT INTO tb_cidades VALUES (2262, 'Rio Brilhante', 500720, 12, 30663, 7.69, 'rio-brilhantense', 3987.405);
INSERT INTO tb_cidades VALUES (2264, 'Rio Verde De Mato Grosso', 500740, 12, 18890, 2.32, 'rio-verdense', 8153.911);
INSERT INTO tb_cidades VALUES (2266, 'Santa Rita Do Pardo', 500755, 12, 7259, 1.18, 'santa-ritense', 6143.081);
INSERT INTO tb_cidades VALUES (2268, 'Selv�ria', 500780, 12, 6287, 1.93, 'selvirense', 3258.329);
INSERT INTO tb_cidades VALUES (2269, 'Sete Quedas', 500770, 12, 10780, 12.93, 'sete-quedense', 833.735);
INSERT INTO tb_cidades VALUES (2271, 'Sonora', 500793, 12, 14833, 3.64, 'sonorense', 4075.426);
INSERT INTO tb_cidades VALUES (2733, 'Santana De Mangueira', 251350, 15, 5331, 13.26, 'santanense', 402.15);
INSERT INTO tb_cidades VALUES (2274, 'Terenos', 500800, 12, 17146, 6.03, 'terenense', 2844.513);
INSERT INTO tb_cidades VALUES (2276, 'Vicentina', 500840, 12, 5901, 19.03, 'vicentinense', 310.164);
INSERT INTO tb_cidades VALUES (2278, '�gua Boa', 510020, 13, 20856, 2.77, '�gua-boense', 7537.949);
INSERT INTO tb_cidades VALUES (2280, 'Alto Araguaia', 510030, 13, 15644, 2.84, 'araguaiano ', 5514.513);
INSERT INTO tb_cidades VALUES (2281, 'Alto Boa Vista', 510035, 13, 5247, 2.34, 'alto boa vistense', 2240.445);
INSERT INTO tb_cidades VALUES (2283, 'Alto Paraguai', 510050, 13, 10066, 5.45, 'alto-paraguaiense', 1846.3);
INSERT INTO tb_cidades VALUES (2285, 'Apiac�s', 510080, 13, 8567, 0.42, 'apiacaense', 20379.906);
INSERT INTO tb_cidades VALUES (2286, 'Araguaiana', 510100, 13, 3197, 0.5, 'araguaianense', 6429.38);
INSERT INTO tb_cidades VALUES (2288, 'Araputanga', 510125, 13, 15342, 9.59, 'araputanguense', 1600.26);
INSERT INTO tb_cidades VALUES (2290, 'Aripuan�', 510140, 13, 18656, 0.76, 'aripuanense', 24612.987);
INSERT INTO tb_cidades VALUES (2292, 'Barra Do Bugres', 510170, 13, 31793, 5.31, 'barrense', 5992.573);
INSERT INTO tb_cidades VALUES (2294, 'Bom Jesus Do Araguaia', 510185, 13, 5314, 1.24, ' bom-jesuense ', 4274.205);
INSERT INTO tb_cidades VALUES (2295, 'Brasnorte', 510190, 13, 15357, 0.96, 'brasnortense', 15959.066);
INSERT INTO tb_cidades VALUES (2297, 'Campin�polis', 510260, 13, 14305, 2.45, 'campinapolense', 5835.481);
INSERT INTO tb_cidades VALUES (2299, 'Campo Verde', 510267, 13, 31589, 6.61, 'campo-verdense', 4782.116);
INSERT INTO tb_cidades VALUES (2300, 'Campos De J�lio', 510268, 13, 5154, 0.76, 'campo juliense', 6801.862);
INSERT INTO tb_cidades VALUES (2302, 'Canarana', 510270, 13, 18754, 1.73, 'canaranense', 10854.335);
INSERT INTO tb_cidades VALUES (2304, 'Castanheira', 510285, 13, 8231, 2.22, 'castanheirense', 3703.671);
INSERT INTO tb_cidades VALUES (2306, 'Cl�udia', 510305, 13, 11028, 2.86, 'claudiense', 3849.989);
INSERT INTO tb_cidades VALUES (2307, 'Cocalinho', 510310, 13, 5490, 0.33, 'cocalinhense', 16530.643);
INSERT INTO tb_cidades VALUES (2309, 'Colniza', 510325, 13, 26381, 0.94, 'colnizense', 27924.534);
INSERT INTO tb_cidades VALUES (2310, 'Comodoro', 510330, 13, 18178, 0.83, 'comodorense', 21774.219);
INSERT INTO tb_cidades VALUES (2313, 'Cotrigua�u', 510337, 13, 14983, 1.58, 'cotrigua�uenses', 9460.472);
INSERT INTO tb_cidades VALUES (2314, 'Cuiab�', 510340, 13, 551098, 163.88, 'cuiabano (papa peixe)', 3362.755);
INSERT INTO tb_cidades VALUES (2316, 'Denise', 510345, 13, 8523, 6.52, 'denisiense', 1307.19);
INSERT INTO tb_cidades VALUES (2318, 'Dom Aquino', 510360, 13, 8171, 3.71, 'dom-aquinense', 2204.158);
INSERT INTO tb_cidades VALUES (2320, 'Figueir�polis D`Oeste', 510380, 13, 3796, 4.22, 'figueiropolense', 899.385);
INSERT INTO tb_cidades VALUES (2321, 'Ga�cha Do Norte', 510385, 13, 6293, 0.37, 'gauchenses-do-norte', 16930.653);
INSERT INTO tb_cidades VALUES (2323, 'Gl�ria D`Oeste', 510395, 13, 3135, 3.67, 'glorienses-do-oeste', 853.848);
INSERT INTO tb_cidades VALUES (2325, 'Guiratinga', 510420, 13, 13934, 2.75, 'guiratinguense ', 5061.689);
INSERT INTO tb_cidades VALUES (2327, 'Ipiranga Do Norte', 510452, 13, 5123, 1.48, 'ipiranguense', 3467.047);
INSERT INTO tb_cidades VALUES (2328, 'Itanhang�', 510454, 13, 5276, 1.82, 'itanhangaense', 2898.069);
INSERT INTO tb_cidades VALUES (2330, 'Itiquira', 510460, 13, 11478, 1.32, 'itiquirense', 8722.486);
INSERT INTO tb_cidades VALUES (2332, 'Jangada', 510490, 13, 7696, 6.14, 'jangadense', 1253.768);
INSERT INTO tb_cidades VALUES (2334, 'Juara', 510510, 13, 32791, 1.45, 'juarense', 22641.187);
INSERT INTO tb_cidades VALUES (2335, 'Ju�na', 510515, 13, 39255, 1.49, 'juinense', 26395.845);
INSERT INTO tb_cidades VALUES (2337, 'Juscimeira', 510520, 13, 11430, 5.18, 'juscimeirense', 2206.045);
INSERT INTO tb_cidades VALUES (2339, 'Lucas Do Rio Verde', 510525, 13, 45556, 12.43, 'luquense', 3663.995);
INSERT INTO tb_cidades VALUES (2341, 'Marcel�ndia', 510558, 13, 12006, 0.98, 'marcelandense', 12281.242);
INSERT INTO tb_cidades VALUES (2342, 'Matup�', 510560, 13, 14174, 2.71, 'matupaense', 5238.844);
INSERT INTO tb_cidades VALUES (2344, 'Nobres', 510590, 13, 15002, 3.85, 'nobrense', 3892.051);
INSERT INTO tb_cidades VALUES (2346, 'Nossa Senhora Do Livramento', 510610, 13, 11609, 2.1, 'livramentense', 5540.737);
INSERT INTO tb_cidades VALUES (2348, 'Nova Brasil�ndia', 510620, 13, 4587, 1.4, 'brasilandense', 3281.885);
INSERT INTO tb_cidades VALUES (2349, 'Nova Cana� Do Norte', 510621, 13, 12127, 2.03, 'canaense', 5966.193);
INSERT INTO tb_cidades VALUES (2351, 'Nova Lacerda', 510618, 13, 5436, 1.15, 'novo-lacerdenses', 4729.876);
INSERT INTO tb_cidades VALUES (2353, 'Nova Maring�', 510890, 13, 6590, 0.57, 'nova maringaense', 11557.344);
INSERT INTO tb_cidades VALUES (2355, 'Nova Mutum', 510622, 13, 31649, 3.31, 'mutuense', 9556.036);
INSERT INTO tb_cidades VALUES (2356, 'Nova Nazar�', 510617, 13, 3029, 0.75, 'nova-nazareenses', 4038.054);
INSERT INTO tb_cidades VALUES (2358, 'Nova Santa Helena', 510619, 13, 3468, 1.57, 'nova-santa-helenenses', 2205.057);
INSERT INTO tb_cidades VALUES (2360, 'Nova Xavantina', 510625, 13, 19643, 3.47, 'nova-xavantinense', 5667.912);
INSERT INTO tb_cidades VALUES (2362, 'Novo Mundo', 510626, 13, 7332, 1.27, 'novo-mundenses', 5790.26);
INSERT INTO tb_cidades VALUES (2363, 'Novo Santo Ant�nio', 510631, 13, 2005, 0.46, 'novo-santo-antoniense', 4393.789);
INSERT INTO tb_cidades VALUES (2365, 'Parana�ta', 510629, 13, 10684, 2.23, 'paranaitense', 4796.01);
INSERT INTO tb_cidades VALUES (2367, 'Pedra Preta', 510637, 13, 15755, 3.83, 'pedra-pretense', 4108.592);
INSERT INTO tb_cidades VALUES (2369, 'Planalto Da Serra', 510645, 13, 2726, 1.11, 'planaltenses-da-serra', 2455.431);
INSERT INTO tb_cidades VALUES (2370, 'Pocon�', 510650, 13, 31779, 1.84, 'poconeano', 17271.014);
INSERT INTO tb_cidades VALUES (2372, 'Ponte Branca', 510670, 13, 1768, 2.58, 'ponte-branquense', 685.98);
INSERT INTO tb_cidades VALUES (2374, 'Porto Alegre Do Norte', 510677, 13, 10748, 2.71, 'porto-alegrense', 3972.131);
INSERT INTO tb_cidades VALUES (2376, 'Porto Esperidi�o', 510682, 13, 11031, 1.9, 'portense', 5808.173);
INSERT INTO tb_cidades VALUES (2377, 'Porto Estrela', 510685, 13, 3649, 1.77, 'portoestrelense', 2062.757);
INSERT INTO tb_cidades VALUES (2379, 'Primavera Do Leste', 510704, 13, 52066, 9.52, 'primaverense', 5471.654);
INSERT INTO tb_cidades VALUES (2381, 'Reserva Do Caba�al', 510715, 13, 2572, 1.92, 'reservense', 1337.044);
INSERT INTO tb_cidades VALUES (2383, 'Ribeir�ozinho', 510719, 13, 2199, 3.52, 'ribeir�ozense', 625.58);
INSERT INTO tb_cidades VALUES (2384, 'Rio Branco', 510720, 13, 5070, 9.01, 'rio-branquense', 562.838);
INSERT INTO tb_cidades VALUES (2386, 'Rondon�polis', 510760, 13, 195476, 47, 'rondonopolitano', 4159.122);
INSERT INTO tb_cidades VALUES (2388, 'Salto Do C�u', 510775, 13, 3908, 2.23, 'saltense', 1752.336);
INSERT INTO tb_cidades VALUES (2389, 'Santa Carmem', 510724, 13, 4085, 1.06, 'santa-carmense ', 3855.365);
INSERT INTO tb_cidades VALUES (2391, 'Santa Rita Do Trivelato', 510776, 13, 2491, 0.53, 'trivelatenses', 4728.207);
INSERT INTO tb_cidades VALUES (2393, 'Santo Afonso', 510726, 13, 2991, 2.55, 'santo-afonsense ', 1174.191);
INSERT INTO tb_cidades VALUES (2395, 'Santo Ant�nio Do Leverger', 510780, 13, 18463, 1.57, 'santo-antoniense (papa ab�bora)', 11753.581);
INSERT INTO tb_cidades VALUES (2736, 'S�o Bentinho', 251392, 15, 4138, 21.12, 's�obentinhense', 195.964);
INSERT INTO tb_cidades VALUES (2399, 'S�o Jos� Do Xingu', 510735, 13, 5240, 0.7, 'S�o-xinguano', 7459.635);
INSERT INTO tb_cidades VALUES (2401, 'S�o Pedro Da Cipa', 510740, 13, 4158, 12.12, 'cipense', 342.969);
INSERT INTO tb_cidades VALUES (2402, 'Sapezal', 510787, 13, 18094, 1.33, 'sapezalense', 13624.249);
INSERT INTO tb_cidades VALUES (2403, 'Serra Nova Dourada', 510788, 13, 1365, 0.91, 'serra douradense', 1500.387);
INSERT INTO tb_cidades VALUES (2405, 'Sorriso', 510792, 13, 66521, 7.13, 'sorrisiense', 9329.554);
INSERT INTO tb_cidades VALUES (2407, 'Tangar� Da Serra', 510795, 13, 83431, 7.32, 'tangaraense', 11391.314);
INSERT INTO tb_cidades VALUES (2409, 'Terra Nova Do Norte', 510805, 13, 11291, 4.16, 'terra-novense', 2716.993);
INSERT INTO tb_cidades VALUES (2410, 'Tesouro', 510810, 13, 3418, 0.82, 'tesourense', 4169.564);
INSERT INTO tb_cidades VALUES (2412, 'Uni�o Do Sul', 510830, 13, 3760, 0.82, 'Uni�o-sulense', 4581.907);
INSERT INTO tb_cidades VALUES (2414, 'V�rzea Grande', 510840, 13, 252596, 284.45, 'v�rzea-grandense', 888.004);
INSERT INTO tb_cidades VALUES (2415, 'Vera', 510850, 13, 10235, 3.45, 'verense', 2963.49);
INSERT INTO tb_cidades VALUES (2417, 'Vila Rica', 510860, 13, 21382, 2.88, 'vila-riquense', 7431.064);
INSERT INTO tb_cidades VALUES (2419, 'Abel Figueiredo', 150013, 14, 6780, 11.04, 'abel-figueiredense', 614.269);
INSERT INTO tb_cidades VALUES (2421, 'Afu�', 150030, 14, 35042, 4.19, 'afuaense', 8372.759);
INSERT INTO tb_cidades VALUES (2422, '�gua Azul Do Norte', 150034, 14, 25057, 3.52, 'agua-azulense', 7113.941);
INSERT INTO tb_cidades VALUES (2424, 'Almeirim', 150050, 14, 33614, 0.46, 'almeiriense ', 72954.532);
INSERT INTO tb_cidades VALUES (2426, 'Anaj�s', 150070, 14, 24759, 3.58, 'anajaense', 6921.715);
INSERT INTO tb_cidades VALUES (2428, 'Anapu', 150085, 14, 20543, 1.73, 'anapuense', 11895.467);
INSERT INTO tb_cidades VALUES (2430, 'Aurora Do Par�', 150095, 14, 26546, 14.65, 'auroenses', 1811.82);
INSERT INTO tb_cidades VALUES (2431, 'Aveiro', 150100, 14, 15849, 0.93, 'aveirense', 17073.793);
INSERT INTO tb_cidades VALUES (2433, 'Bai�o', 150120, 14, 36882, 9.81, 'baionense', 3758.282);
INSERT INTO tb_cidades VALUES (2435, 'Barcarena', 150130, 14, 99859, 76.21, 'barcarenense', 1310.33);
INSERT INTO tb_cidades VALUES (2436, 'Bel�m', 150140, 14, 1393399, 1.315, 'belenense', 1059.402);
INSERT INTO tb_cidades VALUES (2438, 'Benevides', 150150, 14, 51651, 275, 'benevidense', 187.825);
INSERT INTO tb_cidades VALUES (2440, 'Bonito', 150160, 14, 13630, 23.23, 'bonitense', 586.734);
INSERT INTO tb_cidades VALUES (2442, 'Brasil Novo', 150172, 14, 15690, 2.47, 'brasil-novense', 6362.555);
INSERT INTO tb_cidades VALUES (2444, 'Breu Branco', 150178, 14, 52493, 13.32, 'breuense', 3941.913);
INSERT INTO tb_cidades VALUES (2445, 'Breves', 150180, 14, 92860, 9.72, 'brevense', 9550.474);
INSERT INTO tb_cidades VALUES (2447, 'Cachoeira Do Arari', 150200, 14, 20443, 6.59, 'cachoeirense', 3101.743);
INSERT INTO tb_cidades VALUES (2449, 'Camet�', 150210, 14, 120896, 39.23, 'cametaense', 3081.354);
INSERT INTO tb_cidades VALUES (2450, 'Cana� Dos Caraj�s', 150215, 14, 26716, 8.49, 'cana�nense', 3146.397);
INSERT INTO tb_cidades VALUES (2452, 'Capit�o Po�o', 150230, 14, 51893, 17.9, 'capit�o-pocense', 2899.54);
INSERT INTO tb_cidades VALUES (2454, 'Chaves', 150250, 14, 21005, 1.61, 'chaveense', 13084.897);
INSERT INTO tb_cidades VALUES (2456, 'Concei��o Do Araguaia', 150270, 14, 45557, 7.81, 'araguaiano ', 5829.466);
INSERT INTO tb_cidades VALUES (2457, 'Conc�rdia Do Par�', 150275, 14, 28216, 40.84, 'concordiense', 690.944);
INSERT INTO tb_cidades VALUES (2459, 'Curion�polis', 150277, 14, 18288, 7.72, 'curionopolense', 2368.735);
INSERT INTO tb_cidades VALUES (2461, 'Curu�', 150285, 14, 12254, 8.56, 'curuaense', 1431.15);
INSERT INTO tb_cidades VALUES (2463, 'Dom Eliseu', 150293, 14, 51319, 9.74, 'dom-eliseuense', 5268.794);
INSERT INTO tb_cidades VALUES (2465, 'Faro', 150300, 14, 8177, 0.69, 'farense', 11770.601);
INSERT INTO tb_cidades VALUES (2466, 'Floresta Do Araguaia', 150304, 14, 17768, 5.16, 'floresta-araguaiense', 3444.274);
INSERT INTO tb_cidades VALUES (2468, 'Goian�sia Do Par�', 150309, 14, 30436, 4.33, 'goianesiense ', 7023.884);
INSERT INTO tb_cidades VALUES (2469, 'Gurup�', 150310, 14, 29062, 3.4, 'gurupaense', 8540.103);
INSERT INTO tb_cidades VALUES (2471, 'Igarap� Miri', 150330, 14, 58077, 29.08, 'igarap�-miriense', 1996.835);
INSERT INTO tb_cidades VALUES (2473, 'Ipixuna Do Par�', 150345, 14, 51309, 9.84, 'ipixunense', 5215.533);
INSERT INTO tb_cidades VALUES (2475, 'Itaituba', 150360, 14, 97493, 1.57, 'itaitubense', 62040.111);
INSERT INTO tb_cidades VALUES (2476, 'Itupiranga', 150370, 14, 51220, 6.5, 'itupiranguense', 7880.08);
INSERT INTO tb_cidades VALUES (2478, 'Jacund�', 150380, 14, 51360, 25.57, 'jacundaense', 2008.308);
INSERT INTO tb_cidades VALUES (2480, 'Limoeiro Do Ajuru', 150400, 14, 25021, 16.79, 'ajuruense', 1490.18);
INSERT INTO tb_cidades VALUES (2482, 'Magalh�es Barata', 150410, 14, 8115, 25.07, 'magalh�es-baratense', 323.735);
INSERT INTO tb_cidades VALUES (2484, 'Maracan�', 150430, 14, 28376, 33.1, 'maracanaense', 857.188);
INSERT INTO tb_cidades VALUES (2485, 'Marapanim', 150440, 14, 26605, 33.42, 'marapaniense', 795.983);
INSERT INTO tb_cidades VALUES (2487, 'Medicil�ndia', 150445, 14, 27328, 3.3, 'medicilandense', 8272.604);
INSERT INTO tb_cidades VALUES (2489, 'Mocajuba', 150460, 14, 26731, 30.7, 'mocajubense', 870.806);
INSERT INTO tb_cidades VALUES (2491, 'Monte Alegre', 150480, 14, 55462, 3.06, 'montalegrense ', 18152.508);
INSERT INTO tb_cidades VALUES (2492, 'Muan�', 150490, 14, 34204, 9.08, 'muanaense', 3765.534);
INSERT INTO tb_cidades VALUES (2494, 'Nova Ipixuna', 150497, 14, 14645, 9.36, 'nova-ipixunense', 1564.178);
INSERT INTO tb_cidades VALUES (2496, 'Novo Progresso', 150503, 14, 25124, 0.66, 'progressense', 38162.371);
INSERT INTO tb_cidades VALUES (2498, '�bidos', 150510, 14, 49333, 1.76, 'obidense ', 28021.339);
INSERT INTO tb_cidades VALUES (2499, 'Oeiras Do Par�', 150520, 14, 28595, 7.42, 'oeirense', 3852.275);
INSERT INTO tb_cidades VALUES (2501, 'Our�m', 150540, 14, 16311, 29, 'ouremense', 562.385);
INSERT INTO tb_cidades VALUES (2503, 'Pacaj�', 150548, 14, 39979, 3.38, 'pacajaense', 11832.261);
INSERT INTO tb_cidades VALUES (2504, 'Palestina Do Par�', 150549, 14, 7475, 7.59, 'palestinenses', 984.359);
INSERT INTO tb_cidades VALUES (2506, 'Parauapebas', 150553, 14, 153908, 22.12, 'parauapebense', 6957.318);
INSERT INTO tb_cidades VALUES (2508, 'Peixe Boi', 150560, 14, 7854, 17.4, 'peixe-boiense', 451.337);
INSERT INTO tb_cidades VALUES (2509, 'Pi�arra', 150563, 14, 12697, 3.83, 'Pi�arrense', 3312.65);
INSERT INTO tb_cidades VALUES (2511, 'Ponta De Pedras', 150570, 14, 25999, 7.73, 'ponta-pedrense', 3365.133);
INSERT INTO tb_cidades VALUES (2513, 'Porto De Moz', 150590, 14, 33956, 1.95, 'porto-mozense', 17423.225);
INSERT INTO tb_cidades VALUES (2515, 'Primavera', 150610, 14, 10268, 39.71, 'primaverense', 258.599);
INSERT INTO tb_cidades VALUES (2517, 'Reden��o', 150613, 14, 75556, 19.76, 'redencense', 3823.799);
INSERT INTO tb_cidades VALUES (2518, 'Rio Maria', 150616, 14, 17697, 4.3, 'rio-mariense', 4114.598);
INSERT INTO tb_cidades VALUES (2520, 'Rur�polis', 150619, 14, 40087, 5.71, 'ruropolense', 7021.305);
INSERT INTO tb_cidades VALUES (2522, 'Salvaterra', 150630, 14, 20183, 19.42, 'salvaterrense', 1039.068);
INSERT INTO tb_cidades VALUES (2872, 'Jaqueira', 260795, 16, 11501, 131.88, 'jaqueirense', 87.208);
INSERT INTO tb_cidades VALUES (2526, 'Santa Luzia Do Par�', 150655, 14, 19424, 14.32, 'santaluziense ', 1356.118);
INSERT INTO tb_cidades VALUES (2527, 'Santa Maria Das Barreiras', 150658, 14, 17206, 1.67, 'barreirense', 10330.19);
INSERT INTO tb_cidades VALUES (2529, 'Santana Do Araguaia', 150670, 14, 56153, 4.84, 'araguaiense ', 11591.538);
INSERT INTO tb_cidades VALUES (2530, 'Santar�m', 150680, 14, 294580, 12.87, 'santareno ', 22886.761);
INSERT INTO tb_cidades VALUES (2532, 'Santo Ant�nio Do Tau�', 150700, 14, 26674, 49.61, 'tauaense', 537.623);
INSERT INTO tb_cidades VALUES (2534, 'S�o Domingos Do Araguaia', 150715, 14, 23130, 16.61, 's�o dominguense do araguaia', 1392.457);
INSERT INTO tb_cidades VALUES (2536, 'S�o F�lix Do Xingu', 150730, 14, 91340, 1.08, 'xinguense ', 84213.092);
INSERT INTO tb_cidades VALUES (2537, 'S�o Francisco Do Par�', 150740, 14, 15060, 31.4, 'franciscano', 479.572);
INSERT INTO tb_cidades VALUES (2539, 'S�o Jo�o Da Ponta', 150746, 14, 5265, 26.87, 's�o jo�o pontense ', 195.917);
INSERT INTO tb_cidades VALUES (2541, 'S�o Jo�o Do Araguaia', 150750, 14, 13155, 10.28, 's�o-joanense', 1279.887);
INSERT INTO tb_cidades VALUES (2542, 'S�o Miguel Do Guam�', 150760, 14, 51567, 46.45, 'guamaense', 1110.168);
INSERT INTO tb_cidades VALUES (2544, 'Sapucaia', 150775, 14, 5047, 3.89, 'sapucaiense', 1298.186);
INSERT INTO tb_cidades VALUES (2545, 'Senador Jos� Porf�rio', 150780, 14, 13045, 0.91, 'porfiriense', 14374.229);
INSERT INTO tb_cidades VALUES (2547, 'Tail�ndia', 150795, 14, 79297, 17.9, 'tailandense', 4430.203);
INSERT INTO tb_cidades VALUES (2549, 'Terra Santa', 150797, 14, 16949, 8.94, 'terrasantense', 1896.501);
INSERT INTO tb_cidades VALUES (2550, 'Tom� A�u', 150800, 14, 56518, 10.98, 'tom�-a�uense', 5145.338);
INSERT INTO tb_cidades VALUES (2552, 'Trair�o', 150805, 14, 16875, 1.41, 'trairense', 11991.063);
INSERT INTO tb_cidades VALUES (2554, 'Tucuru�', 150810, 14, 97128, 46.56, 'tucuruiense', 2086.196);
INSERT INTO tb_cidades VALUES (2556, 'Uruar�', 150815, 14, 44789, 4.15, 'uruaraense', 10791.341);
INSERT INTO tb_cidades VALUES (2557, 'Vigia', 150820, 14, 47889, 88.84, 'vigiense ', 539.077);
INSERT INTO tb_cidades VALUES (2559, 'Vit�ria Do Xingu', 150835, 14, 13431, 4.28, 'vitoriense', 3135.168);
INSERT INTO tb_cidades VALUES (2561, '�gua Branca', 250010, 15, 9449, 39.94, 'agua branquense', 236.607);
INSERT INTO tb_cidades VALUES (2563, 'Alagoa Grande', 250030, 15, 28479, 88.84, 'alagoa-grandense', 320.561);
INSERT INTO tb_cidades VALUES (2565, 'Alagoinha', 250050, 15, 13576, 139.99, 'alagoinhense', 96.979);
INSERT INTO tb_cidades VALUES (2567, 'Algod�o De Janda�ra', 250057, 15, 2366, 10.74, 'algodoense', 220.248);
INSERT INTO tb_cidades VALUES (2568, 'Alhandra', 250060, 15, 18007, 98.58, 'alhandrense', 182.663);
INSERT INTO tb_cidades VALUES (2570, 'Aparecida', 250077, 15, 7676, 25.96, 'aparecidense', 295.704);
INSERT INTO tb_cidades VALUES (2572, 'Arara', 250090, 15, 12653, 127.66, 'araraense ', 99.111);
INSERT INTO tb_cidades VALUES (2574, 'Areia', 250110, 15, 23829, 88.42, 'areiense', 269.492);
INSERT INTO tb_cidades VALUES (2576, 'Areial', 250120, 15, 6470, 195.22, 'areialense', 33.142);
INSERT INTO tb_cidades VALUES (2577, 'Aroeiras', 250130, 15, 19082, 50.93, 'aroeirense', 374.694);
INSERT INTO tb_cidades VALUES (2579, 'Ba�a Da Trai��o', 250140, 15, 8012, 78.27, 'baianense ', 102.368);
INSERT INTO tb_cidades VALUES (2581, 'Bara�na', 250153, 15, 4220, 83.43, 'baraunense', 50.581);
INSERT INTO tb_cidades VALUES (2583, 'Barra De Santana', 250157, 15, 8206, 21.77, 'barrasantense', 376.91);
INSERT INTO tb_cidades VALUES (2584, 'Barra De S�o Miguel', 250170, 15, 5611, 9.43, 'barrense', 595.208);
INSERT INTO tb_cidades VALUES (2586, 'Bel�m', 250190, 15, 17093, 170.67, 'belenense ', 100.153);
INSERT INTO tb_cidades VALUES (2588, 'Bernardino Batista', 250205, 15, 3075, 60.74, 'batistense', 50.628);
INSERT INTO tb_cidades VALUES (2589, 'Boa Ventura', 250210, 15, 5751, 33.71, 'boa-venturense', 170.579);
INSERT INTO tb_cidades VALUES (2591, 'Bom Jesus', 250220, 15, 2400, 50.39, 'bom-jesuense', 47.631);
INSERT INTO tb_cidades VALUES (2593, 'Bonito De Santa F�', 250240, 15, 10804, 47.32, 'bonitense', 228.325);
INSERT INTO tb_cidades VALUES (2595, 'Borborema', 250270, 15, 5111, 196.74, 'borboremense ', 25.979);
INSERT INTO tb_cidades VALUES (2596, 'Brejo Do Cruz', 250280, 15, 13123, 32.9, 'brejo-cruzense ', 398.918);
INSERT INTO tb_cidades VALUES (2598, 'Caapor�', 250300, 15, 20362, 135.6, 'caapor�ense', 150.167);
INSERT INTO tb_cidades VALUES (2600, 'Cabedelo', 250320, 15, 57944, 1.815, 'cabedelense', 31.915);
INSERT INTO tb_cidades VALUES (2602, 'Cacimba De Areia', 250340, 15, 3557, 16.14, 'cacimbense (de Areia) ', 220.379);
INSERT INTO tb_cidades VALUES (2603, 'Cacimba De Dentro', 250350, 15, 16748, 102.32, 'cacimbense (de Dentro)', 163.686);
INSERT INTO tb_cidades VALUES (2605, 'Cai�ara', 250360, 15, 7220, 56.44, 'cai�arense', 127.913);
INSERT INTO tb_cidades VALUES (2607, 'Cajazeirinhas', 250375, 15, 3033, 10.54, 'cajazeirinhense', 287.893);
INSERT INTO tb_cidades VALUES (2609, 'Camala�', 250390, 15, 5749, 10.57, 'camalauense', 543.685);
INSERT INTO tb_cidades VALUES (2610, 'Campina Grande', 250400, 15, 385213, 648.31, 'campinense', 594.179);
INSERT INTO tb_cidades VALUES (2612, 'Cara�bas', 250407, 15, 3899, 7.84, 'cara�bense', 497.202);
INSERT INTO tb_cidades VALUES (2614, 'Casserengue', 250415, 15, 7058, 35.05, 'cassereguense', 201.38);
INSERT INTO tb_cidades VALUES (2616, 'Catol� Do Rocha', 250430, 15, 28759, 52.09, 'catoleense', 552.108);
INSERT INTO tb_cidades VALUES (2617, 'Caturit�', 250435, 15, 4543, 38.47, 'caturiteense', 118.08);
INSERT INTO tb_cidades VALUES (2619, 'Condado', 250450, 15, 6584, 23.44, 'condadense', 280.915);
INSERT INTO tb_cidades VALUES (2621, 'Congo', 250470, 15, 4687, 14.06, 'congoense', 333.469);
INSERT INTO tb_cidades VALUES (2623, 'Coxixola', 250485, 15, 1771, 10.43, 'coxixolense', 169.877);
INSERT INTO tb_cidades VALUES (2625, 'Cubati', 250500, 15, 6866, 50.13, 'cubatiense', 136.966);
INSERT INTO tb_cidades VALUES (2626, 'Cuit�', 250510, 15, 19978, 26.93, 'cuiteense', 741.835);
INSERT INTO tb_cidades VALUES (2628, 'Cuitegi', 250520, 15, 6889, 175.29, 'cuitegiense', 39.301);
INSERT INTO tb_cidades VALUES (2630, 'Curral Velho', 250530, 15, 2505, 11.24, 'curral-velhense', 222.956);
INSERT INTO tb_cidades VALUES (2631, 'Dami�o', 250535, 15, 4900, 26.39, 'dami�oense', 185.684);
INSERT INTO tb_cidades VALUES (2633, 'Diamante', 250560, 15, 6616, 24.58, 'diamantense', 269.11);
INSERT INTO tb_cidades VALUES (2634, 'Dona In�s', 250570, 15, 10517, 63.29, 'inesense', 166.169);
INSERT INTO tb_cidades VALUES (2636, 'Emas', 250590, 15, 3317, 13.77, 'emense', 240.899);
INSERT INTO tb_cidades VALUES (2638, 'Fagundes', 250610, 15, 11405, 60.34, 'fagundense', 189.025);
INSERT INTO tb_cidades VALUES (2640, 'Gado Bravo', 250625, 15, 8376, 43.53, 'gadobravense', 192.405);
INSERT INTO tb_cidades VALUES (2641, 'Guarabira', 250630, 15, 55326, 333.81, 'guarabirense', 165.743);
INSERT INTO tb_cidades VALUES (2643, 'Gurj�o', 250650, 15, 3159, 9.2, 'gurjaense', 343.196);
INSERT INTO tb_cidades VALUES (2645, 'Igaracy', 250260, 15, 6156, 32.02, 'igaraciense', 192.259);
INSERT INTO tb_cidades VALUES (2647, 'Ing�', 250680, 15, 18180, 63.13, 'ingaense', 287.99);
INSERT INTO tb_cidades VALUES (2648, 'Itabaiana', 250690, 15, 24481, 111.86, 'itabaianense', 218.847);
INSERT INTO tb_cidades VALUES (2714, 'Puxinan�', 251240, 15, 12923, 177.81, 'puxinanaense', 72.68);
INSERT INTO tb_cidades VALUES (2715, 'Queimadas', 251250, 15, 41049, 102.17, 'queimadense', 401.774);
INSERT INTO tb_cidades VALUES (2717, 'Rem�gio', 251270, 15, 17581, 98.77, 'remigioense ', 177.998);
INSERT INTO tb_cidades VALUES (2719, 'Riach�o Do Bacamarte', 251275, 15, 4264, 111.13, 'riachonense', 38.369);
INSERT INTO tb_cidades VALUES (2720, 'Riach�o Do Po�o', 251276, 15, 4164, 104.35, 'riach�oense', 39.905);
INSERT INTO tb_cidades VALUES (2722, 'Riacho Dos Cavalos', 251280, 15, 8314, 31.49, 'riachoense', 264.023);
INSERT INTO tb_cidades VALUES (2723, 'Rio Tinto', 251290, 15, 22976, 49.42, 'rio-tintense', 464.883);
INSERT INTO tb_cidades VALUES (2725, 'Salgado De S�o F�lix', 251310, 15, 11976, 59.33, 'salgadense', 201.852);
INSERT INTO tb_cidades VALUES (2727, 'Santa Cruz', 251320, 15, 6471, 30.79, 'santa-cruzense', 210.164);
INSERT INTO tb_cidades VALUES (2729, 'Santa In�s', 251335, 15, 3539, 10.91, 'santineense', 324.423);
INSERT INTO tb_cidades VALUES (2730, 'Santa Luzia', 251340, 15, 14719, 32.3, 'santa-luziense', 455.7);
INSERT INTO tb_cidades VALUES (2732, 'Santa Teresinha', 251380, 15, 4581, 12.8, 'santa-teresinhense', 357.951);
INSERT INTO tb_cidades VALUES (2734, 'Santana Dos Garrotes', 251360, 15, 7266, 20.54, 'santana-garrotense', 353.813);
INSERT INTO tb_cidades VALUES (2735, 'Santo Andr�', 251385, 15, 2638, 11.72, 'santoandreense', 225.167);
INSERT INTO tb_cidades VALUES (2737, 'S�o Bento', 251390, 15, 30879, 124.41, 's�o-bentense ', 248.199);
INSERT INTO tb_cidades VALUES (2739, 'S�o Domingos Do Cariri', 251394, 15, 2420, 11.06, 's�odominguense', 218.8);
INSERT INTO tb_cidades VALUES (2740, 'S�o Francisco', 251398, 15, 3364, 35.39, 'francisquense', 95.055);
INSERT INTO tb_cidades VALUES (2742, 'S�o Jo�o Do Rio Do Peixe', 250070, 15, 18201, 38.36, 's�o-joanense', 474.428);
INSERT INTO tb_cidades VALUES (2743, 'S�o Jo�o Do Tigre', 251410, 15, 4396, 5.39, 's�o-jo�o-tigrense', 816.111);
INSERT INTO tb_cidades VALUES (2745, 'S�o Jos� De Caiana', 251430, 15, 6010, 34.08, 'caianense', 176.326);
INSERT INTO tb_cidades VALUES (2747, 'S�o Jos� De Piranhas', 251450, 15, 19096, 28.19, 'piranhense', 677.301);
INSERT INTO tb_cidades VALUES (2748, 'S�o Jos� De Princesa', 251455, 15, 4219, 26.7, 's�ojoseense', 158.023);
INSERT INTO tb_cidades VALUES (2750, 'S�o Jos� Do Brejo Do Cruz', 251465, 15, 1684, 6.66, 's�ojoseense', 253.018);
INSERT INTO tb_cidades VALUES (2751, 'S�o Jos� Do Sabugi', 251470, 15, 4010, 19.38, 'sabugiense', 206.914);
INSERT INTO tb_cidades VALUES (2753, 'S�o Jos� Dos Ramos', 251445, 15, 5508, 56.07, 'sanjoseense', 98.231);
INSERT INTO tb_cidades VALUES (2754, 'S�o Mamede', 251490, 15, 7748, 14.6, 's�o-mamedense', 530.725);
INSERT INTO tb_cidades VALUES (2756, 'S�o Sebasti�o De Lagoa De Ro�a', 251510, 15, 11041, 221.16, 'lagoense (de Ro�a)', 49.923);
INSERT INTO tb_cidades VALUES (2758, 'Sap�', 251530, 15, 50143, 158.92, 'sapeense', 315.531);
INSERT INTO tb_cidades VALUES (2652, 'Jacara�', 250730, 15, 13942, 55.1, 'jacarauense', 253.008);
INSERT INTO tb_cidades VALUES (2654, 'Jo�o Pessoa', 250750, 15, 723515, 3.421, 'pessoense', 211.474);
INSERT INTO tb_cidades VALUES (2656, 'Juarez T�vora', 250760, 15, 7459, 105.29, 'tavorense', 70.841);
INSERT INTO tb_cidades VALUES (2657, 'Juazeirinho', 250770, 15, 16776, 35.88, 'juazeirinhense', 467.523);
INSERT INTO tb_cidades VALUES (2659, 'Juripiranga', 250790, 15, 10237, 129.84, 'juripiranguense', 78.845);
INSERT INTO tb_cidades VALUES (2660, 'Juru', 250800, 15, 9826, 24.37, 'juruense', 403.277);
INSERT INTO tb_cidades VALUES (2662, 'Lagoa De Dentro', 250820, 15, 7370, 87.21, 'lagoa-dentrense', 84.508);
INSERT INTO tb_cidades VALUES (2664, 'Lastro', 250840, 15, 2841, 27.67, 'lastrense', 102.669);
INSERT INTO tb_cidades VALUES (2666, 'Logradouro', 250855, 15, 3942, 103.75, 'logradourense', 37.996);
INSERT INTO tb_cidades VALUES (2668, 'M�e D`�gua', 250870, 15, 4019, 16.49, 'm�e-daguense', 243.753);
INSERT INTO tb_cidades VALUES (2669, 'Malta', 250880, 15, 5613, 35.93, 'maltense ', 156.241);
INSERT INTO tb_cidades VALUES (2671, 'Mana�ra', 250900, 15, 10759, 30.52, 'manairense', 352.568);
INSERT INTO tb_cidades VALUES (2673, 'Mari', 250910, 15, 21176, 136.78, 'mariense', 154.822);
INSERT INTO tb_cidades VALUES (2675, 'Massaranduba', 250920, 15, 12902, 62.64, 'massarandubense', 205.956);
INSERT INTO tb_cidades VALUES (2676, 'Mataraca', 250930, 15, 7407, 40.19, 'mataraquense', 184.298);
INSERT INTO tb_cidades VALUES (2678, 'Mato Grosso', 250937, 15, 2702, 32.35, 'matogrossense', 83.522);
INSERT INTO tb_cidades VALUES (2680, 'Mogeiro', 250940, 15, 12491, 64.41, 'mogeirense', 193.943);
INSERT INTO tb_cidades VALUES (2682, 'Monte Horebe', 250960, 15, 4508, 38.8, 'horebense', 116.172);
INSERT INTO tb_cidades VALUES (2683, 'Monteiro', 250970, 15, 30852, 31.28, 'monteirense', 986.351);
INSERT INTO tb_cidades VALUES (2685, 'Natuba', 250990, 15, 10566, 51.53, 'natubense', 205.041);
INSERT INTO tb_cidades VALUES (2687, 'Nova Floresta', 251010, 15, 10533, 222.31, 'nova-florestense', 47.379);
INSERT INTO tb_cidades VALUES (2689, 'Nova Palmeira', 251030, 15, 4361, 14.05, 'nova-palmeirense', 310.35);
INSERT INTO tb_cidades VALUES (2691, 'Olivedos', 251050, 15, 3627, 11.41, 'olivedense', 317.913);
INSERT INTO tb_cidades VALUES (2693, 'Parari', 251065, 15, 1256, 9.78, 'parariense', 128.484);
INSERT INTO tb_cidades VALUES (2694, 'Passagem', 251070, 15, 2233, 19.96, 'passagense', 111.875);
INSERT INTO tb_cidades VALUES (2696, 'Paulista', 251090, 15, 11788, 20.43, 'paulistense ', 576.897);
INSERT INTO tb_cidades VALUES (2698, 'Pedra Lavrada', 251110, 15, 7475, 21.26, 'pedra-lavradense', 351.678);
INSERT INTO tb_cidades VALUES (2700, 'Pedro R�gis', 251272, 15, 5765, 78.37, 'pedroregense', 73.559);
INSERT INTO tb_cidades VALUES (2701, 'Pianc�', 251130, 15, 15465, 27.38, 'piancoense', 564.732);
INSERT INTO tb_cidades VALUES (2703, 'Pilar', 251150, 15, 11191, 109.29, 'pilarense ', 102.398);
INSERT INTO tb_cidades VALUES (2705, 'Pil�ezinhos', 251170, 15, 5155, 117.42, 'pil�ezinhense', 43.901);
INSERT INTO tb_cidades VALUES (2707, 'Pitimbu', 251190, 15, 17024, 124.78, 'pitimbuense', 136.434);
INSERT INTO tb_cidades VALUES (2708, 'Pocinhos', 251200, 15, 17032, 27.12, 'pocinhense', 628.08);
INSERT INTO tb_cidades VALUES (2710, 'Po�o De Jos� De Moura', 251207, 15, 3978, 39.4, 'pocense', 100.971);
INSERT INTO tb_cidades VALUES (2712, 'Prata', 251220, 15, 3854, 20.07, 'prataense', 192.01);
INSERT INTO tb_cidades VALUES (2759, 'Serid�', 251540, 15, 10230, 37, 'seridoense', 276.47);
INSERT INTO tb_cidades VALUES (2761, 'Serra Da Raiz', 251560, 15, 3204, 110.17, 'serra-raizense ', 29.082);
INSERT INTO tb_cidades VALUES (2762, 'Serra Grande', 251570, 15, 2975, 35.64, 'serra-grandense', 83.474);
INSERT INTO tb_cidades VALUES (2764, 'Serraria', 251590, 15, 6238, 95.53, 'serrariense', 65.299);
INSERT INTO tb_cidades VALUES (2766, 'Sobrado', 251597, 15, 7373, 119.42, 'sobradense', 61.742);
INSERT INTO tb_cidades VALUES (2767, 'Sol�nea', 251600, 15, 26693, 115.01, 'solanense', 232.094);
INSERT INTO tb_cidades VALUES (2769, 'Soss�go', 251615, 15, 3169, 20.48, 'sosseguense', 154.747);
INSERT INTO tb_cidades VALUES (2771, 'Sum�', 251630, 15, 16060, 19.16, 'sumeense', 838.066);
INSERT INTO tb_cidades VALUES (2773, 'Tapero�', 251650, 15, 14936, 22.53, 'taperoaense', 662.904);
INSERT INTO tb_cidades VALUES (2774, 'Tavares', 251660, 15, 14103, 59.42, 'tavarense', 237.329);
INSERT INTO tb_cidades VALUES (2777, 'Triunfo', 251680, 15, 9220, 41.93, 'triunfense', 219.865);
INSERT INTO tb_cidades VALUES (2779, 'Umbuzeiro', 251700, 15, 9298, 51.28, 'umbuzeirense', 181.326);
INSERT INTO tb_cidades VALUES (2780, 'V�rzea', 251710, 15, 2504, 13.15, 'varzense', 190.446);
INSERT INTO tb_cidades VALUES (2782, 'Vista Serrana', 250550, 15, 3512, 57.24, 'vista-serranense', 61.361);
INSERT INTO tb_cidades VALUES (2784, 'Abreu E Lima', 260005, 16, 94429, 724.9, 'abreu-limense', 130.265);
INSERT INTO tb_cidades VALUES (2786, 'Afr�nio', 260020, 16, 17586, 11.8, 'afraniense', 1490.589);
INSERT INTO tb_cidades VALUES (2787, 'Agrestina', 260030, 16, 22679, 112.58, 'agrestinense', 201.445);
INSERT INTO tb_cidades VALUES (2789, '�guas Belas', 260050, 16, 40235, 45.41, '�guas-belense', 885.982);
INSERT INTO tb_cidades VALUES (2791, 'Alian�a', 260070, 16, 37415, 137.16, 'aliancense', 272.788);
INSERT INTO tb_cidades VALUES (2793, 'Amaraji', 260090, 16, 21939, 93.38, 'amarajinense ', 234.955);
INSERT INTO tb_cidades VALUES (2794, 'Angelim', 260100, 16, 10202, 86.43, 'angelinense', 118.036);
INSERT INTO tb_cidades VALUES (2796, 'Araripina', 260110, 16, 77302, 40.84, 'araripinense', 1892.588);
INSERT INTO tb_cidades VALUES (2798, 'Barra De Guabiraba', 260130, 16, 12776, 111.44, 'guabirabense', 114.649);
INSERT INTO tb_cidades VALUES (2800, 'Bel�m De Maria', 260150, 16, 11353, 153.96, 'belenense', 73.741);
INSERT INTO tb_cidades VALUES (2802, 'Belo Jardim', 260170, 16, 72432, 111.83, 'belo-jardinense', 647.694);
INSERT INTO tb_cidades VALUES (2803, 'Bet�nia', 260180, 16, 12003, 9.65, 'betaniense', 1244.067);
INSERT INTO tb_cidades VALUES (2805, 'Bodoc�', 260200, 16, 35158, 21.75, 'bodocense ', 1616.494);
INSERT INTO tb_cidades VALUES (2807, 'Bom Jardim', 260220, 16, 37826, 173.17, 'bom-jardinense', 218.432);
INSERT INTO tb_cidades VALUES (2808, 'Bonito', 260230, 16, 37566, 94.96, 'bonitense', 395.611);
INSERT INTO tb_cidades VALUES (2810, 'Brejinho', 260250, 16, 7307, 68.76, 'brejinhense', 106.275);
INSERT INTO tb_cidades VALUES (2812, 'Buenos Aires', 260270, 16, 12537, 134.54, 'buenairense', 93.187);
INSERT INTO tb_cidades VALUES (2813, 'Bu�que', 260280, 16, 52105, 38.66, 'buiquense', 1347.648);
INSERT INTO tb_cidades VALUES (2815, 'Cabrob�', 260300, 16, 30873, 18.62, 'cabroboense ', 1657.937);
INSERT INTO tb_cidades VALUES (2817, 'Caet�s', 260320, 16, 26577, 80.66, 'caeteense', 329.475);
INSERT INTO tb_cidades VALUES (2818, 'Cal�ado', 260330, 16, 11125, 91.23, 'cal�adense', 121.947);
INSERT INTO tb_cidades VALUES (2820, 'Camaragibe', 260345, 16, 144466, 2.821, 'camaragibense', 51.194);
INSERT INTO tb_cidades VALUES (2822, 'Camutanga', 260360, 16, 8156, 217.39, 'camutanguense', 37.518);
INSERT INTO tb_cidades VALUES (2823, 'Canhotinho', 260370, 16, 24521, 57.96, 'canhotinhense', 423.08);
INSERT INTO tb_cidades VALUES (2825, 'Carna�ba', 260390, 16, 18574, 43.42, 'carnaibano ', 427.8);
INSERT INTO tb_cidades VALUES (2827, 'Carpina', 260400, 16, 74858, 516.51, 'carpinense', 144.93);
INSERT INTO tb_cidades VALUES (2828, 'Caruaru', 260410, 16, 314912, 342.07, 'caruaruense ', 920.606);
INSERT INTO tb_cidades VALUES (2830, 'Catende', 260420, 16, 37820, 182.49, 'catendense', 207.243);
INSERT INTO tb_cidades VALUES (2832, 'Ch� De Alegria', 260440, 16, 12404, 255.98, 'alegriense', 48.456);
INSERT INTO tb_cidades VALUES (2834, 'Condado', 260460, 16, 24282, 270.87, 'condadense', 89.644);
INSERT INTO tb_cidades VALUES (2836, 'Cort�s', 260480, 16, 12452, 122.9, 'cortesense', 101.315);
INSERT INTO tb_cidades VALUES (2837, 'Cumaru', 260490, 16, 17183, 58.8, 'cumaruense', 292.23);
INSERT INTO tb_cidades VALUES (2839, 'Cust�dia', 260510, 16, 33855, 24.11, 'custodiense', 1404.125);
INSERT INTO tb_cidades VALUES (2841, 'Escada', 260520, 16, 63517, 183.07, 'escadense', 346.957);
INSERT INTO tb_cidades VALUES (2843, 'Feira Nova', 260540, 16, 20571, 190.96, 'feira-novense', 107.725);
INSERT INTO tb_cidades VALUES (2845, 'Ferreiros', 260550, 16, 11430, 127.93, 'ferreirense', 89.348);
INSERT INTO tb_cidades VALUES (2846, 'Flores', 260560, 16, 22169, 22.27, 'florense', 995.553);
INSERT INTO tb_cidades VALUES (2848, 'Frei Miguelinho', 260580, 16, 14293, 67.2, 'frei-miguelinhense', 212.706);
INSERT INTO tb_cidades VALUES (2850, 'Garanhuns', 260600, 16, 129408, 282.21, 'garanhuense', 458.55);
INSERT INTO tb_cidades VALUES (2852, 'Goiana', 260620, 16, 75644, 150.72, 'goianense', 501.881);
INSERT INTO tb_cidades VALUES (2853, 'Granito', 260630, 16, 6855, 13.13, 'granitense', 521.94);
INSERT INTO tb_cidades VALUES (2855, 'Iati', 260650, 16, 18360, 28.91, 'iatiense', 635.133);
INSERT INTO tb_cidades VALUES (2857, 'Ibirajuba', 260670, 16, 7534, 39.74, 'ibirajubense', 189.595);
INSERT INTO tb_cidades VALUES (2859, 'Iguaraci', 260690, 16, 11779, 14.05, 'iguaraciense', 838.127);
INSERT INTO tb_cidades VALUES (2861, 'Inaj�', 260700, 16, 19081, 16.14, 'inajaense ', 1182.545);
INSERT INTO tb_cidades VALUES (2862, 'Ingazeira', 260710, 16, 4496, 18.45, 'ingazeirense', 243.668);
INSERT INTO tb_cidades VALUES (2864, 'Ipubi', 260730, 16, 28120, 32.64, 'ipubiense', 861.415);
INSERT INTO tb_cidades VALUES (2866, 'Ita�ba', 260750, 16, 26256, 24.23, 'itaibense', 1083.718);
INSERT INTO tb_cidades VALUES (2868, 'Itapetim', 260770, 16, 13881, 34.29, 'itapetinense', 404.849);
INSERT INTO tb_cidades VALUES (2869, 'Itapissuma', 260775, 16, 23769, 320.19, 'itapissumense', 74.235);
INSERT INTO tb_cidades VALUES (2871, 'Jaboat�o Dos Guararapes', 260790, 16, 644620, 2.493, 'jaboat�oense', 258.566);
INSERT INTO tb_cidades VALUES (2873, 'Jata�ba', 260800, 16, 15819, 23.53, 'jataubense', 672.179);
INSERT INTO tb_cidades VALUES (2875, 'Jo�o Alfredo', 260810, 16, 30743, 222.34, 'alfredense', 138.269);
INSERT INTO tb_cidades VALUES (2877, 'Jucati', 260825, 16, 10604, 87.92, 'jucatiense', 120.603);
INSERT INTO tb_cidades VALUES (2878, 'Jupi', 260830, 16, 13705, 130.54, 'jupiense', 104.99);
INSERT INTO tb_cidades VALUES (2880, 'Lagoa Do Carro', 260845, 16, 16007, 229.77, 'lagoense do carro', 69.665);
INSERT INTO tb_cidades VALUES (2882, 'Lagoa Do Ouro', 260860, 16, 12132, 61.04, 'lagoa-do-ourense', 198.76);
INSERT INTO tb_cidades VALUES (2884, 'Lagoa Grande', 260875, 16, 22760, 12.29, 'lagoa-grandense', 1852.34);
INSERT INTO tb_cidades VALUES (2885, 'Lajedo', 260880, 16, 36628, 193.7, 'lajedense', 189.095);
INSERT INTO tb_cidades VALUES (2887, 'Macaparana', 260900, 16, 23925, 221.43, 'macaparanense ', 108.048);
INSERT INTO tb_cidades VALUES (2889, 'Manari', 260915, 16, 18083, 47.43, 'manariense', 381.275);
INSERT INTO tb_cidades VALUES (2891, 'Mirandiba', 260930, 16, 14308, 17.41, 'mirandibense', 821.672);
INSERT INTO tb_cidades VALUES (2893, 'Moreno', 260940, 16, 56696, 289.16, 'morenense', 196.071);
INSERT INTO tb_cidades VALUES (2894, 'Nazar� Da Mata', 260950, 16, 30796, 204.95, 'nazareno', 150.263);
INSERT INTO tb_cidades VALUES (2896, 'Orob�', 260970, 16, 22878, 164.99, 'orobense ', 138.661);
INSERT INTO tb_cidades VALUES (2898, 'Ouricuri', 260990, 16, 64358, 26.56, 'ouricuriense ', 2422.882);
INSERT INTO tb_cidades VALUES (2899, 'Palmares', 261000, 16, 59526, 175.44, 'palmarense', 339.29);
INSERT INTO tb_cidades VALUES (2901, 'Panelas', 261020, 16, 25645, 69.14, 'panelense', 370.938);
INSERT INTO tb_cidades VALUES (2903, 'Parnamirim', 261040, 16, 20224, 7.79, 'parnamirinense ', 2595.917);
INSERT INTO tb_cidades VALUES (2905, 'Paudalho', 261060, 16, 51357, 185.07, 'paudalhense', 277.507);
INSERT INTO tb_cidades VALUES (5414, 'Valpara�so', 355630, 26, 22576, 26.33, 'valparaisense', 857.505);
INSERT INTO tb_cidades VALUES (2908, 'Pesqueira', 261090, 16, 62931, 63.21, 'pesqueirense', 995.531);
INSERT INTO tb_cidades VALUES (2909, 'Petrol�ndia', 261100, 16, 32492, 30.75, 'petrolandense', 1056.59);
INSERT INTO tb_cidades VALUES (2911, 'Po��o', 261120, 16, 11242, 45.56, 'po��oense', 246.747);
INSERT INTO tb_cidades VALUES (2913, 'Primavera', 261140, 16, 13439, 121.97, 'primaverense', 110.185);
INSERT INTO tb_cidades VALUES (2915, 'Quixaba', 261153, 16, 6739, 31.98, 'quixabense', 210.704);
INSERT INTO tb_cidades VALUES (2916, 'Recife', 261160, 16, 1537704, 7.037, 'recifense', 218.498);
INSERT INTO tb_cidades VALUES (2918, 'Ribeir�o', 261180, 16, 44439, 154.36, 'ribeir�oense', 287.9);
INSERT INTO tb_cidades VALUES (2920, 'Sair�', 261200, 16, 11240, 58.85, 'saireense', 191.009);
INSERT INTO tb_cidades VALUES (2922, 'Salgueiro', 261220, 16, 56629, 33.57, 'salgueirense', 1686.805);
INSERT INTO tb_cidades VALUES (2923, 'Salo�', 261230, 16, 15309, 60.73, 'saloaense', 252.078);
INSERT INTO tb_cidades VALUES (2925, 'Santa Cruz', 261245, 16, 13594, 10.82, 'santacruzense', 1255.931);
INSERT INTO tb_cidades VALUES (2927, 'Santa Cruz Do Capibaribe', 261250, 16, 87582, 261.23, 'santa-cruzense', 335.271);
INSERT INTO tb_cidades VALUES (2929, 'Santa Maria Da Boa Vista', 261260, 16, 39435, 13.14, 'boa-vistense', 3001.165);
INSERT INTO tb_cidades VALUES (2930, 'Santa Maria Do Cambuc�', 261270, 16, 13021, 141.31, 'santa-mariense', 92.147);
INSERT INTO tb_cidades VALUES (2932, 'S�o Benedito Do Sul', 261290, 16, 13941, 86.87, 's�o-beneditense', 160.476);
INSERT INTO tb_cidades VALUES (2934, 'S�o Caitano', 261310, 16, 35274, 92.23, 's�o-caitanense', 382.463);
INSERT INTO tb_cidades VALUES (2935, 'S�o Jo�o', 261320, 16, 21312, 82.5, 's�o-joanense', 258.333);
INSERT INTO tb_cidades VALUES (2937, 'S�o Jos� Da Coroa Grande', 261340, 16, 18180, 262.19, 's�o-jos�-coroa-grandense', 69.338);
INSERT INTO tb_cidades VALUES (2939, 'S�o Jos� Do Egito', 261360, 16, 31829, 39.84, 'egipsiense', 798.873);
INSERT INTO tb_cidades VALUES (2941, 'S�o Vicente Ferrer', 261380, 16, 17000, 149.14, 's�o-vicentino', 113.984);
INSERT INTO tb_cidades VALUES (2942, 'Serra Talhada', 261390, 16, 79232, 26.59, 'serra-talhadense', 2979.991);
INSERT INTO tb_cidades VALUES (2944, 'Sert�nia', 261410, 16, 33787, 13.95, 'sertaniense', 2421.514);
INSERT INTO tb_cidades VALUES (2946, 'Solid�o', 261440, 16, 5744, 41.5, 'solidanense', 138.398);
INSERT INTO tb_cidades VALUES (2947, 'Surubim', 261450, 16, 58515, 231.42, 'surubinense', 252.854);
INSERT INTO tb_cidades VALUES (2949, 'Tacaimb�', 261470, 16, 12725, 55.91, 'tacaimboense', 227.599);
INSERT INTO tb_cidades VALUES (2951, 'Tamandar�', 261485, 16, 20715, 96.66, 'tamandareense', 214.306);
INSERT INTO tb_cidades VALUES (2953, 'Terezinha', 261510, 16, 6737, 44.48, 'terezinhense', 151.449);
INSERT INTO tb_cidades VALUES (2954, 'Terra Nova', 261520, 16, 9278, 28.87, 'terra-novense', 321.427);
INSERT INTO tb_cidades VALUES (2956, 'Toritama', 261540, 16, 35554, 1.383, 'toritamense ', 25.704);
INSERT INTO tb_cidades VALUES (2958, 'Trindade', 261560, 16, 26116, 113.77, 'trindadense', 229.545);
INSERT INTO tb_cidades VALUES (2960, 'Tupanatinga', 261580, 16, 24425, 27.62, 'tupanatinguense', 884.413);
INSERT INTO tb_cidades VALUES (2961, 'Tuparetama', 261590, 16, 7925, 44.38, 'tuparetamense', 178.569);
INSERT INTO tb_cidades VALUES (2963, 'Verdejante', 261610, 16, 9142, 19.2, 'verdejantense', 476.037);
INSERT INTO tb_cidades VALUES (2965, 'Vertentes', 261620, 16, 18222, 92.82, 'vertentense', 196.324);
INSERT INTO tb_cidades VALUES (2967, 'Vit�ria De Santo Ant�o', 261640, 16, 129974, 349.58, 'vitoriense', 371.803);
INSERT INTO tb_cidades VALUES (2968, 'Xex�u', 261650, 16, 14093, 127.18, 'xexeuense', 110.812);
INSERT INTO tb_cidades VALUES (2970, 'Agricol�ndia', 220010, 17, 5098, 45.35, 'agricolandiense', 112.424);
INSERT INTO tb_cidades VALUES (2972, 'Alagoinha Do Piau�', 220025, 17, 7341, 13.77, 'alagoinense', 532.979);
INSERT INTO tb_cidades VALUES (2974, 'Alto Long�', 220030, 17, 13646, 7.85, 'longaense', 1737.828);
INSERT INTO tb_cidades VALUES (2975, 'Altos', 220040, 17, 38822, 40.54, 'altoense', 957.65);
INSERT INTO tb_cidades VALUES (2977, 'Amarante', 220050, 17, 17135, 14.83, 'amarantino', 1155.197);
INSERT INTO tb_cidades VALUES (2979, 'An�sio De Abreu', 220070, 17, 9098, 26.93, 'anisiense', 337.876);
INSERT INTO tb_cidades VALUES (2981, 'Aroazes', 220090, 17, 5779, 7.03, 'aroazense', 821.659);
INSERT INTO tb_cidades VALUES (2982, 'Aroeiras Do Itaim', 220095, 17, 2440, 9.49, '', 257.138);
INSERT INTO tb_cidades VALUES (2984, 'Assun��o Do Piau�', 220105, 17, 7503, 4.44, 'assun��oense', 1690.694);
INSERT INTO tb_cidades VALUES (2985, 'Avelino Lopes', 220110, 17, 11067, 8.48, 'avelino-lopense', 1305.518);
INSERT INTO tb_cidades VALUES (2987, 'Barra D`Alc�ntara', 220117, 17, 3852, 14.63, 'barra d?alcantarense', 263.381);
INSERT INTO tb_cidades VALUES (2989, 'Barreiras Do Piau�', 220130, 17, 3234, 1.59, 'barreirense', 2028.287);
INSERT INTO tb_cidades VALUES (2991, 'Batalha', 220150, 17, 25774, 16.22, 'batalhense', 1588.892);
INSERT INTO tb_cidades VALUES (2993, 'Bel�m Do Piau�', 220157, 17, 3284, 13.5, 'belenense', 243.281);
INSERT INTO tb_cidades VALUES (2994, 'Beneditinos', 220160, 17, 9911, 12.57, 'beneditinense', 788.58);
INSERT INTO tb_cidades VALUES (2996, 'Bet�nia Do Piau�', 220173, 17, 6015, 10.65, 'betanhense', 564.709);
INSERT INTO tb_cidades VALUES (2997, 'Boa Hora', 220177, 17, 6296, 18.65, 'boa horense', 337.566);
INSERT INTO tb_cidades VALUES (2999, 'Bom Jesus', 220190, 17, 22629, 4.14, 'bom-jesuense', 5469.161);
INSERT INTO tb_cidades VALUES (3001, 'Bonfim Do Piau�', 220192, 17, 5393, 18.65, 'bonfinense', 289.208);
INSERT INTO tb_cidades VALUES (3003, 'Brasileira', 220196, 17, 7966, 9.04, 'brasileirense', 880.906);
INSERT INTO tb_cidades VALUES (3004, 'Brejo Do Piau�', 220198, 17, 3850, 1.76, 'brejense', 2183.346);
INSERT INTO tb_cidades VALUES (3006, 'Buriti Dos Montes', 220202, 17, 7974, 3.01, 'buritiense', 2652.093);
INSERT INTO tb_cidades VALUES (3008, 'Cajazeiras Do Piau�', 220207, 17, 3343, 6.5, 'cajazerense', 514.361);
INSERT INTO tb_cidades VALUES (3009, 'Cajueiro Da Praia', 220208, 17, 7163, 26.36, 'cajueirense', 271.705);
INSERT INTO tb_cidades VALUES (3011, 'Campinas Do Piau�', 220210, 17, 5408, 6.51, 'campinense', 831.197);
INSERT INTO tb_cidades VALUES (3012, 'Campo Alegre Do Fidalgo', 220211, 17, 4693, 7.13, 'campo alegrense', 657.811);
INSERT INTO tb_cidades VALUES (3014, 'Campo Largo Do Piau�', 220217, 17, 6803, 14.24, 'campolargoense', 477.792);
INSERT INTO tb_cidades VALUES (3015, 'Campo Maior', 220220, 17, 45177, 26.96, 'campo-maiorense', 1675.706);
INSERT INTO tb_cidades VALUES (3018, 'Capit�o De Campos', 220240, 17, 10953, 18.5, 'capit�o-de-campense', 592.164);
INSERT INTO tb_cidades VALUES (3019, 'Capit�o Gerv�sio Oliveira', 220245, 17, 3878, 3.42, 'gervasense', 1134.137);
INSERT INTO tb_cidades VALUES (3021, 'Cara�bas Do Piau�', 220253, 17, 5525, 11.72, 'carubense', 471.45);
INSERT INTO tb_cidades VALUES (3023, 'Castelo Do Piau�', 220260, 17, 18336, 9.01, 'castelense', 2035.182);
INSERT INTO tb_cidades VALUES (3024, 'Caxing�', 220265, 17, 5039, 10.32, 'caxingoense', 488.166);
INSERT INTO tb_cidades VALUES (3026, 'Cocal De Telha', 220271, 17, 4525, 16.04, 'cocatelhense', 282.104);
INSERT INTO tb_cidades VALUES (3028, 'Coivaras', 220273, 17, 3811, 7.85, 'coivarense', 485.491);
INSERT INTO tb_cidades VALUES (5416, 'Vargem Grande Do Sul', 355640, 26, 39266, 146.94, 'vargem-grandense', 267.232);
INSERT INTO tb_cidades VALUES (3032, 'Coronel Jos� Dias', 220285, 17, 4541, 2.37, 'coronelino', 1914.811);
INSERT INTO tb_cidades VALUES (3033, 'Corrente', 220290, 17, 25407, 8.33, 'correntino', 3048.418);
INSERT INTO tb_cidades VALUES (3035, 'Cristino Castro', 220310, 17, 9981, 5.41, 'cristino-castrense', 1846.296);
INSERT INTO tb_cidades VALUES (3037, 'Currais', 220323, 17, 4704, 1.49, 'curralense', 3156.647);
INSERT INTO tb_cidades VALUES (3039, 'Curralinhos', 220325, 17, 4183, 12.09, 'curralinhense', 345.846);
INSERT INTO tb_cidades VALUES (3040, 'Demerval Lob�o', 220330, 17, 13278, 61.24, 'morrinhense', 216.805);
INSERT INTO tb_cidades VALUES (3042, 'Dom Expedito Lopes', 220340, 17, 6569, 29.99, 'dom-expedito-lopense', 219.072);
INSERT INTO tb_cidades VALUES (3044, 'Domingos Mour�o', 220342, 17, 4264, 5.04, 'domingos-mouronense', 846.839);
INSERT INTO tb_cidades VALUES (3046, 'Eliseu Martins', 220360, 17, 4665, 4.28, 'eliseu-martinino ', 1090.446);
INSERT INTO tb_cidades VALUES (3047, 'Esperantina', 220370, 17, 37767, 41.45, 'esperantinense', 911.21);
INSERT INTO tb_cidades VALUES (3049, 'Flores Do Piau�', 220380, 17, 4366, 4.61, 'florentino-do-piau�', 946.727);
INSERT INTO tb_cidades VALUES (3051, 'Floriano', 220390, 17, 57690, 16.92, 'florianense', 3409.634);
INSERT INTO tb_cidades VALUES (3053, 'Francisco Ayres', 220410, 17, 4477, 6.82, 'airense', 656.472);
INSERT INTO tb_cidades VALUES (3054, 'Francisco Macedo', 220415, 17, 2879, 18.54, 'francisco macedense', 155.278);
INSERT INTO tb_cidades VALUES (3056, 'Fronteiras', 220430, 17, 11117, 14.33, 'fronteirense', 775.677);
INSERT INTO tb_cidades VALUES (3058, 'Gilbu�s', 220440, 17, 10402, 2.98, 'gilbuense', 3494.947);
INSERT INTO tb_cidades VALUES (3059, 'Guadalupe', 220450, 17, 10268, 10.03, 'guadalupense', 1023.588);
INSERT INTO tb_cidades VALUES (3061, 'Hugo Napole�o', 220460, 17, 3771, 16.8, 'hugo-napoleonense', 224.454);
INSERT INTO tb_cidades VALUES (3063, 'Inhuma', 220470, 17, 14845, 15.18, 'inhumense', 978.212);
INSERT INTO tb_cidades VALUES (3065, 'Isa�as Coelho', 220490, 17, 8221, 10.59, 'isaiense', 776.05);
INSERT INTO tb_cidades VALUES (3067, 'Itaueira', 220510, 17, 10678, 4.18, 'itaueirense', 2554.17);
INSERT INTO tb_cidades VALUES (3068, 'Jacobina Do Piau�', 220515, 17, 5722, 4.17, 'jacobinense', 1370.724);
INSERT INTO tb_cidades VALUES (3070, 'Jardim Do Mulato', 220525, 17, 4309, 8.45, 'jardimulatense', 509.849);
INSERT INTO tb_cidades VALUES (3072, 'Jerumenha', 220530, 17, 4390, 2.35, 'jerumenhense', 1867.305);
INSERT INTO tb_cidades VALUES (3073, 'Jo�o Costa', 220535, 17, 2960, 1.64, 'jo�o costense', 1800.236);
INSERT INTO tb_cidades VALUES (3075, 'Joca Marques', 220545, 17, 5100, 30.64, 'jocamarquense', 166.442);
INSERT INTO tb_cidades VALUES (3077, 'Juazeiro Do Piau�', 220551, 17, 4757, 5.75, 'juazeirense', 827.236);
INSERT INTO tb_cidades VALUES (3079, 'Jurema', 220553, 17, 4517, 3.55, 'juremense', 1271.883);
INSERT INTO tb_cidades VALUES (3080, 'Lagoa Alegre', 220555, 17, 8008, 20.29, 'lagoalegrense', 394.659);
INSERT INTO tb_cidades VALUES (3082, 'Lagoa Do Barro Do Piau�', 220556, 17, 4523, 3.58, 'lagoa do barrense', 1261.936);
INSERT INTO tb_cidades VALUES (3084, 'Lagoa Do S�tio', 220559, 17, 4850, 6.03, 'sitiolagoense', 804.7);
INSERT INTO tb_cidades VALUES (3085, 'Lagoinha Do Piau�', 220554, 17, 2656, 39.35, 'lagoinense', 67.503);
INSERT INTO tb_cidades VALUES (3087, 'Lu�s Correia', 220570, 17, 28406, 26.52, 'lu�s-correiense', 1070.922);
INSERT INTO tb_cidades VALUES (3089, 'Madeiro', 220585, 17, 7816, 44.12, 'madeirense', 177.152);
INSERT INTO tb_cidades VALUES (3091, 'Marcol�ndia', 220595, 17, 7812, 54.3, 'marcolandense', 143.875);
INSERT INTO tb_cidades VALUES (3092, 'Marcos Parente', 220600, 17, 4456, 6.58, 'marcos-parentense', 677.411);
INSERT INTO tb_cidades VALUES (3094, 'Matias Ol�mpio', 220610, 17, 10473, 46.26, 'matiense', 226.373);
INSERT INTO tb_cidades VALUES (3096, 'Miguel Le�o', 220630, 17, 1253, 13.4, 'leonino', 93.514);
INSERT INTO tb_cidades VALUES (3098, 'Monsenhor Gil', 220640, 17, 10333, 18.17, 'monsenhorgilense', 568.728);
INSERT INTO tb_cidades VALUES (3099, 'Monsenhor Hip�lito', 220650, 17, 7391, 18.41, 'hipolitano', 401.432);
INSERT INTO tb_cidades VALUES (3101, 'Morro Cabe�a No Tempo', 220665, 17, 4068, 1.92, 'morrense', 2116.929);
INSERT INTO tb_cidades VALUES (3103, 'Murici Dos Portelas', 220669, 17, 8464, 17.57, 'muriciense', 481.705);
INSERT INTO tb_cidades VALUES (3104, 'Nazar� Do Piau�', 220670, 17, 7321, 5.56, 'nazareno-do-piau�', 1315.833);
INSERT INTO tb_cidades VALUES (3106, 'Nossa Senhora De Nazar�', 220675, 17, 4556, 12.79, 'nazareno', 356.262);
INSERT INTO tb_cidades VALUES (3108, 'Nova Santa Rita', 220795, 17, 4187, 4.6, 'Santaritense ', 909.731);
INSERT INTO tb_cidades VALUES (3109, 'Novo Oriente Do Piau�', 220690, 17, 6498, 12.37, 'novo-orientino', 525.331);
INSERT INTO tb_cidades VALUES (3111, 'Oeiras', 220700, 17, 35640, 13.19, 'oeirense', 2702.481);
INSERT INTO tb_cidades VALUES (3113, 'Padre Marcos', 220720, 17, 6657, 24.47, 'padre-marquense', 272.034);
INSERT INTO tb_cidades VALUES (3114, 'Paes Landim', 220730, 17, 4059, 10.11, 'paes-landinense', 401.377);
INSERT INTO tb_cidades VALUES (3116, 'Palmeira Do Piau�', 220740, 17, 4993, 2.47, 'palmeirino', 2023.505);
INSERT INTO tb_cidades VALUES (3117, 'Palmeirais', 220750, 17, 13745, 9.17, 'palmeirense', 1499.175);
INSERT INTO tb_cidades VALUES (3119, 'Parnagu�', 220760, 17, 10276, 3, 'parnaguaense', 3429.272);
INSERT INTO tb_cidades VALUES (3121, 'Passagem Franca Do Piau�', 220775, 17, 4546, 5.35, 'passagemfranquense', 849.604);
INSERT INTO tb_cidades VALUES (3123, 'Pau D`Arco Do Piau�', 220779, 17, 3757, 8.72, 'paudarquiense', 430.814);
INSERT INTO tb_cidades VALUES (3125, 'Pavussu', 220785, 17, 3663, 3.36, 'pavussuense', 1090.695);
INSERT INTO tb_cidades VALUES (3126, 'Pedro Ii', 220790, 17, 37496, 24.7, 'pedro-segundense', 1518.225);
INSERT INTO tb_cidades VALUES (3128, 'Picos', 220800, 17, 73414, 137.3, 'picoense', 534.713);
INSERT INTO tb_cidades VALUES (3130, 'Pio Ix', 220820, 17, 17671, 9.08, 'pio-nonense', 1947.148);
INSERT INTO tb_cidades VALUES (3132, 'Piripiri', 220840, 17, 61834, 43.89, 'piripiriense', 1408.926);
INSERT INTO tb_cidades VALUES (3133, 'Porto', 220850, 17, 11897, 47.08, 'portuense', 252.714);
INSERT INTO tb_cidades VALUES (3135, 'Prata Do Piau�', 220860, 17, 3085, 15.71, 'pratense', 196.325);
INSERT INTO tb_cidades VALUES (3137, 'Reden��o Do Gurgu�ia', 220870, 17, 8400, 3.4, 'gurgue�no', 2467.999);
INSERT INTO tb_cidades VALUES (3139, 'Riacho Frio', 220885, 17, 4241, 1.91, 'riacho friense', 2222.107);
INSERT INTO tb_cidades VALUES (3140, 'Ribeira Do Piau�', 220887, 17, 4263, 4.25, 'ribeirense', 1004.223);
INSERT INTO tb_cidades VALUES (3142, 'Rio Grande Do Piau�', 220900, 17, 6273, 9.86, 'rio-grandense-do-piau�', 635.949);
INSERT INTO tb_cidades VALUES (3144, 'Santa Cruz Dos Milagres', 220915, 17, 3794, 3.87, 'santacruzense', 979.652);
INSERT INTO tb_cidades VALUES (3145, 'Santa Filomena', 220920, 17, 6096, 1.15, 'filomense ', 5285.42);
INSERT INTO tb_cidades VALUES (3147, 'Santa Rosa Do Piau�', 220937, 17, 5149, 15.14, 'santarosense', 340.196);
INSERT INTO tb_cidades VALUES (3149, 'Santo Ant�nio De Lisboa', 220940, 17, 6007, 15.51, 'santo-antoense', 387.401);
INSERT INTO tb_cidades VALUES (3273, 'Colorado', 410590, 18, 22345, 55.41, 'colorados', 403.263);
INSERT INTO tb_cidades VALUES (3152, 'S�o Braz Do Piau�', 220955, 17, 4313, 6.57, 'san-brazense', 656.359);
INSERT INTO tb_cidades VALUES (3154, 'S�o Francisco De Assis Do Piau�', 220965, 17, 5567, 5.06, 's�ofranciscoense ', 1100.393);
INSERT INTO tb_cidades VALUES (3156, 'S�o Gon�alo Do Gurgu�ia', 220975, 17, 2825, 2.04, 's�o gon�alense', 1385.293);
INSERT INTO tb_cidades VALUES (3158, 'S�o Jo�o Da Canabrava', 220985, 17, 4445, 9.26, 'canabravense', 480.277);
INSERT INTO tb_cidades VALUES (3159, 'S�o Jo�o Da Fronteira', 220987, 17, 5608, 7.33, 's�o j�o fronteirense', 764.862);
INSERT INTO tb_cidades VALUES (3161, 'S�o Jo�o Da Varjota', 220995, 17, 4651, 11.77, 'sanjoanense', 395.305);
INSERT INTO tb_cidades VALUES (3163, 'S�o Jo�o Do Piau�', 221000, 17, 19548, 12.8, 's�o-joanense', 1527.774);
INSERT INTO tb_cidades VALUES (3164, 'S�o Jos� Do Divino', 221005, 17, 5148, 16.13, 'divinense', 319.128);
INSERT INTO tb_cidades VALUES (3166, 'S�o Jos� Do Piau�', 221020, 17, 6591, 18.06, 's�o-joseense', 364.943);
INSERT INTO tb_cidades VALUES (3167, 'S�o Juli�o', 221030, 17, 5675, 22.07, 's�o-julianense', 257.19);
INSERT INTO tb_cidades VALUES (3169, 'S�o Luis Do Piau�', 221037, 17, 2561, 11.62, 's�oluisense', 220.374);
INSERT INTO tb_cidades VALUES (3171, 'S�o Miguel Do Fidalgo', 221039, 17, 2976, 3.66, 'fidalguense', 813.44);
INSERT INTO tb_cidades VALUES (3172, 'S�o Miguel Do Tapuio', 221040, 17, 18134, 3.48, 'tapuiense', 5206.989);
INSERT INTO tb_cidades VALUES (3174, 'S�o Raimundo Nonato', 221060, 17, 32327, 13.38, 's�o-raimundense', 2415.592);
INSERT INTO tb_cidades VALUES (3176, 'Sebasti�o Leal', 221063, 17, 4116, 1.31, 'sebasti�o-lealense', 3151.579);
INSERT INTO tb_cidades VALUES (3177, 'Sigefredo Pacheco', 221065, 17, 9619, 9.95, 'sigefredense', 966.984);
INSERT INTO tb_cidades VALUES (3179, 'Simpl�cio Mendes', 221080, 17, 12077, 8.97, 'simpl�cio-mendense', 1345.784);
INSERT INTO tb_cidades VALUES (3181, 'Sussuapara', 221093, 17, 6229, 29.7, 'sussuaparense', 209.699);
INSERT INTO tb_cidades VALUES (3183, 'Tanque Do Piau�', 221097, 17, 2620, 6.57, 'tanquense', 398.721);
INSERT INTO tb_cidades VALUES (3184, 'Teresina', 221100, 17, 814230, 584.95, 'teresinense', 1391.974);
INSERT INTO tb_cidades VALUES (3186, 'Uru�u�', 221120, 17, 20149, 2.4, 'uru�uiense', 8411.877);
INSERT INTO tb_cidades VALUES (3188, 'V�rzea Branca', 221135, 17, 4913, 10.9, 'varzea-branquense', 450.753);
INSERT INTO tb_cidades VALUES (3190, 'Vera Mendes', 221150, 17, 2986, 8.73, 'veramendense ', 341.973);
INSERT INTO tb_cidades VALUES (3191, 'Vila Nova Do Piau�', 221160, 17, 3076, 14.09, 'vilanovense', 218.315);
INSERT INTO tb_cidades VALUES (3193, 'Abati�', 410010, 18, 7764, 33.95, 'abatiense', 228.717);
INSERT INTO tb_cidades VALUES (3195, 'Agudos Do Sul', 410030, 18, 8270, 43.02, 'agudense-do-sul ', 192.229);
INSERT INTO tb_cidades VALUES (3197, 'Altamira Do Paran�', 410045, 18, 4306, 11.13, 'altamirense', 386.946);
INSERT INTO tb_cidades VALUES (3198, 'Alto Para�so', 412862, 18, 3206, 3.31, 'altoparaisense', 967.775);
INSERT INTO tb_cidades VALUES (3200, 'Alto Piquiri', 410070, 18, 10179, 22.74, 'alto-piquirense', 447.667);
INSERT INTO tb_cidades VALUES (3201, 'Alt�nia', 410050, 18, 20516, 31.01, 'altoniano ', 661.562);
INSERT INTO tb_cidades VALUES (3203, 'Amapor�', 410090, 18, 5443, 14.15, 'amaporense', 384.735);
INSERT INTO tb_cidades VALUES (3205, 'Anahy', 410105, 18, 2874, 28, 'anaiense', 102.648);
INSERT INTO tb_cidades VALUES (3207, '�ngulo', 410115, 18, 2859, 26.97, 'angulense', 106.021);
INSERT INTO tb_cidades VALUES (3208, 'Antonina', 410120, 18, 18891, 21.41, 'antoninense ', 882.318);
INSERT INTO tb_cidades VALUES (3210, 'Apucarana', 410140, 18, 120919, 216.55, 'apucaranense', 558.39);
INSERT INTO tb_cidades VALUES (3212, 'Arapoti', 410160, 18, 25855, 19, 'arapotiense', 1360.496);
INSERT INTO tb_cidades VALUES (3214, 'Araruna', 410170, 18, 13419, 27.21, 'ararunense', 493.192);
INSERT INTO tb_cidades VALUES (3215, 'Arauc�ria', 410180, 18, 119123, 253.9, 'araucariano ', 469.168);
INSERT INTO tb_cidades VALUES (3217, 'Assa�', 410190, 18, 16354, 37.14, 'assaiense', 440.348);
INSERT INTO tb_cidades VALUES (3219, 'Astorga', 410210, 18, 24698, 56.8, 'astorgano ', 434.792);
INSERT INTO tb_cidades VALUES (3221, 'Balsa Nova', 410230, 18, 11300, 32.38, 'balsa-novense ', 348.97);
INSERT INTO tb_cidades VALUES (3222, 'Bandeirantes', 410240, 18, 32184, 72.29, 'bandeirantense', 445.193);
INSERT INTO tb_cidades VALUES (3224, 'Barra Do Jacar�', 410270, 18, 2727, 23.56, 'barrense', 115.725);
INSERT INTO tb_cidades VALUES (3226, 'Bela Vista Da Caroba', 410275, 18, 3945, 26.64, 'boaesperencense', 148.107);
INSERT INTO tb_cidades VALUES (3228, 'Bituruna', 410290, 18, 15880, 13.07, 'biturenense', 1214.915);
INSERT INTO tb_cidades VALUES (3229, 'Boa Esperan�a', 410300, 18, 4568, 14.86, 'boa-esperansense', 307.382);
INSERT INTO tb_cidades VALUES (3231, 'Boa Ventura De S�o Roque', 410304, 18, 6554, 10.53, 'boa venturense ', 622.185);
INSERT INTO tb_cidades VALUES (3233, 'Bocai�va Do Sul', 410310, 18, 10987, 13.3, 'bocaiuvense ', 826.345);
INSERT INTO tb_cidades VALUES (3234, 'Bom Jesus Do Sul', 410315, 18, 3796, 21.82, 'bonjesuense', 173.972);
INSERT INTO tb_cidades VALUES (3236, 'Bom Sucesso Do Sul', 410322, 18, 3293, 16.81, 'bomsucessense do sul', 195.932);
INSERT INTO tb_cidades VALUES (3238, 'Braganey', 410335, 18, 5735, 16.7, 'braganense', 343.322);
INSERT INTO tb_cidades VALUES (3239, 'Brasil�ndia Do Sul', 410337, 18, 3209, 11.03, 'brasilandiense', 291.036);
INSERT INTO tb_cidades VALUES (3241, 'Cafel�ndia', 410345, 18, 14662, 53.96, 'cafelandense', 271.725);
INSERT INTO tb_cidades VALUES (3243, 'Calif�rnia', 410350, 18, 8069, 56.9, 'californiano', 141.817);
INSERT INTO tb_cidades VALUES (3245, 'Camb�', 410370, 18, 96733, 195.54, 'cambeense', 494.685);
INSERT INTO tb_cidades VALUES (3246, 'Cambira', 410380, 18, 7236, 44.29, 'cambirense', 163.388);
INSERT INTO tb_cidades VALUES (3248, 'Campina Do Sim�o', 410395, 18, 4076, 9.09, 'campineiro do sim�o ', 448.425);
INSERT INTO tb_cidades VALUES (3250, 'Campo Bonito', 410405, 18, 4407, 10.16, 'campo-bonitense', 433.835);
INSERT INTO tb_cidades VALUES (3252, 'Campo Largo', 410420, 18, 112377, 89.94, 'campo-larguense', 1249.419);
INSERT INTO tb_cidades VALUES (3253, 'Campo Magro', 410425, 18, 24843, 90.15, 'campomagrense', 275.573);
INSERT INTO tb_cidades VALUES (3255, 'C�ndido De Abreu', 410440, 18, 16655, 11.03, 'c�ndido-abreuense', 1510.163);
INSERT INTO tb_cidades VALUES (3257, 'Cantagalo', 410445, 18, 12952, 22.2, 'cantagalense', 583.541);
INSERT INTO tb_cidades VALUES (3258, 'Capanema', 410450, 18, 18526, 44.25, 'capanemense', 418.706);
INSERT INTO tb_cidades VALUES (3260, 'Carambe�', 410465, 18, 19163, 29.5, 'carambiense', 649.681);
INSERT INTO tb_cidades VALUES (3262, 'Cascavel', 410480, 18, 286205, 136.23, 'cascavelense', 2100.837);
INSERT INTO tb_cidades VALUES (3263, 'Castro', 410490, 18, 67084, 26.5, 'castrense', 2531.507);
INSERT INTO tb_cidades VALUES (3265, 'Centen�rio Do Sul', 410510, 18, 11190, 30.09, 'centenariense', 371.834);
INSERT INTO tb_cidades VALUES (3267, 'C�u Azul', 410530, 18, 11032, 9.35, 'c�u-azulense', 1179.449);
INSERT INTO tb_cidades VALUES (3269, 'Cianorte', 410550, 18, 69958, 86.19, 'cianortense', 811.668);
INSERT INTO tb_cidades VALUES (3271, 'Clevel�ndia', 410570, 18, 17240, 24.47, 'clevelandense', 704.636);
INSERT INTO tb_cidades VALUES (3272, 'Colombo', 410580, 18, 212967, 1.079, 'colombense', 197.36);
INSERT INTO tb_cidades VALUES (5419, 'Vera Cruz', 355660, 26, 10769, 43.41, 'vera-cruzense', 248.072);
INSERT INTO tb_cidades VALUES (3276, 'Contenda', 410620, 18, 15891, 53.14, 'contendense', 299.038);
INSERT INTO tb_cidades VALUES (3278, 'Corn�lio Proc�pio', 410640, 18, 46928, 73.89, 'procopense', 635.101);
INSERT INTO tb_cidades VALUES (3280, 'Coronel Vivida', 410650, 18, 21749, 31.78, 'coronel-vividense', 684.418);
INSERT INTO tb_cidades VALUES (3281, 'Corumbata� Do Sul', 410655, 18, 4002, 24.35, 'corumbataiense', 164.341);
INSERT INTO tb_cidades VALUES (3283, 'Cruzeiro Do Igua�u', 410657, 18, 4278, 26.43, 'cruzeirense', 161.863);
INSERT INTO tb_cidades VALUES (3285, 'Cruzeiro Do Sul', 410670, 18, 4563, 17.61, 'cruzeirense-do-sul', 259.103);
INSERT INTO tb_cidades VALUES (3286, 'Cruzmaltina', 410685, 18, 3162, 10.12, 'cruzmaltinense', 312.299);
INSERT INTO tb_cidades VALUES (3288, 'Curi�va', 410700, 18, 13923, 24.16, 'curiuvense', 576.264);
INSERT INTO tb_cidades VALUES (3290, 'Diamante Do Norte', 410710, 18, 5516, 22.71, 'diamantense ', 242.886);
INSERT INTO tb_cidades VALUES (3292, 'Dois Vizinhos', 410720, 18, 36179, 86.42, 'dois-vizinhense', 418.649);
INSERT INTO tb_cidades VALUES (3293, 'Douradina', 410725, 18, 7445, 17.73, 'douradinense', 419.854);
INSERT INTO tb_cidades VALUES (3295, 'Doutor Ulysses', 412863, 18, 5727, 7.33, 'ulyssense', 781.451);
INSERT INTO tb_cidades VALUES (3297, 'Engenheiro Beltr�o', 410750, 18, 13906, 29.75, 'engenheiro-beltrense', 467.471);
INSERT INTO tb_cidades VALUES (3298, 'Entre Rios Do Oeste', 410753, 18, 3926, 32.16, 'entreriense', 122.072);
INSERT INTO tb_cidades VALUES (3300, 'Espig�o Alto Do Igua�u', 410754, 18, 4677, 14.33, 'espig�oense', 326.441);
INSERT INTO tb_cidades VALUES (3302, 'Faxinal', 410760, 18, 16314, 22.79, 'faxinalense', 715.945);
INSERT INTO tb_cidades VALUES (3304, 'F�nix', 410770, 18, 4802, 20.51, 'fenexense', 234.1);
INSERT INTO tb_cidades VALUES (3305, 'Fernandes Pinheiro', 410773, 18, 5932, 14.59, 'fernandespinheirense', 406.5);
INSERT INTO tb_cidades VALUES (3307, 'Flor Da Serra Do Sul', 410785, 18, 4726, 19.75, 'sulflorense', 239.301);
INSERT INTO tb_cidades VALUES (3309, 'Floresta', 410790, 18, 5931, 37.48, 'florestense ', 158.226);
INSERT INTO tb_cidades VALUES (3311, 'Fl�rida', 410810, 18, 2543, 30.62, 'floridense', 83.046);
INSERT INTO tb_cidades VALUES (3313, 'Foz Do Igua�u', 410830, 18, 256088, 414.58, 'igua�uense', 617.702);
INSERT INTO tb_cidades VALUES (3314, 'Foz Do Jord�o', 410845, 18, 5420, 23.03, 'foz jordanense ', 235.383);
INSERT INTO tb_cidades VALUES (3316, 'Francisco Beltr�o', 410840, 18, 78943, 107.39, 'francisco-beltrense', 735.113);
INSERT INTO tb_cidades VALUES (3318, 'Godoy Moreira', 410855, 18, 3337, 25.47, 'godoense', 131.012);
INSERT INTO tb_cidades VALUES (3319, 'Goioer�', 410860, 18, 29018, 51.44, 'goio-erense', 564.165);
INSERT INTO tb_cidades VALUES (3321, 'Grandes Rios', 410870, 18, 6625, 21.09, 'grande-riense', 314.199);
INSERT INTO tb_cidades VALUES (3323, 'Guaira��', 410890, 18, 6197, 12.55, 'guaira�aense', 493.941);
INSERT INTO tb_cidades VALUES (3325, 'Guapirama', 410900, 18, 3891, 20.58, 'guapiramense', 189.1);
INSERT INTO tb_cidades VALUES (3326, 'Guaporema', 410910, 18, 2219, 11.08, 'guaporemense', 200.189);
INSERT INTO tb_cidades VALUES (3328, 'Guarania�u', 410930, 18, 14582, 11.9, 'guarania�uano ', 1225.61);
INSERT INTO tb_cidades VALUES (3330, 'Guaraque�aba', 410950, 18, 7871, 3.9, 'guaraque�abano', 2020.093);
INSERT INTO tb_cidades VALUES (3332, 'Hon�rio Serpa', 410965, 18, 5955, 11.86, 'hon�rio serpense', 502.236);
INSERT INTO tb_cidades VALUES (3334, 'Ibema', 410975, 18, 6066, 41.71, 'ibemense', 145.445);
INSERT INTO tb_cidades VALUES (3335, 'Ibipor�', 410980, 18, 48198, 161.88, 'ibiporanense', 297.743);
INSERT INTO tb_cidades VALUES (3337, 'Iguara�u', 411000, 18, 3982, 24.14, 'iguara�uense', 164.983);
INSERT INTO tb_cidades VALUES (3339, 'Imba�', 411007, 18, 11274, 34.03, 'imbauense', 331.276);
INSERT INTO tb_cidades VALUES (3341, 'In�cio Martins', 411020, 18, 10943, 11.68, 'in�cio-martinense ', 936.915);
INSERT INTO tb_cidades VALUES (3343, 'Indian�polis', 411040, 18, 4299, 35.06, 'indianopolitano', 122.622);
INSERT INTO tb_cidades VALUES (3344, 'Ipiranga', 411050, 18, 14150, 15.26, 'ipiranguense', 927.089);
INSERT INTO tb_cidades VALUES (3346, 'Iracema Do Oeste', 411065, 18, 2578, 31.62, 'iracemense', 81.539);
INSERT INTO tb_cidades VALUES (3348, 'Iretama', 411080, 18, 10622, 18.62, 'iretamense', 570.461);
INSERT INTO tb_cidades VALUES (3350, 'Itaipul�ndia', 411095, 18, 9026, 27.25, 'itaipulandiense', 331.289);
INSERT INTO tb_cidades VALUES (3352, 'Itamb�', 411110, 18, 5979, 24.52, 'itambenense', 243.822);
INSERT INTO tb_cidades VALUES (3354, 'Itaperu�u', 411125, 18, 23887, 75.97, 'itaperu�uense', 314.419);
INSERT INTO tb_cidades VALUES (3355, 'Ita�na Do Sul', 411130, 18, 3583, 27.8, 'itaunense', 128.87);
INSERT INTO tb_cidades VALUES (3357, 'Ivaipor�', 411150, 18, 31816, 73.73, 'ivaipor�nense', 431.503);
INSERT INTO tb_cidades VALUES (3359, 'Ivatuba', 411160, 18, 3010, 31.14, 'ivatubense', 96.661);
INSERT INTO tb_cidades VALUES (3360, 'Jaboti', 411170, 18, 4902, 35.2, 'jabotiense', 139.277);
INSERT INTO tb_cidades VALUES (3362, 'Jaguapit�', 411190, 18, 12225, 25.74, 'jaguapit�ense ', 475.005);
INSERT INTO tb_cidades VALUES (3364, 'Jandaia Do Sul', 411210, 18, 20269, 108.04, 'jandaiense-do-sul ', 187.601);
INSERT INTO tb_cidades VALUES (3366, 'Japira', 411230, 18, 4903, 26.04, 'japirense', 188.288);
INSERT INTO tb_cidades VALUES (3368, 'Jardim Alegre', 411250, 18, 12324, 30.4, 'jardim-alegrense ', 405.435);
INSERT INTO tb_cidades VALUES (3370, 'Jataizinho', 411270, 18, 11875, 74.6, 'jatainhense ', 159.178);
INSERT INTO tb_cidades VALUES (3371, 'Jesu�tas', 411275, 18, 9001, 36.37, 'jesuitense', 247.497);
INSERT INTO tb_cidades VALUES (3373, 'Jundia� Do Sul', 411290, 18, 3433, 10.7, 'jundiaiense-do-sul ', 320.817);
INSERT INTO tb_cidades VALUES (3375, 'Jussara', 411300, 18, 6610, 31.35, 'jussarense', 210.87);
INSERT INTO tb_cidades VALUES (3376, 'Kalor�', 411310, 18, 4506, 23.31, 'kaloreense', 193.299);
INSERT INTO tb_cidades VALUES (3378, 'Laranjal', 411325, 18, 6360, 11.37, 'laranjaense', 559.44);
INSERT INTO tb_cidades VALUES (3380, 'Le�polis', 411340, 18, 4145, 12.02, 'leopolense', 344.919);
INSERT INTO tb_cidades VALUES (3382, 'Lindoeste', 411345, 18, 5361, 14.84, 'lindo-estense', 361.368);
INSERT INTO tb_cidades VALUES (3383, 'Loanda', 411350, 18, 21201, 29.34, 'loandense', 722.498);
INSERT INTO tb_cidades VALUES (3385, 'Londrina', 411370, 18, 506701, 306.49, 'londrinense', 1653.263);
INSERT INTO tb_cidades VALUES (3387, 'Lunardelli', 411375, 18, 5160, 25.9, 'lunardelliense', 199.214);
INSERT INTO tb_cidades VALUES (3389, 'Mallet', 411390, 18, 12973, 17.94, 'malletense', 723.082);
INSERT INTO tb_cidades VALUES (3390, 'Mambor�', 411400, 18, 13961, 17.72, 'mamborense', 788.063);
INSERT INTO tb_cidades VALUES (3392, 'Mandaguari', 411420, 18, 32658, 97.25, 'mandaguariense', 335.815);
INSERT INTO tb_cidades VALUES (3394, 'Manfrin�polis', 411435, 18, 3127, 14.45, 'manfrinopolitano', 216.416);
INSERT INTO tb_cidades VALUES (3396, 'Manoel Ribas', 411450, 18, 13169, 23.06, 'manoel-ribense', 571.136);
INSERT INTO tb_cidades VALUES (3398, 'Maria Helena', 411470, 18, 5956, 12.25, 'maria-helenense', 486.225);
INSERT INTO tb_cidades VALUES (3399, 'Marialva', 411480, 18, 31959, 67.2, 'marialvense', 475.565);
INSERT INTO tb_cidades VALUES (3401, 'Marilena', 411500, 18, 6858, 29.51, 'marilenense', 232.368);
INSERT INTO tb_cidades VALUES (5556, 'Sucupira', 172085, 27, 1742, 1.7, 'sucupirense', 1025.517);
INSERT INTO tb_cidades VALUES (3404, 'Mari�polis', 411530, 18, 6268, 27.16, 'mariopolitano ', 230.742);
INSERT INTO tb_cidades VALUES (3406, 'Marmeleiro', 411540, 18, 13900, 35.85, 'marmeleirense', 387.677);
INSERT INTO tb_cidades VALUES (3408, 'Marumbi', 411550, 18, 4603, 22.08, 'marumbiense', 208.47);
INSERT INTO tb_cidades VALUES (3409, 'Matel�ndia', 411560, 18, 16078, 25.13, 'matelandiense', 639.748);
INSERT INTO tb_cidades VALUES (3411, 'Mato Rico', 411573, 18, 3818, 9.68, 'mato-riquense', 394.534);
INSERT INTO tb_cidades VALUES (3413, 'Medianeira', 411580, 18, 41817, 127.21, 'medianeirense', 328.733);
INSERT INTO tb_cidades VALUES (3415, 'Mirador', 411590, 18, 2327, 10.5, 'miradorense', 221.708);
INSERT INTO tb_cidades VALUES (3416, 'Miraselva', 411600, 18, 1862, 20.62, 'miraselvano ', 90.294);
INSERT INTO tb_cidades VALUES (3418, 'Moreira Sales', 411610, 18, 12606, 35.63, 'moreira-salense ', 353.773);
INSERT INTO tb_cidades VALUES (3420, 'Munhoz De Melo', 411630, 18, 3672, 26.8, 'munhozense', 137.018);
INSERT INTO tb_cidades VALUES (3422, 'Nova Alian�a Do Iva�', 411650, 18, 1431, 10.9, 'ivaiense', 131.272);
INSERT INTO tb_cidades VALUES (3424, 'Nova Aurora', 411670, 18, 11866, 25.03, 'nova-aurorense ', 474.013);
INSERT INTO tb_cidades VALUES (3425, 'Nova Cantu', 411680, 18, 7425, 13.37, 'nova-cantuense', 555.489);
INSERT INTO tb_cidades VALUES (3427, 'Nova Esperan�a Do Sudoeste', 411695, 18, 5098, 24.45, 'novaesperancense', 208.472);
INSERT INTO tb_cidades VALUES (3429, 'Nova Laranjeiras', 411705, 18, 11241, 9.81, 'nova laranjeirense', 1145.492);
INSERT INTO tb_cidades VALUES (3431, 'Nova Ol�mpia', 411720, 18, 5503, 40.36, 'olimpiense', 136.348);
INSERT INTO tb_cidades VALUES (3432, 'Nova Prata Do Igua�u', 411725, 18, 10377, 29.43, 'pratense', 352.566);
INSERT INTO tb_cidades VALUES (3434, 'Nova Santa Rosa', 411722, 18, 7626, 37.26, 'nova-santa-rosense  ', 204.666);
INSERT INTO tb_cidades VALUES (3435, 'Nova Tebas', 411727, 18, 7398, 13.56, 'nova-tebense', 545.687);
INSERT INTO tb_cidades VALUES (3437, 'Ortigueira', 411730, 18, 23380, 9.62, 'ortigueirense', 2429.569);
INSERT INTO tb_cidades VALUES (3439, 'Ouro Verde Do Oeste', 411745, 18, 5692, 19.42, 'ouro-verdense', 293.043);
INSERT INTO tb_cidades VALUES (3441, 'Palmas', 411760, 18, 42888, 27.36, 'palmense', 1567.365);
INSERT INTO tb_cidades VALUES (3442, 'Palmeira', 411770, 18, 32123, 22.04, 'palmeirense', 1457.26);
INSERT INTO tb_cidades VALUES (3444, 'Palotina', 411790, 18, 28683, 44.04, 'palotinense', 651.239);
INSERT INTO tb_cidades VALUES (3446, 'Paranacity', 411810, 18, 10250, 29.4, 'paranacitense', 348.631);
INSERT INTO tb_cidades VALUES (3448, 'Paranapoema', 411830, 18, 2791, 15.87, 'paranapoemense', 175.875);
INSERT INTO tb_cidades VALUES (3449, 'Paranava�', 411840, 18, 81590, 67.86, 'paranavaiense', 1202.268);
INSERT INTO tb_cidades VALUES (3451, 'Pato Branco', 411850, 18, 72370, 134.24, 'pato-branquense', 539.089);
INSERT INTO tb_cidades VALUES (3453, 'Paulo Frontin', 411870, 18, 6913, 18.72, 'frontinense ', 369.212);
INSERT INTO tb_cidades VALUES (3455, 'Perobal', 411885, 18, 5653, 13.87, 'perobalense', 407.581);
INSERT INTO tb_cidades VALUES (3456, 'P�rola', 411890, 18, 10208, 42.42, 'perolense', 240.635);
INSERT INTO tb_cidades VALUES (3458, 'Pi�n', 411910, 18, 11236, 44.08, 'pienense', 254.903);
INSERT INTO tb_cidades VALUES (3460, 'Pinhal De S�o Bento', 411925, 18, 2625, 26.93, 'pinhalense', 97.464);
INSERT INTO tb_cidades VALUES (3462, 'Pinh�o', 411930, 18, 30208, 15.09, 'pinh�oense', 2001.593);
INSERT INTO tb_cidades VALUES (3463, 'Pira� Do Sul', 411940, 18, 23424, 16.69, 'piraiense', 1403.068);
INSERT INTO tb_cidades VALUES (3465, 'Pitanga', 411960, 18, 32638, 19.62, 'pitanguense', 1663.751);
INSERT INTO tb_cidades VALUES (3467, 'Planaltina Do Paran�', 411970, 18, 4095, 11.5, 'planaltinense', 356.192);
INSERT INTO tb_cidades VALUES (3469, 'Ponta Grossa', 411990, 18, 311611, 150.72, 'ponta-grossense', 2067.551);
INSERT INTO tb_cidades VALUES (3470, 'Pontal Do Paran�', 411995, 18, 20920, 104.67, 'pontalense', 199.873);
INSERT INTO tb_cidades VALUES (3472, 'Porto Amazonas', 412010, 18, 4514, 24.19, 'porto-amazonense', 186.581);
INSERT INTO tb_cidades VALUES (3474, 'Porto Rico', 412020, 18, 2530, 11.62, 'porto-riquense ', 217.676);
INSERT INTO tb_cidades VALUES (3476, 'Prado Ferreira', 412033, 18, 3434, 22.39, 'prado ferreirense', 153.399);
INSERT INTO tb_cidades VALUES (3477, 'Pranchita', 412035, 18, 5628, 24.92, 'pranchitano', 225.842);
INSERT INTO tb_cidades VALUES (3479, 'Primeiro De Maio', 412050, 18, 10832, 26.14, 'primaiense', 414.442);
INSERT INTO tb_cidades VALUES (3481, 'Quarto Centen�rio', 412065, 18, 4856, 15.09, 'quarto centenariense', 321.876);
INSERT INTO tb_cidades VALUES (3483, 'Quatro Barras', 412080, 18, 19851, 109.59, 'quatro-barrense ', 181.131);
INSERT INTO tb_cidades VALUES (3485, 'Quedas Do Igua�u', 412090, 18, 30605, 37.25, 'quedas-igua�uense-', 821.505);
INSERT INTO tb_cidades VALUES (3486, 'Quer�ncia Do Norte', 412100, 18, 11729, 12.82, 'querenciano', 914.765);
INSERT INTO tb_cidades VALUES (3488, 'Quitandinha', 412120, 18, 17089, 38.23, 'quitandinhense', 447.025);
INSERT INTO tb_cidades VALUES (3490, 'Rancho Alegre', 412130, 18, 3955, 23.59, 'alegrense', 167.646);
INSERT INTO tb_cidades VALUES (3492, 'Realeza', 412140, 18, 16338, 46.23, 'realezense', 353.417);
INSERT INTO tb_cidades VALUES (3493, 'Rebou�as', 412150, 18, 14176, 29.42, 'reboucense', 481.841);
INSERT INTO tb_cidades VALUES (3495, 'Reserva', 412170, 18, 25172, 15.4, 'reservense', 1634.954);
INSERT INTO tb_cidades VALUES (3497, 'Ribeir�o Claro', 412180, 18, 10678, 16.97, 'ribeir�o-clarense', 629.224);
INSERT INTO tb_cidades VALUES (3499, 'Rio Azul', 412200, 18, 14093, 22.38, 'rio-azulense', 629.747);
INSERT INTO tb_cidades VALUES (3500, 'Rio Bom', 412210, 18, 3334, 18.75, 'rio-bonense', 177.836);
INSERT INTO tb_cidades VALUES (3502, 'Rio Branco Do Iva�', 412217, 18, 3898, 10.2, 'riobranquense', 382.329);
INSERT INTO tb_cidades VALUES (3503, 'Rio Branco Do Sul', 412220, 18, 30650, 37.73, 'rio-branquense', 812.327);
INSERT INTO tb_cidades VALUES (3505, 'Rol�ndia', 412240, 18, 57862, 125.74, 'rolandense', 460.165);
INSERT INTO tb_cidades VALUES (3507, 'Rondon', 412260, 18, 8996, 16.18, 'rondonense', 556.088);
INSERT INTO tb_cidades VALUES (3509, 'Sab�udia', 412270, 18, 6096, 32.03, 'sabaudiense', 190.325);
INSERT INTO tb_cidades VALUES (3510, 'Salgado Filho', 412280, 18, 4403, 23.26, 'salgadense', 189.316);
INSERT INTO tb_cidades VALUES (3512, 'Salto Do Lontra', 412300, 18, 13689, 43.77, 'salto-lontrense ', 312.718);
INSERT INTO tb_cidades VALUES (3514, 'Santa Cec�lia Do Pav�o', 412320, 18, 3646, 33.09, 'pavonense', 110.2);
INSERT INTO tb_cidades VALUES (3516, 'Santa F�', 412340, 18, 10432, 37.76, 'santa-feense', 276.242);
INSERT INTO tb_cidades VALUES (3517, 'Santa Helena', 412350, 18, 23413, 30.88, 'santa-helenense', 758.229);
INSERT INTO tb_cidades VALUES (3519, 'Santa Isabel Do Iva�', 412370, 18, 8760, 25.06, 'santa-isabelense ', 349.498);
INSERT INTO tb_cidades VALUES (3521, 'Santa L�cia', 412382, 18, 3925, 33.59, 'santaluciense', 116.858);
INSERT INTO tb_cidades VALUES (3522, 'Santa Maria Do Oeste', 412385, 18, 11500, 13.58, 'santa-mariense', 847.139);
INSERT INTO tb_cidades VALUES (3524, 'Santa M�nica', 412395, 18, 3571, 13.74, 'moniquense', 259.957);
INSERT INTO tb_cidades VALUES (3526, 'Santa Terezinha De Itaipu', 412405, 18, 20841, 80.34, 'terezinhense', 259.394);
INSERT INTO tb_cidades VALUES (3529, 'Santo Ant�nio Do Caiu�', 412420, 18, 2727, 12.45, 'santo-antoniense', 219.069);
INSERT INTO tb_cidades VALUES (3530, 'Santo Ant�nio Do Para�so', 412430, 18, 2408, 14.51, 'santo-antoniense', 165.904);
INSERT INTO tb_cidades VALUES (3532, 'Santo In�cio', 412450, 18, 5269, 17.17, 'santo-inaciense', 306.871);
INSERT INTO tb_cidades VALUES (3534, 'S�o Jer�nimo Da Serra', 412470, 18, 11337, 13.76, 'jeronimense', 823.776);
INSERT INTO tb_cidades VALUES (3535, 'S�o Jo�o', 412480, 18, 10599, 27.31, 's�o-joanense ', 388.06);
INSERT INTO tb_cidades VALUES (3537, 'S�o Jo�o Do Iva�', 412500, 18, 11525, 32.62, 's�o-joanense', 353.332);
INSERT INTO tb_cidades VALUES (3538, 'S�o Jo�o Do Triunfo', 412510, 18, 13704, 19.02, 'triunfense', 720.409);
INSERT INTO tb_cidades VALUES (3540, 'S�o Jorge Do Iva�', 412530, 18, 5517, 17.51, 's�o-jorgense ', 315.089);
INSERT INTO tb_cidades VALUES (3542, 'S�o Jos� Da Boa Vista', 412540, 18, 6511, 16.29, 'boa-vistense', 399.668);
INSERT INTO tb_cidades VALUES (3543, 'S�o Jos� Das Palmeiras', 412545, 18, 3830, 21, 's�o-joseliense', 182.419);
INSERT INTO tb_cidades VALUES (3545, 'S�o Manoel Do Paran�', 412555, 18, 2098, 22, 's�o manoelense', 95.382);
INSERT INTO tb_cidades VALUES (3546, 'S�o Mateus Do Sul', 412560, 18, 41257, 30.73, 's�o-mateuense', 1342.637);
INSERT INTO tb_cidades VALUES (3548, 'S�o Pedro Do Igua�u', 412575, 18, 6491, 21.05, 'S�o pedrense', 308.329);
INSERT INTO tb_cidades VALUES (3550, 'S�o Pedro Do Paran�', 412590, 18, 2491, 9.94, 's�o-pedrense', 250.654);
INSERT INTO tb_cidades VALUES (3552, 'S�o Tom�', 412610, 18, 5349, 24.47, 's�o-tomeense', 218.624);
INSERT INTO tb_cidades VALUES (3553, 'Sapopema', 412620, 18, 6736, 9.94, 'sapopemense', 677.611);
INSERT INTO tb_cidades VALUES (3555, 'Saudade Do Igua�u', 412627, 18, 5028, 33.06, 'saudadense', 152.085);
INSERT INTO tb_cidades VALUES (3556, 'Seng�s', 412630, 18, 18414, 12.81, 'sengeano', 1437.366);
INSERT INTO tb_cidades VALUES (3558, 'Sertaneja', 412640, 18, 5817, 13.09, 'sertanejano ', 444.493);
INSERT INTO tb_cidades VALUES (3560, 'Siqueira Campos', 412660, 18, 18454, 66.37, 'siqueirense', 278.035);
INSERT INTO tb_cidades VALUES (3561, 'Sulina', 412665, 18, 3394, 19.88, 'sulinense', 170.76);
INSERT INTO tb_cidades VALUES (3563, 'Tamboara', 412670, 18, 4664, 24.12, 'tamboarense', 193.348);
INSERT INTO tb_cidades VALUES (3565, 'Tapira', 412690, 18, 5836, 13.44, 'tapirense', 434.372);
INSERT INTO tb_cidades VALUES (3567, 'Tel�maco Borba', 412710, 18, 69872, 50.53, 'tel�maco-borbense ', 1382.863);
INSERT INTO tb_cidades VALUES (3568, 'Terra Boa', 412720, 18, 15776, 49.17, 'terra-bonense', 320.851);
INSERT INTO tb_cidades VALUES (3570, 'Terra Roxa', 412740, 18, 16759, 20.93, 'terra-roxense', 800.809);
INSERT INTO tb_cidades VALUES (3572, 'Tijucas Do Sul', 412760, 18, 14537, 21.63, 'tijucano-do-sul ', 672.202);
INSERT INTO tb_cidades VALUES (3574, 'Tomazina', 412780, 18, 8791, 14.86, 'tomazinense', 591.439);
INSERT INTO tb_cidades VALUES (3576, 'Tunas Do Paran�', 412788, 18, 6256, 9.36, 'tunense', 668.479);
INSERT INTO tb_cidades VALUES (3577, 'Tuneiras Do Oeste', 412790, 18, 8695, 12.44, 'tuneirense', 698.872);
INSERT INTO tb_cidades VALUES (3579, 'Turvo', 412796, 18, 13811, 15.07, 'turvense', 916.487);
INSERT INTO tb_cidades VALUES (3581, 'Umuarama', 412810, 18, 100676, 81.67, 'umuaramense', 1232.77);
INSERT INTO tb_cidades VALUES (3583, 'Uniflor', 412830, 18, 2466, 26.01, 'uniflorense', 94.82);
INSERT INTO tb_cidades VALUES (3584, 'Ura�', 412840, 18, 11472, 48.24, 'uraiense', 237.81);
INSERT INTO tb_cidades VALUES (3586, 'Vera Cruz Do Oeste', 412855, 18, 8973, 27.43, 'vera-cruzense', 327.091);
INSERT INTO tb_cidades VALUES (3588, 'Virmond', 412865, 18, 3950, 16.24, 'virmondense', 243.174);
INSERT INTO tb_cidades VALUES (3589, 'Vitorino', 412870, 18, 6513, 21.13, 'vitorinense', 308.276);
INSERT INTO tb_cidades VALUES (3591, 'Xambr�', 412880, 18, 6012, 16.71, 'xambrense', 359.713);
INSERT INTO tb_cidades VALUES (3593, 'Aperib�', 330015, 19, 10213, 107.92, 'aperibeense', 94.635);
INSERT INTO tb_cidades VALUES (3594, 'Araruama', 330020, 19, 112008, 175.55, 'araruamense', 638.023);
INSERT INTO tb_cidades VALUES (3596, 'Arma��o Dos B�zios', 330023, 19, 27560, 392.16, 'buziano', 70.278);
INSERT INTO tb_cidades VALUES (3598, 'Barra Do Pira�', 330030, 19, 94778, 163.7, 'barrense', 578.965);
INSERT INTO tb_cidades VALUES (3600, 'Belford Roxo', 330045, 19, 469332, 6.031, 'belford-roxense', 77.815);
INSERT INTO tb_cidades VALUES (3601, 'Bom Jardim', 330050, 19, 25333, 65.86, 'bom-jardinense', 384.639);
INSERT INTO tb_cidades VALUES (3603, 'Cabo Frio', 330070, 19, 186227, 453.75, 'cabo-friense', 410.415);
INSERT INTO tb_cidades VALUES (3605, 'Cambuci', 330090, 19, 14827, 26.4, 'cambuciense', 561.698);
INSERT INTO tb_cidades VALUES (3606, 'Campos Dos Goytacazes', 330100, 19, 463731, 115.16, 'campista', 4026.712);
INSERT INTO tb_cidades VALUES (3608, 'Carapebus', 330093, 19, 13359, 43.36, 'carapebuense', 308.127);
INSERT INTO tb_cidades VALUES (3610, 'Carmo', 330120, 19, 17434, 54.07, 'carmense', 322.415);
INSERT INTO tb_cidades VALUES (3611, 'Casimiro De Abreu', 330130, 19, 35347, 76.71, 'casimirense', 460.773);
INSERT INTO tb_cidades VALUES (3613, 'Concei��o De Macabu', 330140, 19, 21211, 61.08, 'macabuense', 347.272);
INSERT INTO tb_cidades VALUES (3615, 'Duas Barras', 330160, 19, 10930, 29.14, 'bibarrense', 375.126);
INSERT INTO tb_cidades VALUES (3617, 'Engenheiro Paulo De Frontin', 330180, 19, 13237, 99.57, 'fronteense', 132.936);
INSERT INTO tb_cidades VALUES (3618, 'Guapimirim', 330185, 19, 51483, 142.7, 'guapimiriense', 360.766);
INSERT INTO tb_cidades VALUES (3620, 'Itabora�', 330190, 19, 218008, 506.56, 'itaboraiense', 430.373);
INSERT INTO tb_cidades VALUES (3621, 'Itagua�', 330200, 19, 109091, 395.45, 'itaguaiense', 275.867);
INSERT INTO tb_cidades VALUES (3623, 'Itaocara', 330210, 19, 22899, 53.09, 'itaocarense', 431.335);
INSERT INTO tb_cidades VALUES (3625, 'Itatiaia', 330225, 19, 28783, 117.41, 'itatiaiense', 245.146);
INSERT INTO tb_cidades VALUES (3627, 'Laje Do Muria�', 330230, 19, 7487, 29.95, 'lajense', 249.974);
INSERT INTO tb_cidades VALUES (3628, 'Maca�', 330240, 19, 206728, 169.89, 'macaense', 1216.845);
INSERT INTO tb_cidades VALUES (3630, 'Mag�', 330250, 19, 227322, 585.13, 'mageense', 388.496);
INSERT INTO tb_cidades VALUES (3632, 'Maric�', 330270, 19, 127461, 351.55, 'maricaense', 362.571);
INSERT INTO tb_cidades VALUES (3634, 'Mesquita', 330285, 19, 168376, 4.31, 'mesquitnese', 39.062);
INSERT INTO tb_cidades VALUES (3636, 'Miracema', 330300, 19, 26843, 88.15, 'miracemense', 304.515);
INSERT INTO tb_cidades VALUES (3637, 'Natividade', 330310, 19, 15082, 39, 'natividadense', 386.74);
INSERT INTO tb_cidades VALUES (3639, 'Niter�i', 330330, 19, 487562, 3.64, 'niteroiense', 133.916);
INSERT INTO tb_cidades VALUES (3641, 'Nova Igua�u', 330350, 19, 796257, 1.527, 'igua�uano', 521.247);
INSERT INTO tb_cidades VALUES (3642, 'Paracambi', 330360, 19, 47124, 262.27, 'paracambiense', 179.68);
INSERT INTO tb_cidades VALUES (3644, 'Parati', 330380, 19, 37533, 40.57, 'paratiense', 925.053);
INSERT INTO tb_cidades VALUES (3646, 'Petr�polis', 330390, 19, 295917, 371.85, 'petropolitano', 795.798);
INSERT INTO tb_cidades VALUES (3648, 'Pira�', 330400, 19, 26314, 52.07, 'piraiense', 505.374);
INSERT INTO tb_cidades VALUES (3649, 'Porci�ncula', 330410, 19, 17760, 58.8, 'porciunculense', 302.024);
INSERT INTO tb_cidades VALUES (3653, 'Quissam�', 330415, 19, 20242, 28.4, 'quissamaense', 712.852);
INSERT INTO tb_cidades VALUES (3655, 'Rio Bonito', 330430, 19, 55551, 121.7, 'rio-bonitense', 456.455);
INSERT INTO tb_cidades VALUES (3657, 'Rio Das Flores', 330450, 19, 8561, 17.9, 'rio-florense ', 478.312);
INSERT INTO tb_cidades VALUES (3659, 'Rio De Janeiro', 330455, 19, 6320446, 5.265, 'carioca', 1200.279);
INSERT INTO tb_cidades VALUES (3660, 'Santa Maria Madalena', 330460, 19, 10321, 12.67, 'madalenense', 814.763);
INSERT INTO tb_cidades VALUES (3662, 'S�o Fid�lis', 330480, 19, 37543, 36.39, 'fidelense', 1031.558);
INSERT INTO tb_cidades VALUES (3664, 'S�o Gon�alo', 330490, 19, 999728, 4.035, 'gon�alense', 247.709);
INSERT INTO tb_cidades VALUES (3665, 'S�o Jo�o Da Barra', 330500, 19, 32747, 71.96, 's�o-joanense', 455.044);
INSERT INTO tb_cidades VALUES (3667, 'S�o Jos� De Ub�', 330513, 19, 7003, 27.98, 'ubaense', 250.28);
INSERT INTO tb_cidades VALUES (3668, 'S�o Jos� Do Vale Do Rio Preto', 330515, 19, 20251, 91.87, 'rio-pretano', 220.432);
INSERT INTO tb_cidades VALUES (3670, 'S�o Sebasti�o Do Alto', 330530, 19, 8895, 22.36, 'altense', 397.897);
INSERT INTO tb_cidades VALUES (3671, 'Sapucaia', 330540, 19, 17525, 32.38, 'sapucaiense', 541.239);
INSERT INTO tb_cidades VALUES (3673, 'Serop�dica', 330555, 19, 78186, 275.53, 'seropediquense', 283.762);
INSERT INTO tb_cidades VALUES (3675, 'Sumidouro', 330570, 19, 14900, 37.67, 'sumidourense', 395.516);
INSERT INTO tb_cidades VALUES (3676, 'Tangu�', 330575, 19, 30732, 211.21, 'tanguaense', 145.503);
INSERT INTO tb_cidades VALUES (3678, 'Trajano De Moraes', 330590, 19, 10289, 17.44, 'trajanense', 589.811);
INSERT INTO tb_cidades VALUES (3680, 'Valen�a', 330610, 19, 71843, 55.06, 'valenciano', 1304.813);
INSERT INTO tb_cidades VALUES (3681, 'Varre Sai', 330615, 19, 9475, 49.85, 'varresaiense', 190.061);
INSERT INTO tb_cidades VALUES (3684, 'Acari', 240010, 20, 11035, 18.13, 'acariense', 608.568);
INSERT INTO tb_cidades VALUES (3685, 'A�u', 240020, 20, 53227, 40.84, 'a�uense', 1303.437);
INSERT INTO tb_cidades VALUES (3687, '�gua Nova', 240040, 20, 2980, 58.8, '�gua-novense', 50.684);
INSERT INTO tb_cidades VALUES (3688, 'Alexandria', 240050, 20, 13507, 35.43, 'alexandrinense', 381.203);
INSERT INTO tb_cidades VALUES (3690, 'Alto Do Rodrigues', 240070, 20, 12305, 64.31, 'alto-rodriguense', 191.327);
INSERT INTO tb_cidades VALUES (3692, 'Ant�nio Martins', 240090, 20, 6907, 28.24, 'ant�nio-martinense', 244.624);
INSERT INTO tb_cidades VALUES (3694, 'Areia Branca', 240110, 20, 25315, 70.79, 'areia-branquense', 357.623);
INSERT INTO tb_cidades VALUES (3696, 'Augusto Severo', 240130, 20, 9289, 10.36, 'augusto-severense', 896.949);
INSERT INTO tb_cidades VALUES (3698, 'Bara�na', 240145, 20, 24182, 29.29, 'baraunense', 825.701);
INSERT INTO tb_cidades VALUES (3699, 'Barcelona', 240150, 20, 3950, 25.88, 'barcelonense', 152.625);
INSERT INTO tb_cidades VALUES (3701, 'Bod�', 240165, 20, 2425, 9.57, 'bodoense', 253.517);
INSERT INTO tb_cidades VALUES (3703, 'Brejinho', 240180, 20, 11577, 188.07, 'brejinense', 61.558);
INSERT INTO tb_cidades VALUES (3705, 'Cai�ara Do Rio Do Vento', 240190, 20, 3308, 12.67, 'cai�arense-do-rio-do-vento', 261.192);
INSERT INTO tb_cidades VALUES (3706, 'Caic�', 240200, 20, 62709, 51.04, 'caicoense', 1228.576);
INSERT INTO tb_cidades VALUES (3708, 'Canguaretama', 240220, 20, 30916, 125.98, 'canguaretamense', 245.406);
INSERT INTO tb_cidades VALUES (3710, 'Carna�ba Dos Dantas', 240240, 20, 7429, 30.24, 'carnaubense', 245.649);
INSERT INTO tb_cidades VALUES (3712, 'Cear� Mirim', 240260, 20, 68141, 94.07, 'cear�-miriense', 724.377);
INSERT INTO tb_cidades VALUES (3713, 'Cerro Cor�', 240270, 20, 10916, 27.74, 'cerro-coraense', 393.572);
INSERT INTO tb_cidades VALUES (3715, 'Coronel Jo�o Pessoa', 240290, 20, 4772, 40.74, 'pessoense', 117.138);
INSERT INTO tb_cidades VALUES (3717, 'Currais Novos', 240310, 20, 42652, 49.35, 'currais-novense', 864.344);
INSERT INTO tb_cidades VALUES (3719, 'Encanto', 240330, 20, 5231, 41.6, 'encantense', 125.748);
INSERT INTO tb_cidades VALUES (3720, 'Equador', 240340, 20, 5822, 21.97, 'equatoriano', 264.984);
INSERT INTO tb_cidades VALUES (3722, 'Extremoz', 240360, 20, 24569, 176.03, 'extremozense', 139.569);
INSERT INTO tb_cidades VALUES (3724, 'Fernando Pedroza', 240375, 20, 2854, 8.85, 'fernando-pedrozense', 322.626);
INSERT INTO tb_cidades VALUES (3726, 'Francisco Dantas', 240390, 20, 2874, 15.83, 'francisco-dantense', 181.557);
INSERT INTO tb_cidades VALUES (3728, 'Galinhos', 240410, 20, 2159, 6.31, 'galinhense', 342.213);
INSERT INTO tb_cidades VALUES (3729, 'Goianinha', 240420, 20, 22481, 116.92, 'goianiense', 192.278);
INSERT INTO tb_cidades VALUES (3731, 'Grossos', 240440, 20, 9393, 74.28, 'grossense', 126.457);
INSERT INTO tb_cidades VALUES (3732, 'Guamar�', 240450, 20, 12404, 47.9, 'guamareense', 258.962);
INSERT INTO tb_cidades VALUES (3734, 'Ipangua�u', 240470, 20, 13856, 37.02, 'ipangua�uense', 374.236);
INSERT INTO tb_cidades VALUES (3736, 'Itaj�', 240485, 20, 6932, 34.04, 'itajaense', 203.621);
INSERT INTO tb_cidades VALUES (3738, 'Ja�an�', 240500, 20, 7925, 145.25, 'ja�an�ense', 54.56);
INSERT INTO tb_cidades VALUES (3739, 'Janda�ra', 240510, 20, 6801, 15.6, 'jandairense', 435.945);
INSERT INTO tb_cidades VALUES (3741, 'Janu�rio Cicco', 240530, 20, 9011, 48.13, 'januarense', 187.228);
INSERT INTO tb_cidades VALUES (3743, 'Jardim De Angicos', 240550, 20, 2607, 10.26, 'jardim-angicanense', 254.02);
INSERT INTO tb_cidades VALUES (3745, 'Jardim Do Serid�', 240570, 20, 12113, 32.86, 'jardinense', 368.645);
INSERT INTO tb_cidades VALUES (3747, 'Jo�o Dias', 240590, 20, 2601, 29.5, 'jo�o-diense', 88.172);
INSERT INTO tb_cidades VALUES (3748, 'Jos� Da Penha', 240600, 20, 5868, 49.88, 'jos�-penhense', 117.634);
INSERT INTO tb_cidades VALUES (3750, 'Jundi�', 240615, 20, 3582, 80.24, '', 44.641);
INSERT INTO tb_cidades VALUES (3752, 'Lagoa De Pedras', 240630, 20, 6989, 59.4, 'lagoa-dantense', 117.663);
INSERT INTO tb_cidades VALUES (3753, 'Lagoa De Velhos', 240640, 20, 2668, 23.64, 'lagoa-pedrense', 112.844);
INSERT INTO tb_cidades VALUES (3755, 'Lagoa Salgada', 240660, 20, 7564, 95.37, 'lagoa-salgadense', 79.313);
INSERT INTO tb_cidades VALUES (3757, 'Lajes Pintadas', 240680, 20, 4612, 35.42, 'lajes-pintadense', 130.211);
INSERT INTO tb_cidades VALUES (3759, 'Lu�s Gomes', 240700, 20, 9610, 57.67, 'lu�s-gomense', 166.637);
INSERT INTO tb_cidades VALUES (3761, 'Macau', 240720, 20, 28954, 36.74, 'macauense', 788.027);
INSERT INTO tb_cidades VALUES (3762, 'Major Sales', 240725, 20, 3536, 110.6, 'major-salense', 31.971);
INSERT INTO tb_cidades VALUES (3764, 'Martins', 240740, 20, 8218, 48.49, 'martinense', 169.463);
INSERT INTO tb_cidades VALUES (3766, 'Messias Targino', 240760, 20, 4188, 31, 'messias-targinense', 135.096);
INSERT INTO tb_cidades VALUES (3768, 'Monte Alegre', 240780, 20, 20685, 97.87, 'monte-alegrense', 211.341);
INSERT INTO tb_cidades VALUES (3770, 'Mossor�', 240800, 20, 259815, 123.76, 'mossoroense', 2099.328);
INSERT INTO tb_cidades VALUES (3771, 'Natal', 240810, 20, 803739, 4.808, 'natalense', 167.16);
INSERT INTO tb_cidades VALUES (3773, 'Nova Cruz', 240830, 20, 35490, 127.82, 'nova-cruzense', 277.657);
INSERT INTO tb_cidades VALUES (3775, 'Ouro Branco', 240850, 20, 4699, 18.55, 'ouro-branquense', 253.302);
INSERT INTO tb_cidades VALUES (3776, 'Paran�', 240860, 20, 3952, 48.56, 'paranaense', 81.39);
INSERT INTO tb_cidades VALUES (3779, 'Parelhas', 240890, 20, 20354, 39.67, 'parelhense', 513.053);
INSERT INTO tb_cidades VALUES (3781, 'Passa E Fica', 240910, 20, 11100, 263.43, 'passa-fiquense', 42.136);
INSERT INTO tb_cidades VALUES (3783, 'Patu', 240930, 20, 11964, 37.49, 'patuense', 319.127);
INSERT INTO tb_cidades VALUES (3785, 'Pedra Grande', 240950, 20, 3521, 15.9, 'pedra-grandense', 221.426);
INSERT INTO tb_cidades VALUES (3786, 'Pedra Preta', 240960, 20, 2590, 8.78, 'pedra-pretense', 294.983);
INSERT INTO tb_cidades VALUES (3788, 'Pedro Velho', 240980, 20, 14114, 73.24, 'pedro-velhense', 192.707);
INSERT INTO tb_cidades VALUES (3789, 'Pend�ncias', 240990, 20, 13432, 32.05, 'pendenciano ', 419.143);
INSERT INTO tb_cidades VALUES (3792, 'Portalegre', 241020, 20, 7320, 66.51, 'portalegrense', 110.053);
INSERT INTO tb_cidades VALUES (3793, 'Porto Do Mangue', 241025, 20, 5217, 16.36, 'porto-manguense', 318.966);
INSERT INTO tb_cidades VALUES (3795, 'Pureza', 241040, 20, 8424, 16.7, 'purezense', 504.293);
INSERT INTO tb_cidades VALUES (3796, 'Rafael Fernandes', 241050, 20, 4692, 59.98, 'rafael-fernandense', 78.23);
INSERT INTO tb_cidades VALUES (3798, 'Riacho Da Cruz', 241070, 20, 3165, 24.88, 'riacho-cruzense', 127.222);
INSERT INTO tb_cidades VALUES (3800, 'Riachuelo', 241090, 20, 7067, 26.88, 'riachuelense', 262.886);
INSERT INTO tb_cidades VALUES (3801, 'Rio Do Fogo', 240895, 20, 10059, 66.94, 'rio-foguense', 150.26);
INSERT INTO tb_cidades VALUES (3803, 'Ruy Barbosa', 241110, 20, 3595, 28.58, 'rui-barbosense', 125.808);
INSERT INTO tb_cidades VALUES (3805, 'Santa Maria', 240933, 20, 4762, 21.69, 'santa-mariense', 219.567);
INSERT INTO tb_cidades VALUES (3807, 'Santana Do Serid�', 241142, 20, 2526, 13.41, 'santanense', 188.403);
INSERT INTO tb_cidades VALUES (3809, 'S�o Bento Do Norte', 241160, 20, 2975, 10.3, 's�o-bento-nortense', 288.724);
INSERT INTO tb_cidades VALUES (3810, 'S�o Bento Do Trair�', 241170, 20, 3905, 20.46, 'trairiense', 190.817);
INSERT INTO tb_cidades VALUES (3812, 'S�o Francisco Do Oeste', 241190, 20, 3874, 51.25, 'oestense', 75.587);
INSERT INTO tb_cidades VALUES (3814, 'S�o Jo�o Do Sabugi', 241210, 20, 5922, 21.38, 'sabugiense', 277.01);
INSERT INTO tb_cidades VALUES (3815, 'S�o Jos� De Mipibu', 241220, 20, 39776, 137, 'mipibuense', 290.329);
INSERT INTO tb_cidades VALUES (3817, 'S�o Jos� Do Serid�', 241240, 20, 4231, 24.25, 's�o-jos�-seridoense ', 174.504);
INSERT INTO tb_cidades VALUES (3819, 'S�o Miguel Do  Gostoso', 241255, 20, 8670, 25.35, 'micaelense de touros', 342.037);
INSERT INTO tb_cidades VALUES (3821, 'S�o Pedro', 241270, 20, 6235, 31.94, 's�o-pedrense', 195.237);
INSERT INTO tb_cidades VALUES (3822, 'S�o Rafael', 241280, 20, 8111, 17.29, 's�o-rafaelense ', 469.099);
INSERT INTO tb_cidades VALUES (3824, 'S�o Vicente', 241300, 20, 6028, 30.47, 's�o-vicentense ', 197.816);
INSERT INTO tb_cidades VALUES (3826, 'Senador Georgino Avelino', 241320, 20, 3924, 151.31, 'georginense', 25.934);
INSERT INTO tb_cidades VALUES (3827, 'Serra De S�o Bento', 241330, 20, 5743, 59.43, 'serra-bentense ', 96.627);
INSERT INTO tb_cidades VALUES (3829, 'Serra Negra Do Norte', 241340, 20, 7770, 13.82, 'serra-negrense-do-norte', 562.394);
INSERT INTO tb_cidades VALUES (3831, 'Serrinha Dos Pintos', 241355, 20, 4540, 37.02, 'serriense dos pintos', 122.648);
INSERT INTO tb_cidades VALUES (3833, 'S�tio Novo', 241370, 20, 5020, 23.52, 's�tio-novense', 213.458);
INSERT INTO tb_cidades VALUES (3834, 'Taboleiro Grande', 241380, 20, 2317, 18.67, 'taboleirense', 124.093);
INSERT INTO tb_cidades VALUES (3836, 'Tangar�', 241400, 20, 14175, 39.72, 'tangarense', 356.832);
INSERT INTO tb_cidades VALUES (3838, 'Tenente Laurentino Cruz', 241415, 20, 5406, 72.68, 'tenente-laurentinense', 74.376);
INSERT INTO tb_cidades VALUES (3840, 'Tibau Do Sul', 241420, 20, 11385, 111.81, 'tibauense', 101.821);
INSERT INTO tb_cidades VALUES (3842, 'Touros', 241440, 20, 31089, 36.99, 'tourense', 840.375);
INSERT INTO tb_cidades VALUES (3843, 'Triunfo Potiguar', 241445, 20, 3368, 12.53, 'triunfense potiguar', 268.725);
INSERT INTO tb_cidades VALUES (3845, 'Upanema', 241460, 20, 12992, 14.87, 'upanemense', 873.926);
INSERT INTO tb_cidades VALUES (3847, 'Venha Ver', 241475, 20, 3821, 53.35, 'venha-verense', 71.622);
INSERT INTO tb_cidades VALUES (3848, 'Vera Cruz', 241480, 20, 10719, 128.43, 'vera-cruzense', 83.463);
INSERT INTO tb_cidades VALUES (3850, 'Vila Flor', 241500, 20, 2872, 60.27, 'vila-florense', 47.656);
INSERT INTO tb_cidades VALUES (3852, 'Alto Alegre Dos Parecis', 110037, 21, 12816, 3.24, 'alto-alegrense', 3958.279);
INSERT INTO tb_cidades VALUES (3854, 'Alvorada D`Oeste', 110034, 21, 16853, 5.56, 'alvoradense', 3029.193);
INSERT INTO tb_cidades VALUES (3855, 'Ariquemes', 110002, 21, 90353, 20.41, 'ariquemense', 4426.576);
INSERT INTO tb_cidades VALUES (3857, 'Cabixi', 110003, 21, 6313, 4.8, 'cabixiense', 1314.364);
INSERT INTO tb_cidades VALUES (3859, 'Cacoal', 110004, 21, 78574, 20.72, 'cacoaense', 3792.805);
INSERT INTO tb_cidades VALUES (3861, 'Candeias Do Jamari', 110080, 21, 19779, 2.89, 'candeiense', 6843.889);
INSERT INTO tb_cidades VALUES (3862, 'Castanheiras', 110090, 21, 3575, 4, 'castanheirense', 892.843);
INSERT INTO tb_cidades VALUES (3864, 'Chupinguaia', 110092, 21, 8301, 1.62, 'chupinguaiense', 5126.73);
INSERT INTO tb_cidades VALUES (3866, 'Corumbiara', 110007, 21, 8783, 2.87, 'corumbiarense', 3060.326);
INSERT INTO tb_cidades VALUES (3867, 'Costa Marques', 110008, 21, 13678, 2.74, 'costa-marquense', 4987.187);
INSERT INTO tb_cidades VALUES (3869, 'Espig�o D`Oeste', 110009, 21, 28729, 6.36, 'espig�oense', 4518.038);
INSERT INTO tb_cidades VALUES (3871, 'Guajar� Mirim', 110010, 21, 41656, 1.68, 'guajar�-mirense ', 24855.772);
INSERT INTO tb_cidades VALUES (3872, 'Itapu� Do Oeste', 110110, 21, 8566, 2.1, 'jamariense', 4081.587);
INSERT INTO tb_cidades VALUES (3874, 'Ji Paran�', 110012, 21, 116610, 16.91, 'ji-paranaense', 6896.744);
INSERT INTO tb_cidades VALUES (3876, 'Ministro Andreazza', 110120, 21, 10352, 12.97, 'andreazense', 798.084);
INSERT INTO tb_cidades VALUES (3878, 'Monte Negro', 110140, 21, 14091, 7.3, 'monte-negrino', 1931.381);
INSERT INTO tb_cidades VALUES (3879, 'Nova Brasil�ndia D`Oeste', 110014, 21, 19874, 17.2, 'brasilandense', 1155.356);
INSERT INTO tb_cidades VALUES (3881, 'Nova Uni�o', 110143, 21, 7493, 9.28, 'nova-uniense', 807.127);
INSERT INTO tb_cidades VALUES (3883, 'Ouro Preto Do Oeste', 110015, 21, 37928, 19.25, 'ouro-pretense', 1969.852);
INSERT INTO tb_cidades VALUES (3884, 'Parecis', 110145, 21, 4810, 1.89, 'parecisense', 2548.686);
INSERT INTO tb_cidades VALUES (3886, 'Pimenteiras Do Oeste', 110146, 21, 2315, 0.38, 'pimenteirense', 6014.743);
INSERT INTO tb_cidades VALUES (3888, 'Presidente M�dici', 110025, 21, 22319, 12.69, 'mediciense', 1758.467);
INSERT INTO tb_cidades VALUES (3890, 'Rio Crespo', 110026, 21, 3316, 1.93, 'rio-crespense', 1717.642);
INSERT INTO tb_cidades VALUES (3891, 'Rolim De Moura', 110028, 21, 50648, 34.74, 'rolimorense', 1457.889);
INSERT INTO tb_cidades VALUES (3893, 'S�o Felipe D`Oeste', 110148, 21, 6018, 11.11, 's�o-felipense', 541.647);
INSERT INTO tb_cidades VALUES (3895, 'S�o Miguel Do Guapor�', 110032, 21, 21828, 2.73, 'miguelense', 8007.885);
INSERT INTO tb_cidades VALUES (3896, 'Seringueiras', 110150, 21, 11629, 3.08, 'seringueinense', 3773.511);
INSERT INTO tb_cidades VALUES (3898, 'Theobroma', 110160, 21, 10649, 4.85, 'theobromense', 2197.415);
INSERT INTO tb_cidades VALUES (3899, 'Urup�', 110170, 21, 12974, 15.6, 'urupaense', 831.858);
INSERT INTO tb_cidades VALUES (5422, 'Vista Alegre Do Alto', 355690, 26, 6886, 72.5, 'vista-alegrense', 94.981);
INSERT INTO tb_cidades VALUES (3902, 'Vilhena', 110030, 21, 76202, 6.62, 'vilhenense', 11518.952);
INSERT INTO tb_cidades VALUES (3903, 'Alto Alegre', 140005, 22, 16448, 0.64, 'alto-alegrense', 25566.965);
INSERT INTO tb_cidades VALUES (3905, 'Boa Vista', 140010, 22, 284313, 49.99, 'boa-vistense', 5687.022);
INSERT INTO tb_cidades VALUES (3907, 'Cant�', 140017, 22, 13902, 1.81, 'cantaense', 7664.813);
INSERT INTO tb_cidades VALUES (3909, 'Caroebe', 140023, 22, 8114, 0.67, 'caroebense', 12066.188);
INSERT INTO tb_cidades VALUES (3911, 'Mucaja�', 140030, 22, 14792, 1.19, 'mucajaiense', 12461.185);
INSERT INTO tb_cidades VALUES (3912, 'Normandia', 140040, 22, 8940, 1.28, 'normandiense', 6966.793);
INSERT INTO tb_cidades VALUES (3914, 'Rorain�polis', 140047, 22, 24279, 0.72, 'rorainopolitano', 33593.988);
INSERT INTO tb_cidades VALUES (3916, 'S�o Luiz', 140060, 22, 6750, 4.42, 's�o-luizense', 1526.884);
INSERT INTO tb_cidades VALUES (3917, 'Uiramut�', 140070, 22, 8375, 1.04, 'uiramutansense', 8065.54);
INSERT INTO tb_cidades VALUES (3919, '�gua Santa', 430005, 23, 3722, 12.76, '�gua-santense', 291.793);
INSERT INTO tb_cidades VALUES (3921, 'Ajuricaba', 430020, 23, 7255, 22.44, 'ajuricabense', 323.24);
INSERT INTO tb_cidades VALUES (3923, 'Alegrete', 430040, 23, 77653, 9.95, 'alegretense', 7803.99);
INSERT INTO tb_cidades VALUES (3925, 'Almirante Tamandar� Do Sul', 430047, 23, 2067, 7.79, 'tamandarense                        ', 265.369);
INSERT INTO tb_cidades VALUES (3927, 'Alto Alegre', 430055, 23, 1848, 16.15, 'alto-alegrense', 114.446);
INSERT INTO tb_cidades VALUES (3929, 'Alvorada', 430060, 23, 195673, 2.743, 'alvoradense', 71.311);
INSERT INTO tb_cidades VALUES (3930, 'Amaral Ferrador', 430063, 23, 6353, 12.54, 'amaralense', 506.459);
INSERT INTO tb_cidades VALUES (3932, 'Andr� Da Rocha', 430066, 23, 1216, 3.75, 'andr�-rochense', 324.327);
INSERT INTO tb_cidades VALUES (3934, 'Ant�nio Prado', 430080, 23, 12833, 36.92, 'pradense', 347.618);
INSERT INTO tb_cidades VALUES (3936, 'Araric�', 430087, 23, 4864, 137.83, 'arariquense', 35.291);
INSERT INTO tb_cidades VALUES (3937, 'Aratiba', 430090, 23, 6565, 19.23, 'aratibense', 341.324);
INSERT INTO tb_cidades VALUES (3939, 'Arroio Do Padre', 430107, 23, 2730, 21.96, 'arroio padrense', 124.318);
INSERT INTO tb_cidades VALUES (3941, 'Arroio Do Tigre', 430120, 23, 12648, 39.74, 'tigrense', 318.236);
INSERT INTO tb_cidades VALUES (3942, 'Arroio Dos Ratos', 430110, 23, 13606, 31.94, 'ratense', 425.934);
INSERT INTO tb_cidades VALUES (3944, 'Arvorezinha', 430140, 23, 10225, 37.64, 'arvorezinhense', 271.643);
INSERT INTO tb_cidades VALUES (3946, '�urea', 430155, 23, 3665, 23.15, 'aurense', 158.291);
INSERT INTO tb_cidades VALUES (3947, 'Bag�', 430160, 23, 116794, 28.52, 'bageense', 4095.553);
INSERT INTO tb_cidades VALUES (3949, 'Bar�o', 430165, 23, 5741, 46.12, 'baronense', 124.489);
INSERT INTO tb_cidades VALUES (3951, 'Bar�o Do Triunfo', 430175, 23, 7018, 16.08, 'baronense', 436.397);
INSERT INTO tb_cidades VALUES (3953, 'Barra Do Quara�', 430187, 23, 4012, 3.8, 'barrense', 1056.149);
INSERT INTO tb_cidades VALUES (3954, 'Barra Do Ribeiro', 430190, 23, 12572, 17.25, 'barrense', 728.95);
INSERT INTO tb_cidades VALUES (3956, 'Barra Funda', 430195, 23, 2367, 39.43, 'barra-fundense', 60.033);
INSERT INTO tb_cidades VALUES (3957, 'Barrac�o', 430180, 23, 5357, 10.38, 'barraconense', 516.291);
INSERT INTO tb_cidades VALUES (3959, 'Benjamin Constant Do Sul', 430205, 23, 2307, 17.42, 'benjaminense', 132.396);
INSERT INTO tb_cidades VALUES (3961, 'Boa Vista Das Miss�es', 430215, 23, 2114, 10.85, 'boa-vistense ', 194.816);
INSERT INTO tb_cidades VALUES (3963, 'Boa Vista Do Cadeado', 430222, 23, 2441, 3.48, 'cadeadense', 701.105);
INSERT INTO tb_cidades VALUES (3964, 'Boa Vista Do Incra', 430223, 23, 2425, 4.82, 'boa vistense do incra', 503.473);
INSERT INTO tb_cidades VALUES (3966, 'Bom Jesus', 430230, 23, 11519, 4.39, 'bom-jesuense', 2625.695);
INSERT INTO tb_cidades VALUES (3968, 'Bom Progresso', 430237, 23, 2328, 26.23, 'bom-progressense', 88.742);
INSERT INTO tb_cidades VALUES (3969, 'Bom Retiro Do Sul', 430240, 23, 11472, 112.11, 'bom-retirense', 102.327);
INSERT INTO tb_cidades VALUES (3971, 'Bossoroca', 430250, 23, 6884, 4.27, 'bossoroquense', 1610.58);
INSERT INTO tb_cidades VALUES (3973, 'Braga', 430260, 23, 3702, 28.7, 'braguense', 128.993);
INSERT INTO tb_cidades VALUES (3974, 'Brochier', 430265, 23, 4675, 43.8, 'brochiense', 106.734);
INSERT INTO tb_cidades VALUES (3976, 'Ca�apava Do Sul', 430280, 23, 33690, 11.06, 'ca�apavano', 3047.126);
INSERT INTO tb_cidades VALUES (3978, 'Cachoeira Do Sul', 430300, 23, 83827, 22.44, 'cachoeirense', 3735.179);
INSERT INTO tb_cidades VALUES (3980, 'Cacique Doble', 430320, 23, 4868, 23.87, 'caciquense', 203.909);
INSERT INTO tb_cidades VALUES (3981, 'Caibat�', 430330, 23, 4954, 19.08, 'caibateense', 259.665);
INSERT INTO tb_cidades VALUES (3983, 'Camaqu�', 430350, 23, 62764, 37.37, 'camaquense', 1679.441);
INSERT INTO tb_cidades VALUES (3985, 'Cambar� Do Sul', 430360, 23, 6542, 5.4, 'cambaraense', 1212.541);
INSERT INTO tb_cidades VALUES (3987, 'Campina Das Miss�es', 430370, 23, 6117, 27.09, 'campinense', 225.763);
INSERT INTO tb_cidades VALUES (3989, 'Campo Bom', 430390, 23, 60074, 992.79, 'campo-bonense', 60.51);
INSERT INTO tb_cidades VALUES (3990, 'Campo Novo', 430400, 23, 5459, 24.58, 'campo-novense', 222.074);
INSERT INTO tb_cidades VALUES (3992, 'Candel�ria', 430420, 23, 30171, 31.96, 'candelariense', 943.949);
INSERT INTO tb_cidades VALUES (3994, 'Candiota', 430435, 23, 8771, 9.39, 'candiotense', 933.839);
INSERT INTO tb_cidades VALUES (3995, 'Canela', 430440, 23, 39229, 154.58, 'canelense', 253.773);
INSERT INTO tb_cidades VALUES (3997, 'Canoas', 430460, 23, 323827, 2.47, 'canoense', 131.097);
INSERT INTO tb_cidades VALUES (3999, 'Cap�o Bonito Do Sul', 430462, 23, 1754, 3.33, 'cap�o bonitense', 527.12);
INSERT INTO tb_cidades VALUES (4001, 'Cap�o Do Cip�', 430465, 23, 3104, 3.08, 'cipoense', 1008.654);
INSERT INTO tb_cidades VALUES (4002, 'Cap�o Do Le�o', 430466, 23, 24298, 30.94, 'leonense', 785.377);
INSERT INTO tb_cidades VALUES (4004, 'Capit�o', 430469, 23, 2636, 35.64, 'capitanense', 73.967);
INSERT INTO tb_cidades VALUES (4006, 'Cara�', 430471, 23, 7312, 24.84, 'caraense', 294.324);
INSERT INTO tb_cidades VALUES (4007, 'Carazinho', 430470, 23, 59317, 89.19, 'carazinhense', 665.094);
INSERT INTO tb_cidades VALUES (4009, 'Carlos Gomes', 430485, 23, 1607, 19.33, 'carlos-gomense', 83.155);
INSERT INTO tb_cidades VALUES (4011, 'Caseiros', 430495, 23, 3007, 12.76, 'caseirense', 235.706);
INSERT INTO tb_cidades VALUES (4012, 'Catu�pe', 430500, 23, 9323, 15.98, 'catuipano', 583.26);
INSERT INTO tb_cidades VALUES (4014, 'Centen�rio', 430511, 23, 2965, 22.07, 'centenariense', 134.331);
INSERT INTO tb_cidades VALUES (4016, 'Cerro Branco', 430513, 23, 4454, 28.05, 'cerro-branquense', 158.766);
INSERT INTO tb_cidades VALUES (4018, 'Cerro Grande Do Sul', 430517, 23, 10268, 31.61, 'sul-cerro-grandense', 324.79);
INSERT INTO tb_cidades VALUES (4020, 'Chapada', 430530, 23, 9377, 13.71, 'chapadense', 684.043);
INSERT INTO tb_cidades VALUES (4021, 'Charqueadas', 430535, 23, 35320, 163.13, 'charqueadense', 216.513);
INSERT INTO tb_cidades VALUES (4023, 'Chiapetta', 430540, 23, 4044, 10.2, 'chiapetense', 396.553);
INSERT INTO tb_cidades VALUES (4025, 'Chuvisca', 430544, 23, 4944, 22.42, 'chuvisquense', 220.472);
INSERT INTO tb_cidades VALUES (4028, 'Colinas', 430558, 23, 2420, 41.46, 'colinense', 58.374);
INSERT INTO tb_cidades VALUES (4030, 'Condor', 430570, 23, 6552, 14.08, 'condorense', 465.189);
INSERT INTO tb_cidades VALUES (4032, 'Coqueiro Baixo', 430583, 23, 1528, 13.61, 'coqueirense', 112.277);
INSERT INTO tb_cidades VALUES (4034, 'Coronel Barros', 430587, 23, 2459, 15.09, 'coronel-barrense', 162.949);
INSERT INTO tb_cidades VALUES (4036, 'Coronel Pilar', 430593, 23, 1725, 16.36, 'coronel pilarense', 105.447);
INSERT INTO tb_cidades VALUES (4037, 'Cotipor�', 430595, 23, 3917, 22.72, 'cotiporanense', 172.376);
INSERT INTO tb_cidades VALUES (4039, 'Crissiumal', 430600, 23, 14084, 38.89, 'crissiumalense', 362.151);
INSERT INTO tb_cidades VALUES (4041, 'Cristal Do Sul', 430607, 23, 2826, 28.92, 'cristalense', 97.715);
INSERT INTO tb_cidades VALUES (4043, 'Cruzaltense', 430613, 23, 2141, 12.83, 'cruzaltino', 166.883);
INSERT INTO tb_cidades VALUES (4045, 'David Canabarro', 430630, 23, 4683, 26.77, 'canabarrense', 174.94);
INSERT INTO tb_cidades VALUES (4046, 'Derrubadas', 430632, 23, 3190, 8.83, 'derrubadense', 361.286);
INSERT INTO tb_cidades VALUES (4048, 'Dilermando De Aguiar', 430637, 23, 3064, 5.1, 'dilermandense', 600.549);
INSERT INTO tb_cidades VALUES (4050, 'Dois Irm�os Das Miss�es', 430642, 23, 2157, 9.56, 'dois-irm�ozense', 225.681);
INSERT INTO tb_cidades VALUES (4051, 'Dois Lajeados', 430645, 23, 3278, 24.58, 'dois-lajeense', 133.373);
INSERT INTO tb_cidades VALUES (4053, 'Dom Pedrito', 430660, 23, 38898, 7.49, 'pedritense', 5192.12);
INSERT INTO tb_cidades VALUES (4055, 'Dona Francisca', 430670, 23, 3401, 29.74, 'francisquense', 114.346);
INSERT INTO tb_cidades VALUES (4056, 'Doutor Maur�cio Cardoso', 430673, 23, 5313, 21.03, 'mauriciense', 252.69);
INSERT INTO tb_cidades VALUES (4058, 'Eldorado Do Sul', 430676, 23, 34343, 67.38, 'eldoradense', 509.728);
INSERT INTO tb_cidades VALUES (4059, 'Encantado', 430680, 23, 20510, 147.38, 'encantadense', 139.16);
INSERT INTO tb_cidades VALUES (4061, 'Engenho Velho', 430692, 23, 1527, 21.45, 'engenho-velhense', 71.191);
INSERT INTO tb_cidades VALUES (4063, 'Entre Iju�s', 430693, 23, 8938, 16.17, 'entre-ijuiense', 552.603);
INSERT INTO tb_cidades VALUES (4065, 'Erechim', 430700, 23, 96087, 223.11, 'erechinense', 430.67);
INSERT INTO tb_cidades VALUES (4066, 'Ernestina', 430705, 23, 3088, 12.91, 'ernestinense', 239.148);
INSERT INTO tb_cidades VALUES (4068, 'Erval Seco', 430730, 23, 7878, 21.65, 'erval-sequense', 363.894);
INSERT INTO tb_cidades VALUES (4070, 'Esperan�a Do Sul', 430745, 23, 3272, 22.05, 'esperan�ulense', 148.379);
INSERT INTO tb_cidades VALUES (4072, 'Esta��o', 430755, 23, 6011, 59.95, 'estacionense', 100.266);
INSERT INTO tb_cidades VALUES (4074, 'Esteio', 430770, 23, 80755, 2.917, 'esteiense', 27.676);
INSERT INTO tb_cidades VALUES (4075, 'Estrela', 430780, 23, 30619, 166.25, 'estrelense', 184.177);
INSERT INTO tb_cidades VALUES (4077, 'Eug�nio De Castro', 430783, 23, 2798, 6.67, 'eugenio-castrense', 419.321);
INSERT INTO tb_cidades VALUES (4079, 'Farroupilha', 430790, 23, 63635, 176.57, 'farroupilhense', 360.392);
INSERT INTO tb_cidades VALUES (4080, 'Faxinal Do Soturno', 430800, 23, 6672, 39.27, 'soturnense', 169.903);
INSERT INTO tb_cidades VALUES (4082, 'Fazenda Vilanova', 430807, 23, 3697, 43.6, 'vilanovense', 84.794);
INSERT INTO tb_cidades VALUES (4084, 'Flores Da Cunha', 430820, 23, 27126, 99.2, 'florense', 273.453);
INSERT INTO tb_cidades VALUES (4086, 'Fontoura Xavier', 430830, 23, 10719, 18.37, 'fontourense', 583.467);
INSERT INTO tb_cidades VALUES (4087, 'Formigueiro', 430840, 23, 7014, 12.05, 'formigueirense', 581.992);
INSERT INTO tb_cidades VALUES (4089, 'Fortaleza Dos Valos', 430845, 23, 4575, 7.03, 'fortalezense', 650.328);
INSERT INTO tb_cidades VALUES (4091, 'Garibaldi', 430860, 23, 30689, 181.34, 'garibaldense', 169.237);
INSERT INTO tb_cidades VALUES (4092, 'Garruchos', 430865, 23, 3234, 4.04, 'garruchense', 799.852);
INSERT INTO tb_cidades VALUES (4094, 'General C�mara', 430880, 23, 8447, 16.56, 'camaraense', 510.012);
INSERT INTO tb_cidades VALUES (4096, 'Get�lio Vargas', 430890, 23, 16154, 56.37, 'getuliense', 286.567);
INSERT INTO tb_cidades VALUES (4098, 'Glorinha', 430905, 23, 6891, 21.29, 'glorinhense', 323.642);
INSERT INTO tb_cidades VALUES (4099, 'Gramado', 430910, 23, 32273, 135.7, 'gramadense', 237.828);
INSERT INTO tb_cidades VALUES (4101, 'Gramado Xavier', 430915, 23, 3970, 18.25, 'gramado-xavierense', 217.526);
INSERT INTO tb_cidades VALUES (4103, 'Guabiju', 430925, 23, 1598, 10.77, 'guabijuense', 148.394);
INSERT INTO tb_cidades VALUES (4105, 'Guapor�', 430940, 23, 22814, 76.64, 'guaporense', 297.66);
INSERT INTO tb_cidades VALUES (4107, 'Harmonia', 430955, 23, 4254, 95.04, 'harmoniense', 44.761);
INSERT INTO tb_cidades VALUES (4108, 'Herval', 430710, 23, 6753, 3.84, 'hervalense', 1757.846);
INSERT INTO tb_cidades VALUES (4110, 'Horizontina', 430960, 23, 18348, 78.92, 'horizontinense', 232.477);
INSERT INTO tb_cidades VALUES (4111, 'Hulha Negra', 430965, 23, 6043, 7.34, 'hulha-negrense', 822.903);
INSERT INTO tb_cidades VALUES (4113, 'Ibarama', 430975, 23, 4371, 22.63, 'ibaramense', 193.11);
INSERT INTO tb_cidades VALUES (4115, 'Ibiraiaras', 430990, 23, 7171, 23.85, 'ibiraiense', 300.651);
INSERT INTO tb_cidades VALUES (4117, 'Ibirub�', 431000, 23, 19310, 31.79, 'ibirubense', 607.456);
INSERT INTO tb_cidades VALUES (4119, 'Iju�', 431020, 23, 78915, 114.51, 'ijuiense', 689.136);
INSERT INTO tb_cidades VALUES (4120, 'Il�polis', 431030, 23, 4102, 35.22, 'ilopolitano', 116.481);
INSERT INTO tb_cidades VALUES (4122, 'Imigrante', 431036, 23, 3023, 41.21, 'imigrantense', 73.356);
INSERT INTO tb_cidades VALUES (4124, 'Inhacor�', 431041, 23, 2267, 19.87, 'inhacorense', 114.111);
INSERT INTO tb_cidades VALUES (4125, 'Ip�', 431043, 23, 6016, 10.04, 'ipeense', 599.249);
INSERT INTO tb_cidades VALUES (4127, 'Ira�', 431050, 23, 8078, 44.34, 'iraiense', 182.184);
INSERT INTO tb_cidades VALUES (4129, 'Itacurubi', 431055, 23, 3441, 3.07, 'itacurubiense', 1120.878);
INSERT INTO tb_cidades VALUES (4131, 'Itaqui', 431060, 23, 38159, 11.21, 'itaquiense', 3404.053);
INSERT INTO tb_cidades VALUES (4132, 'Itati', 431065, 23, 2584, 12.49, 'itatiense  ', 206.911);
INSERT INTO tb_cidades VALUES (4134, 'Ivor�', 431075, 23, 2156, 17.54, 'ivorense', 122.93);
INSERT INTO tb_cidades VALUES (4136, 'Jaboticaba', 431085, 23, 4098, 32, 'jaboticabense', 128.053);
INSERT INTO tb_cidades VALUES (4138, 'Jacutinga', 431090, 23, 3633, 20.26, 'jacutinguense', 179.297);
INSERT INTO tb_cidades VALUES (4139, 'Jaguar�o', 431100, 23, 27931, 13.6, 'jaguarense', 2054.392);
INSERT INTO tb_cidades VALUES (4141, 'Jaquirana', 431112, 23, 4177, 4.6, 'jaquiranense', 907.939);
INSERT INTO tb_cidades VALUES (4143, 'J�ia', 431115, 23, 8331, 6.74, 'joiense', 1235.888);
INSERT INTO tb_cidades VALUES (4145, 'Lagoa Bonita Do Sul', 431123, 23, 2662, 24.53, 'lagobonitense', 108.499);
INSERT INTO tb_cidades VALUES (4147, 'Lagoa Vermelha', 431130, 23, 27525, 21.78, 'lagoense', 1263.507);
INSERT INTO tb_cidades VALUES (4148, 'Lago�o', 431125, 23, 6185, 16.12, 'lagoense', 383.603);
INSERT INTO tb_cidades VALUES (4150, 'Lajeado Do Bugre', 431142, 23, 2487, 36.61, 'lajeado-bugrense', 67.934);
INSERT INTO tb_cidades VALUES (4152, 'Liberato Salzano', 431160, 23, 5780, 23.53, 'salzanense', 245.628);
INSERT INTO tb_cidades VALUES (4153, 'Lindolfo Collor', 431162, 23, 5227, 158.44, 'lindolfo-collorense', 32.991);
INSERT INTO tb_cidades VALUES (5424, 'Votorantim', 355700, 26, 108809, 592.47, 'votorantinense', 183.653);
INSERT INTO tb_cidades VALUES (4156, 'Machadinho', 431170, 23, 5510, 16.48, 'machadinhense', 334.446);
INSERT INTO tb_cidades VALUES (4158, 'Manoel Viana', 431175, 23, 7072, 5.09, 'vianense', 1390.702);
INSERT INTO tb_cidades VALUES (4160, 'Marat�', 431179, 23, 2527, 31.13, 'marataense', 81.179);
INSERT INTO tb_cidades VALUES (4161, 'Marau', 431180, 23, 36364, 56, 'marauense', 649.302);
INSERT INTO tb_cidades VALUES (4163, 'Mariana Pimentel', 431198, 23, 3768, 11.15, 'marianense', 337.794);
INSERT INTO tb_cidades VALUES (4165, 'Marques De Souza', 431205, 23, 4068, 32.5, 'marquesouzense', 125.176);
INSERT INTO tb_cidades VALUES (4166, 'Mata', 431210, 23, 5111, 16.39, 'matense', 311.884);
INSERT INTO tb_cidades VALUES (4168, 'Mato Leit�o', 431215, 23, 3865, 84.2, 'mato-leitoense', 45.903);
INSERT INTO tb_cidades VALUES (4170, 'Maximiliano De Almeida', 431220, 23, 4911, 23.55, 'almeidense', 208.526);
INSERT INTO tb_cidades VALUES (4171, 'Minas Do Le�o', 431225, 23, 7631, 17.98, 'leonense', 424.341);
INSERT INTO tb_cidades VALUES (4173, 'Montauri', 431235, 23, 1542, 18.79, 'montauriense', 82.079);
INSERT INTO tb_cidades VALUES (4175, 'Monte Belo Do Sul', 431238, 23, 2670, 39.05, 'monte-belense', 68.369);
INSERT INTO tb_cidades VALUES (4176, 'Montenegro', 431240, 23, 59415, 140.13, 'montenegrino', 424.013);
INSERT INTO tb_cidades VALUES (4178, 'Morrinhos Do Sul', 431244, 23, 3182, 19.23, 'morrinhense', 165.441);
INSERT INTO tb_cidades VALUES (4180, 'Morro Reuter', 431247, 23, 5676, 64.76, 'morroreutense', 87.641);
INSERT INTO tb_cidades VALUES (4182, 'Mu�um', 431260, 23, 4791, 43.2, 'mu�uense', 110.893);
INSERT INTO tb_cidades VALUES (4184, 'Muliterno', 431262, 23, 1813, 16.31, 'muliternense', 111.133);
INSERT INTO tb_cidades VALUES (4185, 'N�o Me Toque', 431265, 23, 15936, 44.06, 'n�o-me-toquense', 361.672);
INSERT INTO tb_cidades VALUES (4187, 'Nonoai', 431270, 23, 12074, 25.73, 'nonoaiense', 469.311);
INSERT INTO tb_cidades VALUES (4189, 'Nova Ara��', 431280, 23, 4001, 53.81, 'ara�aense', 74.361);
INSERT INTO tb_cidades VALUES (4190, 'Nova Bassano', 431290, 23, 8840, 41.77, 'bassanense', 211.612);
INSERT INTO tb_cidades VALUES (4192, 'Nova Br�scia', 431300, 23, 3184, 30.97, 'bresciense', 102.818);
INSERT INTO tb_cidades VALUES (4194, 'Nova Esperan�a Do Sul', 431303, 23, 4671, 24.46, 'nova-esperancense', 191.001);
INSERT INTO tb_cidades VALUES (4195, 'Nova Hartz', 431306, 23, 18346, 293.26, 'nova-hartense', 62.558);
INSERT INTO tb_cidades VALUES (4197, 'Nova Palma', 431310, 23, 6342, 20.23, 'nova-palmense', 313.508);
INSERT INTO tb_cidades VALUES (4199, 'Nova Prata', 431330, 23, 22830, 88.23, 'nova-pratense', 258.744);
INSERT INTO tb_cidades VALUES (4201, 'Nova Roma Do Sul', 431335, 23, 3343, 22.43, 'nova-romense', 149.054);
INSERT INTO tb_cidades VALUES (4203, 'Novo Barreiro', 431349, 23, 3978, 32.19, 'novo-barreirense', 123.583);
INSERT INTO tb_cidades VALUES (4204, 'Novo Cabrais', 431339, 23, 3855, 20.05, 'cabraisense', 192.29);
INSERT INTO tb_cidades VALUES (4206, 'Novo Machado', 431342, 23, 3925, 17.95, 'novo-machadense', 218.67);
INSERT INTO tb_cidades VALUES (4208, 'Novo Xingu', 431346, 23, 1757, 21.8, 'xinguense', 80.591);
INSERT INTO tb_cidades VALUES (4209, 'Os�rio', 431350, 23, 40906, 61.65, 'osoriense', 663.555);
INSERT INTO tb_cidades VALUES (4211, 'Palmares Do Sul', 431365, 23, 10969, 11.56, 'palmarense', 949.213);
INSERT INTO tb_cidades VALUES (4213, 'Palmitinho', 431380, 23, 6920, 48.04, 'palmitense', 144.046);
INSERT INTO tb_cidades VALUES (4214, 'Panambi', 431390, 23, 38058, 77.53, 'panambiense', 490.859);
INSERT INTO tb_cidades VALUES (4216, 'Para�', 431400, 23, 6812, 56.57, 'paraiense', 120.419);
INSERT INTO tb_cidades VALUES (4218, 'Pareci Novo', 431403, 23, 3511, 61.16, 'pareciense', 57.407);
INSERT INTO tb_cidades VALUES (4219, 'Parob�', 431405, 23, 51502, 474.03, 'parobeense', 108.646);
INSERT INTO tb_cidades VALUES (4222, 'Passo Fundo', 431410, 23, 184826, 235.92, 'passo-fundense', 783.423);
INSERT INTO tb_cidades VALUES (4223, 'Paulo Bento', 431413, 23, 2196, 14.8, 'paulobentense', 148.365);
INSERT INTO tb_cidades VALUES (4225, 'Pedras Altas', 431417, 23, 2212, 1.61, 'pedras altense', 1377.378);
INSERT INTO tb_cidades VALUES (4227, 'Peju�ara', 431430, 23, 3973, 9.59, 'peju�arense', 414.24);
INSERT INTO tb_cidades VALUES (4228, 'Pelotas', 431440, 23, 328275, 203.89, 'pelotense', 1610.091);
INSERT INTO tb_cidades VALUES (4230, 'Pinhal', 431445, 23, 2513, 36.84, 'pinhalense', 68.209);
INSERT INTO tb_cidades VALUES (4232, 'Pinhal Grande', 431447, 23, 4471, 9.37, 'pinhal-grandense', 477.127);
INSERT INTO tb_cidades VALUES (4233, 'Pinheirinho Do Vale', 431449, 23, 4497, 42.69, 'pinheirinhense', 105.345);
INSERT INTO tb_cidades VALUES (4235, 'Pirap�', 431455, 23, 2757, 9.45, 'pirapoense', 291.744);
INSERT INTO tb_cidades VALUES (4237, 'Planalto', 431470, 23, 10524, 45.67, 'planaltense', 230.421);
INSERT INTO tb_cidades VALUES (4239, 'Pont�o', 431477, 23, 3857, 7.63, 'pontanense', 505.715);
INSERT INTO tb_cidades VALUES (4240, 'Ponte Preta', 431478, 23, 1750, 17.52, 'ponte-pretense', 99.873);
INSERT INTO tb_cidades VALUES (4242, 'Porto Alegre', 431490, 23, 1409351, 2.837, 'porto-alegrense', 496.684);
INSERT INTO tb_cidades VALUES (4244, 'Porto Mau�', 431505, 23, 2542, 24.08, 'porto-mauense', 105.561);
INSERT INTO tb_cidades VALUES (4246, 'Porto Xavier', 431510, 23, 10558, 37.64, 'porto-xavierense', 280.511);
INSERT INTO tb_cidades VALUES (4247, 'Pouso Novo', 431513, 23, 1875, 17.6, 'pouso-novense', 106.533);
INSERT INTO tb_cidades VALUES (4249, 'Progresso', 431515, 23, 6163, 24.09, 'progressense', 255.862);
INSERT INTO tb_cidades VALUES (4251, 'Putinga', 431520, 23, 4141, 20.19, 'putinguense', 205.053);
INSERT INTO tb_cidades VALUES (4252, 'Quara�', 431530, 23, 23021, 7.31, 'quaraiense', 3147.647);
INSERT INTO tb_cidades VALUES (4254, 'Quevedos', 431532, 23, 2710, 4.99, 'quevedense', 543.361);
INSERT INTO tb_cidades VALUES (4256, 'Redentora', 431540, 23, 10222, 33.77, 'redentorense', 302.681);
INSERT INTO tb_cidades VALUES (4257, 'Relvado', 431545, 23, 2155, 17.46, 'relvadense', 123.437);
INSERT INTO tb_cidades VALUES (4259, 'Rio Dos �ndios', 431555, 23, 3616, 15.26, 'riodinhense', 236.966);
INSERT INTO tb_cidades VALUES (4261, 'Rio Pardo', 431570, 23, 37591, 18.33, 'rio-pardense', 2050.597);
INSERT INTO tb_cidades VALUES (4263, 'Roca Sales', 431580, 23, 10284, 49.29, 'roca-salense', 208.63);
INSERT INTO tb_cidades VALUES (4264, 'Rodeio Bonito', 431590, 23, 5743, 69.03, 'rodeiense', 83.199);
INSERT INTO tb_cidades VALUES (4266, 'Rolante', 431600, 23, 19485, 65.91, 'rolantense', 295.638);
INSERT INTO tb_cidades VALUES (4268, 'Rondinha', 431620, 23, 5518, 21.88, 'rondinhense', 252.209);
INSERT INTO tb_cidades VALUES (4270, 'Ros�rio Do Sul', 431640, 23, 39707, 9.09, 'rosariense', 4369.669);
INSERT INTO tb_cidades VALUES (4271, 'Sagrada Fam�lia', 431642, 23, 2595, 33.16, 'sagradense', 78.254);
INSERT INTO tb_cidades VALUES (4273, 'Salto Do Jacu�', 431645, 23, 11880, 23.41, 'salto-jacuiense', 507.425);
INSERT INTO tb_cidades VALUES (4275, 'Salvador Do Sul', 431650, 23, 6747, 67.59, 'salvadorense', 99.825);
INSERT INTO tb_cidades VALUES (4276, 'Sananduva', 431660, 23, 15373, 30.47, 'sananduvense', 504.551);
INSERT INTO tb_cidades VALUES (4278, 'Santa Cec�lia Do Sul', 431673, 23, 1655, 8.3, 'ceciliense', 199.396);
INSERT INTO tb_cidades VALUES (4282, 'Santa Maria', 431690, 23, 261031, 145.98, 'santa-mariense', 1788.129);
INSERT INTO tb_cidades VALUES (4284, 'Santa Rosa', 431720, 23, 68587, 140.03, 'santa-rosense', 489.8);
INSERT INTO tb_cidades VALUES (4285, 'Santa Tereza', 431725, 23, 1720, 23.76, 'santa-teresense', 72.39);
INSERT INTO tb_cidades VALUES (4287, 'Santana Da Boa Vista', 431700, 23, 8242, 5.8, 'santanense-da-boa-vista', 1420.622);
INSERT INTO tb_cidades VALUES (4289, 'Santiago', 431740, 23, 49071, 20.33, 'santiaguense', 2413.143);
INSERT INTO tb_cidades VALUES (4290, 'Santo �ngelo', 431750, 23, 76275, 112.09, 'santo-angelense ou angelopolitano', 680.5);
INSERT INTO tb_cidades VALUES (4292, 'Santo Ant�nio Das Miss�es', 431770, 23, 11210, 6.55, 'santo-antoniense', 1710.876);
INSERT INTO tb_cidades VALUES (4294, 'Santo Ant�nio Do Planalto', 431775, 23, 1987, 9.77, 'santo-antoniense', 203.441);
INSERT INTO tb_cidades VALUES (4296, 'Santo Cristo', 431790, 23, 14378, 39.19, 'santo-cristense', 366.887);
INSERT INTO tb_cidades VALUES (4297, 'Santo Expedito Do Sul', 431795, 23, 2461, 19.57, 'expeditense', 125.736);
INSERT INTO tb_cidades VALUES (4299, 'S�o Domingos Do Sul', 431805, 23, 2926, 37.06, 's�o-dominguense', 78.952);
INSERT INTO tb_cidades VALUES (4301, 'S�o Francisco De Paula', 431820, 23, 20537, 6.27, 'serrano', 3274.035);
INSERT INTO tb_cidades VALUES (4302, 'S�o Gabriel', 431830, 23, 60425, 12.03, 'gabrielense', 5023.843);
INSERT INTO tb_cidades VALUES (4304, 'S�o Jo�o Da Urtiga', 431842, 23, 4726, 27.61, 'urtiguense', 171.177);
INSERT INTO tb_cidades VALUES (4306, 'S�o Jorge', 431844, 23, 2774, 23.5, 's�o-jorgense', 118.052);
INSERT INTO tb_cidades VALUES (4307, 'S�o Jos� Das Miss�es', 431845, 23, 2720, 27.74, 's�o-josezense', 98.071);
INSERT INTO tb_cidades VALUES (4309, 'S�o Jos� Do Hort�ncio', 431848, 23, 4094, 63.86, 'hortenciense', 64.113);
INSERT INTO tb_cidades VALUES (4311, 'S�o Jos� Do Norte', 431850, 23, 25503, 22.81, 'nortense', 1118.109);
INSERT INTO tb_cidades VALUES (4312, 'S�o Jos� Do Ouro', 431860, 23, 6904, 20.62, 'ourense', 334.775);
INSERT INTO tb_cidades VALUES (4314, 'S�o Jos� Dos Ausentes', 431862, 23, 3290, 2.8, 'ausentino', 1176.688);
INSERT INTO tb_cidades VALUES (4315, 'S�o Leopoldo', 431870, 23, 214087, 2.083, 'leopoldense', 102.739);
INSERT INTO tb_cidades VALUES (4317, 'S�o Luiz Gonzaga', 431890, 23, 34556, 26.67, 's�o-luizense', 1295.683);
INSERT INTO tb_cidades VALUES (4318, 'S�o Marcos', 431900, 23, 20103, 78.45, 's�o-marquense', 256.253);
INSERT INTO tb_cidades VALUES (4320, 'S�o Martinho Da Serra', 431912, 23, 3201, 4.78, 'martinhense', 669.55);
INSERT INTO tb_cidades VALUES (4322, 'S�o Nicolau', 431920, 23, 5727, 11.8, 's�o-nicolauense', 485.326);
INSERT INTO tb_cidades VALUES (4324, 'S�o Pedro Da Serra', 431935, 23, 3315, 93.68, 's�o-pedrense', 35.387);
INSERT INTO tb_cidades VALUES (4325, 'S�o Pedro Das Miss�es', 431936, 23, 1886, 23.59, 's�o pedrense ', 79.965);
INSERT INTO tb_cidades VALUES (4327, 'S�o Pedro Do Sul', 431940, 23, 16368, 18.74, 's�o-pedrense', 873.597);
INSERT INTO tb_cidades VALUES (4328, 'S�o Sebasti�o Do Ca�', 431950, 23, 21932, 196.81, 'caiense', 111.435);
INSERT INTO tb_cidades VALUES (4330, 'S�o Valentim', 431970, 23, 3632, 23.56, 'valentinense', 154.189);
INSERT INTO tb_cidades VALUES (4332, 'S�o Val�rio Do Sul', 431973, 23, 2647, 24.52, 's�o-valerense', 107.971);
INSERT INTO tb_cidades VALUES (4333, 'S�o Vendelino', 431975, 23, 1944, 60.59, 's�o-vendelinense', 32.087);
INSERT INTO tb_cidades VALUES (4335, 'Sapiranga', 431990, 23, 74985, 542.13, 'sapiranguense', 138.315);
INSERT INTO tb_cidades VALUES (4337, 'Sarandi', 432010, 23, 21285, 60.23, 'sarandiense', 353.389);
INSERT INTO tb_cidades VALUES (4338, 'Seberi', 432020, 23, 10897, 36.15, 'seberiense', 301.421);
INSERT INTO tb_cidades VALUES (4340, 'Segredo', 432026, 23, 7158, 28.93, 'segredense', 247.44);
INSERT INTO tb_cidades VALUES (4342, 'Senador Salgado Filho', 432032, 23, 2814, 19.12, 'salgadofilhense', 147.21);
INSERT INTO tb_cidades VALUES (4344, 'Serafina Corr�a', 432040, 23, 14253, 87.29, 'serafinense', 163.284);
INSERT INTO tb_cidades VALUES (4345, 'S�rio', 432045, 23, 2281, 22.9, 'seriense', 99.627);
INSERT INTO tb_cidades VALUES (4347, 'Sert�o Santana', 432055, 23, 5850, 23.23, 'sertanense', 251.847);
INSERT INTO tb_cidades VALUES (4349, 'Severiano De Almeida', 432060, 23, 3842, 22.92, 'severianense', 167.614);
INSERT INTO tb_cidades VALUES (4351, 'Sinimbu', 432067, 23, 10068, 19.74, 'sinimbuense ', 510.122);
INSERT INTO tb_cidades VALUES (4352, 'Sobradinho', 432070, 23, 14283, 109.54, 'sobradinhense', 130.391);
INSERT INTO tb_cidades VALUES (4354, 'Taba�', 432085, 23, 4131, 43.6, 'tabaiense', 94.755);
INSERT INTO tb_cidades VALUES (4356, 'Tapera', 432100, 23, 10448, 58.15, 'taperense', 179.663);
INSERT INTO tb_cidades VALUES (4357, 'Tapes', 432110, 23, 16629, 20.62, 'tapense', 806.299);
INSERT INTO tb_cidades VALUES (4359, 'Taquari', 432130, 23, 26092, 74.56, 'taquariense', 349.968);
INSERT INTO tb_cidades VALUES (4361, 'Tavares', 432135, 23, 5351, 8.86, 'tavarense', 604.253);
INSERT INTO tb_cidades VALUES (4363, 'Terra De Areia', 432143, 23, 9878, 69.67, 'terrareense', 141.773);
INSERT INTO tb_cidades VALUES (4364, 'Teut�nia', 432145, 23, 27272, 152.68, 'teutoniense', 178.625);
INSERT INTO tb_cidades VALUES (4366, 'Tiradentes Do Sul', 432147, 23, 6461, 27.55, 'tiradentense', 234.483);
INSERT INTO tb_cidades VALUES (4368, 'Torres', 432150, 23, 34656, 216.34, 'torrense', 160.194);
INSERT INTO tb_cidades VALUES (4370, 'Travesseiro', 432162, 23, 2314, 28.52, 'travesseirense', 81.122);
INSERT INTO tb_cidades VALUES (4372, 'Tr�s Cachoeiras', 432166, 23, 10217, 40.7, 'tr�s cachoeirense', 251.059);
INSERT INTO tb_cidades VALUES (4373, 'Tr�s Coroas', 432170, 23, 23848, 128.53, 'tr�s-coroense', 185.54);
INSERT INTO tb_cidades VALUES (4375, 'Tr�s Forquilhas', 432183, 23, 2914, 13.4, 'forquilhense', 217.39);
INSERT INTO tb_cidades VALUES (4377, 'Tr�s Passos', 432190, 23, 23965, 89.29, 'tr�s-passense', 268.397);
INSERT INTO tb_cidades VALUES (4378, 'Trindade Do Sul', 432195, 23, 5787, 21.56, 'trindadense', 268.418);
INSERT INTO tb_cidades VALUES (4380, 'Tucunduva', 432210, 23, 5898, 32.62, 'tucunduvense', 180.81);
INSERT INTO tb_cidades VALUES (4382, 'Tupanci Do Sul', 432218, 23, 1573, 11.64, 'tupancisense', 135.115);
INSERT INTO tb_cidades VALUES (4384, 'Tupandi', 432225, 23, 3924, 65.9, 'tupandiense', 59.542);
INSERT INTO tb_cidades VALUES (4385, 'Tuparendi', 432230, 23, 8557, 27.81, 'tuparendiense', 307.677);
INSERT INTO tb_cidades VALUES (4387, 'Ubiretama', 432234, 23, 2296, 18.12, 'ubiretamense', 126.693);
INSERT INTO tb_cidades VALUES (4389, 'Unistalda', 432237, 23, 2450, 4.07, 'unistaldense', 602.39);
INSERT INTO tb_cidades VALUES (4391, 'Vacaria', 432250, 23, 61342, 28.88, 'vacariense ', 2123.683);
INSERT INTO tb_cidades VALUES (4392, 'Vale Do Sol', 432253, 23, 11077, 33.75, 'vale-solense', 328.228);
INSERT INTO tb_cidades VALUES (4394, 'Vale Verde', 432252, 23, 3253, 9.87, 'valeverdense', 329.728);
INSERT INTO tb_cidades VALUES (4396, 'Ven�ncio Aires', 432260, 23, 65946, 85.28, 'ven�ncio-airense', 773.244);
INSERT INTO tb_cidades VALUES (4398, 'Veran�polis', 432280, 23, 22810, 78.83, 'veranense', 289.343);
INSERT INTO tb_cidades VALUES (4400, 'Viadutos', 432290, 23, 5311, 19.79, 'viadutense', 268.36);
INSERT INTO tb_cidades VALUES (4401, 'Viam�o', 432300, 23, 239384, 159.91, 'viamense', 1497.023);
INSERT INTO tb_cidades VALUES (4404, 'Vila Flores', 432330, 23, 3207, 29.72, 'vila-florense', 107.91);
INSERT INTO tb_cidades VALUES (4406, 'Vila Maria', 432340, 23, 4221, 23.26, 'vila-mariense', 181.44);
INSERT INTO tb_cidades VALUES (4408, 'Vista Alegre', 432350, 23, 2832, 36.56, 'vista-alegrense', 77.455);
INSERT INTO tb_cidades VALUES (4409, 'Vista Alegre Do Prata', 432360, 23, 1569, 13.15, 'vista-alegrense', 119.328);
INSERT INTO tb_cidades VALUES (4411, 'Vit�ria Das Miss�es', 432375, 23, 3485, 13.42, 'vitoriano', 259.61);
INSERT INTO tb_cidades VALUES (4412, 'Westf�lia', 432377, 23, 2793, 43.64, 'westfaliano', 63.998);
INSERT INTO tb_cidades VALUES (4414, 'Abdon Batista', 420005, 24, 2653, 11.26, 'abdonense', 235.598);
INSERT INTO tb_cidades VALUES (4416, 'Agrol�ndia', 420020, 24, 9323, 45.01, 'agrolandense', 207.12);
INSERT INTO tb_cidades VALUES (4418, '�gua Doce', 420040, 24, 6961, 5.3, '�gua-docense', 1313.02);
INSERT INTO tb_cidades VALUES (4420, '�guas Frias', 420055, 24, 2424, 32.25, '�guasfriense', 75.162);
INSERT INTO tb_cidades VALUES (4421, '�guas Mornas', 420060, 24, 5548, 16.99, '�guas-mornense', 326.524);
INSERT INTO tb_cidades VALUES (4423, 'Alto Bela Vista', 420075, 24, 2005, 19.35, 'bela-vistense', 103.593);
INSERT INTO tb_cidades VALUES (4425, 'Angelina', 420090, 24, 5250, 10.5, 'angelinense', 499.949);
INSERT INTO tb_cidades VALUES (4427, 'Anit�polis', 420110, 24, 3214, 5.93, 'anitapolitano', 542.381);
INSERT INTO tb_cidades VALUES (4428, 'Ant�nio Carlos', 420120, 24, 7458, 32.55, 'ant�nio-carlense', 229.119);
INSERT INTO tb_cidades VALUES (4430, 'Arabut�', 420127, 24, 4193, 31.71, 'arabutanense', 132.232);
INSERT INTO tb_cidades VALUES (4432, 'Ararangu�', 420140, 24, 61310, 201.74, 'araranguaense', 303.907);
INSERT INTO tb_cidades VALUES (4433, 'Armaz�m', 420150, 24, 7753, 44.69, 'armazenense', 173.485);
INSERT INTO tb_cidades VALUES (4435, 'Arvoredo', 420165, 24, 2260, 24.91, 'arvoredense', 90.709);
INSERT INTO tb_cidades VALUES (4437, 'Atalanta', 420180, 24, 3300, 34.91, 'atalantense', 94.526);
INSERT INTO tb_cidades VALUES (4439, 'Balne�rio Arroio Do Silva', 420195, 24, 9586, 101.33, 'arroio-silvense', 94.601);
INSERT INTO tb_cidades VALUES (4441, 'Balne�rio Cambori�', 420200, 24, 108089, 2.309, 'praiano', 46.797);
INSERT INTO tb_cidades VALUES (4442, 'Balne�rio Gaivota', 420207, 24, 8234, 55.83, 'gaivotense', 147.496);
INSERT INTO tb_cidades VALUES (4444, 'Bandeirante', 420208, 24, 2906, 19.87, 'bandeirantense', 146.256);
INSERT INTO tb_cidades VALUES (4445, 'Barra Bonita', 420209, 24, 1878, 20.09, 'barrabonitense', 93.471);
INSERT INTO tb_cidades VALUES (4447, 'Bela Vista Do Toldo', 420213, 24, 6004, 11.23, 'bela vistense', 534.62);
INSERT INTO tb_cidades VALUES (4449, 'Benedito Novo', 420220, 24, 10336, 26.62, 'benedito-novense', 388.209);
INSERT INTO tb_cidades VALUES (4451, 'Blumenau', 420240, 24, 309011, 594.44, 'blumenauense', 519.835);
INSERT INTO tb_cidades VALUES (4453, 'Bom Jardim Da Serra', 420250, 24, 4395, 4.7, 'bom-jardinense', 935.176);
INSERT INTO tb_cidades VALUES (4454, 'Bom Jesus', 420253, 24, 2526, 39.75, 'bonjesuense', 63.553);
INSERT INTO tb_cidades VALUES (4456, 'Bom Retiro', 420260, 24, 8942, 8.47, 'bom-retirense', 1055.504);
INSERT INTO tb_cidades VALUES (4457, 'Bombinhas', 420245, 24, 14293, 423.28, 'bombinense', 33.767);
INSERT INTO tb_cidades VALUES (4459, 'Bra�o Do Norte', 420280, 24, 29018, 137.12, 'bra�o-nortense', 211.626);
INSERT INTO tb_cidades VALUES (4461, 'Brun�polis', 420287, 24, 2850, 8.49, 'brunopolitense', 335.513);
INSERT INTO tb_cidades VALUES (4463, 'Ca�ador', 420300, 24, 70762, 72.07, 'ca�adorense', 981.903);
INSERT INTO tb_cidades VALUES (4464, 'Caibi', 420310, 24, 6219, 36.22, 'caibiense', 171.712);
INSERT INTO tb_cidades VALUES (4466, 'Cambori�', 420320, 24, 62361, 290.73, 'camboriuense', 214.499);
INSERT INTO tb_cidades VALUES (4468, 'Campo Belo Do Sul', 420340, 24, 7483, 7.28, 'campo-belense', 1027.411);
INSERT INTO tb_cidades VALUES (4470, 'Campos Novos', 420360, 24, 32824, 19.09, 'campos-novense', 1719.18);
INSERT INTO tb_cidades VALUES (4471, 'Canelinha', 420370, 24, 10603, 70.03, 'canelense', 151.411);
INSERT INTO tb_cidades VALUES (4473, 'Cap�o Alto', 420325, 24, 2753, 2.06, 'cap�o altense', 1335.281);
INSERT INTO tb_cidades VALUES (4475, 'Capivari De Baixo', 420395, 24, 21674, 407.68, 'capivariense', 53.164);
INSERT INTO tb_cidades VALUES (4477, 'Caxambu Do Sul', 420410, 24, 4411, 31.38, 'caxambuense', 140.58);
INSERT INTO tb_cidades VALUES (4479, 'Cerro Negro', 420417, 24, 3581, 8.59, 'cerronegrense', 416.775);
INSERT INTO tb_cidades VALUES (4481, 'Chapec�', 420420, 24, 183530, 293.98, 'chapecoense', 624.304);
INSERT INTO tb_cidades VALUES (4482, 'Cocal Do Sul', 420425, 24, 15159, 212.88, 'cocalense', 71.209);
INSERT INTO tb_cidades VALUES (4484, 'Cordilheira Alta', 420435, 24, 3767, 44.97, 'cordilheiraltense', 83.77);
INSERT INTO tb_cidades VALUES (4486, 'Coronel Martins', 420445, 24, 2458, 22.88, 'coronel martiense', 107.408);
INSERT INTO tb_cidades VALUES (4488, 'Corup�', 420450, 24, 13852, 34.2, 'corupaense', 405.002);
INSERT INTO tb_cidades VALUES (4489, 'Crici�ma', 420460, 24, 192308, 816.15, 'criciumense', 235.627);
INSERT INTO tb_cidades VALUES (4491, 'Cunhata�', 420475, 24, 1882, 34.53, 'cunhataiense', 54.509);
INSERT INTO tb_cidades VALUES (4493, 'Descanso', 420490, 24, 8634, 30.23, 'descansense', 285.565);
INSERT INTO tb_cidades VALUES (4495, 'Dona Emma', 420510, 24, 3721, 20.56, 'donemense', 181.019);
INSERT INTO tb_cidades VALUES (4496, 'Doutor Pedrinho', 420515, 24, 3604, 9.59, 'pedrinhense', 375.753);
INSERT INTO tb_cidades VALUES (4498, 'Ermo', 420519, 24, 2050, 32.09, 'ermense', 63.88);
INSERT INTO tb_cidades VALUES (4499, 'Erval Velho', 420520, 24, 4352, 21, 'ervalense', 207.238);
INSERT INTO tb_cidades VALUES (4501, 'Flor Do Sert�o', 420535, 24, 1588, 27.05, 'flor-sertanense', 58.709);
INSERT INTO tb_cidades VALUES (4503, 'Formosa Do Sul', 420543, 24, 2601, 26.12, 'formoense do sul', 99.576);
INSERT INTO tb_cidades VALUES (4505, 'Fraiburgo', 420550, 24, 34553, 63.25, 'fraiburgense', 546.254);
INSERT INTO tb_cidades VALUES (4506, 'Frei Rog�rio', 420555, 24, 2474, 15.67, 'frei rogeriense', 157.846);
INSERT INTO tb_cidades VALUES (4508, 'Garopaba', 420570, 24, 18138, 156.96, 'garopabense', 115.56);
INSERT INTO tb_cidades VALUES (4510, 'Gaspar', 420590, 24, 57981, 150.07, 'gasparense', 386.357);
INSERT INTO tb_cidades VALUES (4512, 'Gr�o Par�', 420610, 24, 6223, 18.51, 'gr�o-paraense', 336.17);
INSERT INTO tb_cidades VALUES (4513, 'Gravatal', 420620, 24, 10635, 63.15, 'gravatalense', 168.418);
INSERT INTO tb_cidades VALUES (4515, 'Guaraciaba', 420640, 24, 10498, 31.75, 'guaraciabense', 330.647);
INSERT INTO tb_cidades VALUES (4517, 'Guaruj� Do Sul', 420660, 24, 4908, 48.82, 'guarujaense', 100.54);
INSERT INTO tb_cidades VALUES (4519, 'Herval D`Oeste', 420670, 24, 21239, 97.95, 'hervalense', 216.842);
INSERT INTO tb_cidades VALUES (4520, 'Ibiam', 420675, 24, 1945, 13.2, 'ibianense', 147.329);
INSERT INTO tb_cidades VALUES (4522, 'Ibirama', 420690, 24, 17330, 70.25, 'ibiramense', 246.705);
INSERT INTO tb_cidades VALUES (4524, 'Ilhota', 420710, 24, 12355, 48.75, 'ilhotense', 253.442);
INSERT INTO tb_cidades VALUES (4526, 'Imbituba', 420730, 24, 40170, 220.06, 'imbitubense', 182.541);
INSERT INTO tb_cidades VALUES (4527, 'Imbuia', 420740, 24, 5707, 46.82, 'imbuiense', 121.9);
INSERT INTO tb_cidades VALUES (4529, 'Iomer�', 420757, 24, 2739, 23.87, 'iomerense', 114.733);
INSERT INTO tb_cidades VALUES (5426, 'Zacarias', 355715, 26, 2335, 7.32, 'zacariense', 319.139);
INSERT INTO tb_cidades VALUES (4532, 'Ipua�u', 420768, 24, 6798, 26.01, 'ipua�uense', 261.391);
INSERT INTO tb_cidades VALUES (4533, 'Ipumirim', 420770, 24, 7220, 29.22, 'ipumiriense', 247.067);
INSERT INTO tb_cidades VALUES (4535, 'Irani', 420780, 24, 9531, 29.14, 'iraniense', 327.049);
INSERT INTO tb_cidades VALUES (4537, 'Irine�polis', 420790, 24, 10448, 17.67, 'irineopolitense', 591.292);
INSERT INTO tb_cidades VALUES (4538, 'It�', 420800, 24, 6426, 38.84, 'itaense', 165.463);
INSERT INTO tb_cidades VALUES (4540, 'Itaja�', 420820, 24, 183373, 633.75, 'itajaiense', 289.345);
INSERT INTO tb_cidades VALUES (4542, 'Itapiranga', 420840, 24, 15409, 55.01, 'itapiranguense', 280.114);
INSERT INTO tb_cidades VALUES (4544, 'Ituporanga', 420850, 24, 22250, 66.03, 'ituporanguense', 336.957);
INSERT INTO tb_cidades VALUES (4545, 'Jabor�', 420860, 24, 4041, 21.14, 'jaboraense', 191.119);
INSERT INTO tb_cidades VALUES (4547, 'Jaguaruna', 420880, 24, 17290, 52.49, 'jaguarunense', 329.371);
INSERT INTO tb_cidades VALUES (4549, 'Jardin�polis', 420895, 24, 1766, 25.93, 'jardinopolense', 68.098);
INSERT INTO tb_cidades VALUES (4551, 'Joinville', 420910, 24, 515288, 449.3, 'joinvilense', 1146.873);
INSERT INTO tb_cidades VALUES (4552, 'Jos� Boiteux', 420915, 24, 4721, 11.64, 'jos�-boatense', 405.52);
INSERT INTO tb_cidades VALUES (4554, 'Lacerd�polis', 420920, 24, 2199, 32.12, 'lacerdopolitano', 68.453);
INSERT INTO tb_cidades VALUES (4556, 'Laguna', 420940, 24, 51562, 117, 'lagunense', 440.707);
INSERT INTO tb_cidades VALUES (4558, 'Laurentino', 420950, 24, 6004, 75.52, 'laurentinense', 79.506);
INSERT INTO tb_cidades VALUES (4559, 'Lauro Muller', 420960, 24, 14367, 53.11, 'lauro-milense', 270.511);
INSERT INTO tb_cidades VALUES (4561, 'Leoberto Leal', 420980, 24, 3365, 11.56, 'leobertense', 291.192);
INSERT INTO tb_cidades VALUES (4563, 'Lontras', 420990, 24, 10244, 51.63, 'lontrense', 198.398);
INSERT INTO tb_cidades VALUES (4564, 'Luiz Alves', 421000, 24, 10438, 40.13, 'luiz-alvense', 260.081);
INSERT INTO tb_cidades VALUES (4566, 'Macieira', 421005, 24, 1826, 7.02, 'macieirense', 260.074);
INSERT INTO tb_cidades VALUES (4568, 'Major Gercino', 421020, 24, 3279, 11.48, 'majorense', 285.679);
INSERT INTO tb_cidades VALUES (4570, 'Maracaj�', 421040, 24, 6404, 101.01, 'maracajaense', 63.401);
INSERT INTO tb_cidades VALUES (4571, 'Maravilha', 421050, 24, 22101, 130.43, 'maravilhense', 169.447);
INSERT INTO tb_cidades VALUES (4573, 'Massaranduba', 421060, 24, 14674, 39.31, 'massarandubense', 373.297);
INSERT INTO tb_cidades VALUES (4575, 'Meleiro', 421080, 24, 7000, 37.51, 'meleirense', 186.619);
INSERT INTO tb_cidades VALUES (4577, 'Modelo', 421090, 24, 4045, 43.63, 'modelense', 92.717);
INSERT INTO tb_cidades VALUES (4579, 'Monte Carlo', 421105, 24, 9312, 48.06, 'montecarlense', 193.763);
INSERT INTO tb_cidades VALUES (4581, 'Morro Da Fuma�a', 421120, 24, 16126, 194.44, 'fumacense', 82.935);
INSERT INTO tb_cidades VALUES (4582, 'Morro Grande', 421125, 24, 2890, 11.27, 'morrograndense', 256.416);
INSERT INTO tb_cidades VALUES (4584, 'Nova Erechim', 421140, 24, 4275, 66.38, 'nova-erechinense', 64.402);
INSERT INTO tb_cidades VALUES (4586, 'Nova Trento', 421150, 24, 12190, 30.31, 'nova-trentino', 402.119);
INSERT INTO tb_cidades VALUES (4587, 'Nova Veneza', 421160, 24, 13309, 45.34, 'veneziano', 293.54);
INSERT INTO tb_cidades VALUES (4589, 'Orleans', 421170, 24, 21393, 38.91, 'orleanense', 549.827);
INSERT INTO tb_cidades VALUES (4591, 'Ouro', 421180, 24, 7372, 34.66, 'ourense', 212.669);
INSERT INTO tb_cidades VALUES (4592, 'Ouro Verde', 421185, 24, 2271, 12, 'ouro-verdense', 189.269);
INSERT INTO tb_cidades VALUES (4594, 'Painel', 421189, 24, 2353, 3.18, 'painelense', 739.842);
INSERT INTO tb_cidades VALUES (4596, 'Palma Sola', 421200, 24, 7765, 23.4, 'palma-solense', 331.777);
INSERT INTO tb_cidades VALUES (4598, 'Palmitos', 421210, 24, 16020, 45.68, 'palmitense', 350.692);
INSERT INTO tb_cidades VALUES (4599, 'Papanduva', 421220, 24, 17928, 23.59, 'papanduvense', 759.834);
INSERT INTO tb_cidades VALUES (4601, 'Passo De Torres', 421225, 24, 6627, 69.61, 'passotorrense', 95.196);
INSERT INTO tb_cidades VALUES (4603, 'Paulo Lopes', 421230, 24, 6692, 14.86, 'paulo-lopense', 450.374);
INSERT INTO tb_cidades VALUES (4605, 'Penha', 421250, 24, 25141, 405.72, 'penhense', 61.966);
INSERT INTO tb_cidades VALUES (4606, 'Peritiba', 421260, 24, 2988, 31, 'peritibense', 96.402);
INSERT INTO tb_cidades VALUES (4608, 'Pinhalzinho', 421290, 24, 16332, 127.3, 'pinhalense', 128.298);
INSERT INTO tb_cidades VALUES (4610, 'Piratuba', 421310, 24, 4786, 32.85, 'piratubense', 145.704);
INSERT INTO tb_cidades VALUES (4612, 'Pomerode', 421320, 24, 27759, 128.57, 'pomerodense', 215.905);
INSERT INTO tb_cidades VALUES (4613, 'Ponte Alta', 421330, 24, 4894, 8.64, 'ponte-altense', 566.753);
INSERT INTO tb_cidades VALUES (4615, 'Ponte Serrada', 421340, 24, 11031, 19.56, 'ponte-serradense', 564.001);
INSERT INTO tb_cidades VALUES (4617, 'Porto Uni�o', 421360, 24, 33493, 39.35, 'porto-unionense', 851.244);
INSERT INTO tb_cidades VALUES (4619, 'Praia Grande', 421380, 24, 7267, 26.09, 'praia-grandense', 278.576);
INSERT INTO tb_cidades VALUES (4620, 'Presidente Castello Branco', 421390, 24, 1725, 26.39, 'castelinense', 65.361);
INSERT INTO tb_cidades VALUES (4622, 'Presidente Nereu', 421410, 24, 2284, 10.17, 'nereusense', 224.674);
INSERT INTO tb_cidades VALUES (4624, 'Quilombo', 421420, 24, 10248, 36.69, 'quilombense', 279.281);
INSERT INTO tb_cidades VALUES (4626, 'Rio Das Antas', 421440, 24, 6143, 19.37, 'rio-antense', 317.188);
INSERT INTO tb_cidades VALUES (4627, 'Rio Do Campo', 421450, 24, 6192, 12.23, 'rio-campense', 506.199);
INSERT INTO tb_cidades VALUES (4629, 'Rio Do Sul', 421480, 24, 61198, 236.83, 'rio-sulense', 258.402);
INSERT INTO tb_cidades VALUES (4631, 'Rio Fortuna', 421490, 24, 4446, 14.73, 'rio-fortunense', 301.932);
INSERT INTO tb_cidades VALUES (4632, 'Rio Negrinho', 421500, 24, 39846, 43.86, 'rio-negrinhense', 908.401);
INSERT INTO tb_cidades VALUES (4634, 'Riqueza', 421507, 24, 4838, 25.43, 'riquezense', 190.279);
INSERT INTO tb_cidades VALUES (4636, 'Romel�ndia', 421520, 24, 5551, 24.81, 'romelandino', 223.75);
INSERT INTO tb_cidades VALUES (4637, 'Salete', 421530, 24, 7370, 41.1, 'saletense', 179.309);
INSERT INTO tb_cidades VALUES (4639, 'Salto Veloso', 421540, 24, 4301, 40.95, 'velosoense', 105.041);
INSERT INTO tb_cidades VALUES (4641, 'Santa Cec�lia', 421550, 24, 15757, 13.76, 'ceciliense', 1145.324);
INSERT INTO tb_cidades VALUES (4643, 'Santa Rosa De Lima', 421560, 24, 2065, 10.17, 'rosa-limense', 202.977);
INSERT INTO tb_cidades VALUES (4645, 'Santa Terezinha', 421567, 24, 8767, 12.24, 'terezinhense', 716.254);
INSERT INTO tb_cidades VALUES (4646, 'Santa Terezinha Do Progresso', 421568, 24, 2896, 24.34, 'terezinhano', 118.998);
INSERT INTO tb_cidades VALUES (4648, 'Santo Amaro Da Imperatriz', 421570, 24, 19823, 57.46, 'santo-amarense', 344.968);
INSERT INTO tb_cidades VALUES (4650, 'S�o Bernardino', 421575, 24, 2677, 18.47, 'bernardinense', 144.96);
INSERT INTO tb_cidades VALUES (4651, 'S�o Bonif�cio', 421590, 24, 3008, 6.52, 's�o-bonifacense', 461.302);
INSERT INTO tb_cidades VALUES (4653, 'S�o Cristov�o Do Sul', 421605, 24, 5012, 14.36, 's�o-cristovense ', 348.967);
INSERT INTO tb_cidades VALUES (4655, 'S�o Francisco Do Sul', 421620, 24, 42520, 86.25, 'francisquense', 492.973);
INSERT INTO tb_cidades VALUES (4658, 'S�o Jo�o Do Oeste', 421625, 24, 6036, 36.88, 's�o-joanense', 163.651);
INSERT INTO tb_cidades VALUES (4660, 'S�o Joaquim', 421650, 24, 24812, 13.16, 'joaquinense', 1885.61);
INSERT INTO tb_cidades VALUES (4661, 'S�o Jos�', 421660, 24, 209804, 1.388, 'josefense', 151.137);
INSERT INTO tb_cidades VALUES (4663, 'S�o Jos� Do Cerrito', 421680, 24, 9273, 9.8, 'cerritense', 946.246);
INSERT INTO tb_cidades VALUES (4665, 'S�o Ludgero', 421700, 24, 10993, 102.19, 's�o-ludgerense', 107.572);
INSERT INTO tb_cidades VALUES (4667, 'S�o Miguel Da Boa Vista', 421715, 24, 1904, 26.47, 'boa-vistense', 71.922);
INSERT INTO tb_cidades VALUES (4668, 'S�o Miguel Do Oeste', 421720, 24, 36306, 154.89, 'miguel-oestino', 234.399);
INSERT INTO tb_cidades VALUES (4670, 'Saudades', 421730, 24, 9016, 43.86, 'saudadense', 205.557);
INSERT INTO tb_cidades VALUES (4671, 'Schroeder', 421740, 24, 15316, 106.68, 'cheredense', 143.567);
INSERT INTO tb_cidades VALUES (4673, 'Serra Alta', 421755, 24, 3285, 36.32, 'serra-altense', 90.444);
INSERT INTO tb_cidades VALUES (4675, 'Sombrio', 421770, 24, 26613, 186.43, 'sombriense', 142.753);
INSERT INTO tb_cidades VALUES (4677, 'Tai�', 421780, 24, 17260, 24.91, 'taioense', 693.026);
INSERT INTO tb_cidades VALUES (4678, 'Tangar�', 421790, 24, 8674, 22.29, 'tangaraense', 389.187);
INSERT INTO tb_cidades VALUES (4680, 'Tijucas', 421800, 24, 30960, 111.69, 'tijucano', 277.204);
INSERT INTO tb_cidades VALUES (4682, 'Timb�', 421820, 24, 36774, 288.99, 'timboense', 127.249);
INSERT INTO tb_cidades VALUES (4684, 'Tr�s Barras', 421830, 24, 18129, 41.38, 'tr�s-barrense', 438.066);
INSERT INTO tb_cidades VALUES (4685, 'Treviso', 421835, 24, 3527, 22.37, 'trevisano', 157.668);
INSERT INTO tb_cidades VALUES (4687, 'Treze T�lias', 421850, 24, 6341, 34.24, 'treze-tiliense', 185.206);
INSERT INTO tb_cidades VALUES (4689, 'Tubar�o', 421870, 24, 97235, 323.76, 'tubaronense', 300.335);
INSERT INTO tb_cidades VALUES (4690, 'Tun�polis', 421875, 24, 4633, 34.86, 'tunapolitano', 132.909);
INSERT INTO tb_cidades VALUES (4692, 'Uni�o Do Oeste', 421885, 24, 2910, 31.27, 'uni�o-oestense', 93.059);
INSERT INTO tb_cidades VALUES (4694, 'Urupema', 421895, 24, 2482, 7.03, 'urupemense', 353.126);
INSERT INTO tb_cidades VALUES (4696, 'Varge�o', 421910, 24, 3532, 21.22, 'vargeonense', 166.446);
INSERT INTO tb_cidades VALUES (4697, 'Vargem', 421915, 24, 2808, 8.02, 'vargense', 350.125);
INSERT INTO tb_cidades VALUES (4699, 'Vidal Ramos', 421920, 24, 6290, 18.55, 'vidal-ramense', 339.061);
INSERT INTO tb_cidades VALUES (4701, 'Vitor Meireles', 421935, 24, 5207, 14.01, 'vitor-meirelense', 371.564);
INSERT INTO tb_cidades VALUES (4703, 'Xanxer�', 421950, 24, 44128, 116.88, 'xanxerense', 377.554);
INSERT INTO tb_cidades VALUES (4705, 'Xaxim', 421970, 24, 25713, 87.25, 'xaxiense', 294.716);
INSERT INTO tb_cidades VALUES (4706, 'Zort�a', 421985, 24, 2991, 15.73, 'zorteense', 190.149);
INSERT INTO tb_cidades VALUES (4708, 'Aquidab�', 280020, 25, 20056, 55.82, 'aquidab�ense', 359.284);
INSERT INTO tb_cidades VALUES (4710, 'Arau�', 280040, 25, 10878, 56.44, 'arauaense', 192.728);
INSERT INTO tb_cidades VALUES (4712, 'Barra Dos Coqueiros', 280060, 25, 24976, 276.52, 'barra-coqueirense', 90.322);
INSERT INTO tb_cidades VALUES (4713, 'Boquim', 280067, 25, 25533, 123.98, 'boquinense', 205.938);
INSERT INTO tb_cidades VALUES (4715, 'Campo Do Brito', 280100, 25, 16749, 83.03, 'campo-britense', 201.724);
INSERT INTO tb_cidades VALUES (4717, 'Canind� De S�o Francisco', 280120, 25, 24686, 27.36, 'canindense', 902.241);
INSERT INTO tb_cidades VALUES (4718, 'Capela', 280130, 25, 30761, 69.48, 'capelense', 442.742);
INSERT INTO tb_cidades VALUES (4720, 'Carm�polis', 280150, 25, 13503, 294.15, 'carmopolense', 45.905);
INSERT INTO tb_cidades VALUES (4722, 'Cristin�polis', 280170, 25, 16519, 69.94, 'cristinapolense', 236.185);
INSERT INTO tb_cidades VALUES (4724, 'Divina Pastora', 280200, 25, 4326, 47.13, 'divina-pastorense', 91.791);
INSERT INTO tb_cidades VALUES (4726, 'Feira Nova', 280220, 25, 5324, 28.79, 'feira-novense', 184.932);
INSERT INTO tb_cidades VALUES (4727, 'Frei Paulo', 280230, 25, 13874, 34.65, 'frei-paulense', 400.361);
INSERT INTO tb_cidades VALUES (4729, 'General Maynard', 280250, 25, 2929, 146.63, 'mainardense', 19.975);
INSERT INTO tb_cidades VALUES (4731, 'Ilha Das Flores', 280270, 25, 8348, 152.78, 'ilha-florense', 54.639);
INSERT INTO tb_cidades VALUES (4733, 'Itabaiana', 280290, 25, 86967, 258.3, 'itabaianense', 336.692);
INSERT INTO tb_cidades VALUES (4734, 'Itabaianinha', 280300, 25, 38910, 78.88, 'itabaianinhense', 493.311);
INSERT INTO tb_cidades VALUES (4736, 'Itaporanga D`Ajuda', 280320, 25, 30419, 41.11, 'itaporanguense', 739.922);
INSERT INTO tb_cidades VALUES (4738, 'Japoat�', 280340, 25, 12938, 31.76, 'japoat�nense', 407.419);
INSERT INTO tb_cidades VALUES (4740, 'Laranjeiras', 280360, 25, 26902, 165.78, 'laranjeirense', 162.279);
INSERT INTO tb_cidades VALUES (4741, 'Macambira', 280370, 25, 6401, 46.74, 'macambirense', 136.936);
INSERT INTO tb_cidades VALUES (4743, 'Malhador', 280390, 25, 12042, 119.3, 'malhadorense', 100.941);
INSERT INTO tb_cidades VALUES (4745, 'Moita Bonita', 280410, 25, 11001, 114.81, 'moita-bonitense', 95.819);
INSERT INTO tb_cidades VALUES (4747, 'Muribeca', 280430, 25, 7344, 96.81, 'muribequense', 75.863);
INSERT INTO tb_cidades VALUES (4748, 'Ne�polis', 280440, 25, 18506, 69.58, 'neopolense', 265.951);
INSERT INTO tb_cidades VALUES (4750, 'Nossa Senhora Da Gl�ria', 280450, 25, 32497, 42.96, 'glorense', 756.486);
INSERT INTO tb_cidades VALUES (4752, 'Nossa Senhora De Lourdes', 280470, 25, 6238, 76.95, 'lourdense', 81.061);
INSERT INTO tb_cidades VALUES (4753, 'Nossa Senhora Do Socorro', 280480, 25, 160827, 1.025, 'socorrense', 156.77);
INSERT INTO tb_cidades VALUES (4755, 'Pedra Mole', 280500, 25, 2974, 36.26, 'pedra-molense', 82.026);
INSERT INTO tb_cidades VALUES (4757, 'Pinh�o', 280520, 25, 5973, 38.32, 'pinh�oense', 155.887);
INSERT INTO tb_cidades VALUES (4758, 'Pirambu', 280530, 25, 8369, 40.65, 'pirambuense', 205.878);
INSERT INTO tb_cidades VALUES (4760, 'Po�o Verde', 280550, 25, 21983, 49.95, 'po�o-verdense', 440.131);
INSERT INTO tb_cidades VALUES (4762, 'Propri�', 280570, 25, 28451, 307.71, 'propriaense', 92.461);
INSERT INTO tb_cidades VALUES (4764, 'Riachuelo', 280590, 25, 9355, 118.51, 'riachuelense', 78.937);
INSERT INTO tb_cidades VALUES (4765, 'Ribeir�polis', 280600, 25, 17173, 66.42, 'ribeiropolense', 258.533);
INSERT INTO tb_cidades VALUES (4767, 'Salgado', 280620, 25, 19365, 78.14, 'salgadense', 247.827);
INSERT INTO tb_cidades VALUES (4769, 'Santa Rosa De Lima', 280650, 25, 3749, 55.45, 'santa-rosense', 67.607);
INSERT INTO tb_cidades VALUES (4770, 'Santana Do S�o Francisco', 280640, 25, 7038, 154.27, 'santanense', 45.62);
INSERT INTO tb_cidades VALUES (4772, 'S�o Crist�v�o', 280670, 25, 78864, 180.52, 's�o-crist�vense', 436.861);
INSERT INTO tb_cidades VALUES (4774, 'S�o Francisco', 280690, 25, 3393, 40.46, 's�o-francisquense', 83.854);
INSERT INTO tb_cidades VALUES (4775, 'S�o Miguel Do Aleixo', 280700, 25, 3698, 25.66, 'aleixense', 144.088);
INSERT INTO tb_cidades VALUES (4777, 'Siriri', 280720, 25, 8004, 48.27, 'siririense', 165.812);
INSERT INTO tb_cidades VALUES (4779, 'Tobias Barreto', 280740, 25, 48040, 47.04, 'tobiense', 1021.304);
INSERT INTO tb_cidades VALUES (4781, 'Umba�ba', 280760, 25, 22434, 185.25, 'umbaubense', 121.1);
INSERT INTO tb_cidades VALUES (4784, 'Agua�', 350030, 26, 32148, 67.72, 'aguaiano', 474.741);
INSERT INTO tb_cidades VALUES (4786, '�guas De Lind�ia', 350050, 26, 17266, 287.16, 'lindoiense', 60.126);
INSERT INTO tb_cidades VALUES (4788, '�guas De S�o Pedro', 350060, 26, 2707, 504.1, '�gua-pedrense', 5.37);
INSERT INTO tb_cidades VALUES (4789, 'Agudos', 350070, 26, 34524, 35.73, 'agudense', 966.161);
INSERT INTO tb_cidades VALUES (4791, 'Alfredo Marcondes', 350080, 26, 3891, 32.86, 'marcondense', 118.399);
INSERT INTO tb_cidades VALUES (4793, 'Altin�polis', 350100, 26, 15607, 16.78, 'altinopolense', 929.836);
INSERT INTO tb_cidades VALUES (4794, 'Alto Alegre', 350110, 26, 4102, 12.86, 'alto-alegrense', 319.035);
INSERT INTO tb_cidades VALUES (4797, '�lvares Machado', 350130, 26, 23513, 67.69, 'machadense', 347.378);
INSERT INTO tb_cidades VALUES (4798, '�lvaro De Carvalho', 350140, 26, 4650, 30.36, '�lvaro-carvalhense', 153.165);
INSERT INTO tb_cidades VALUES (4800, 'Americana', 350160, 26, 210638, 1.579, 'americanense', 133.35);
INSERT INTO tb_cidades VALUES (4802, 'Am�rico De Campos', 350180, 26, 5706, 22.54, 'americampense', 253.101);
INSERT INTO tb_cidades VALUES (4803, 'Amparo', 350190, 26, 65829, 147.75, 'amparense', 445.553);
INSERT INTO tb_cidades VALUES (4805, 'Andradina', 350210, 26, 55334, 57.39, 'andradinense', 964.191);
INSERT INTO tb_cidades VALUES (4807, 'Anhembi', 350230, 26, 5653, 7.68, 'anhembiense', 736.509);
INSERT INTO tb_cidades VALUES (4808, 'Anhumas', 350240, 26, 3738, 11.67, 'anhumense', 320.419);
INSERT INTO tb_cidades VALUES (4810, 'Aparecida D`Oeste', 350260, 26, 4450, 24.86, 'aparecidense', 179.016);
INSERT INTO tb_cidades VALUES (4812, 'Ara�ariguama', 350275, 26, 17080, 116.72, 'ara�ariguamense', 146.339);
INSERT INTO tb_cidades VALUES (4814, 'Ara�oiaba Da Serra', 350290, 26, 27299, 106.87, 'ara�oiabano', 255.446);
INSERT INTO tb_cidades VALUES (4816, 'Arandu', 350310, 26, 6123, 21.42, 'aranduense', 285.908);
INSERT INTO tb_cidades VALUES (4817, 'Arape�', 350315, 26, 2493, 15.9, 'arapeiense', 156.835);
INSERT INTO tb_cidades VALUES (4819, 'Araras', 350330, 26, 118843, 184.3, 'ararense', 644.831);
INSERT INTO tb_cidades VALUES (4821, 'Arealva', 350340, 26, 7841, 15.53, 'arealvense', 504.974);
INSERT INTO tb_cidades VALUES (4823, 'Arei�polis', 350360, 26, 10579, 123.34, 'areiopolitano', 85.768);
INSERT INTO tb_cidades VALUES (4825, 'Artur Nogueira', 350380, 26, 44177, 248.15, 'nogueirense', 178.026);
INSERT INTO tb_cidades VALUES (4826, 'Aruj�', 350390, 26, 74905, 777.35, 'arujaense', 96.359);
INSERT INTO tb_cidades VALUES (4828, 'Assis', 350400, 26, 95144, 206.7, 'assisense', 460.308);
INSERT INTO tb_cidades VALUES (4830, 'Auriflama', 350420, 26, 14202, 32.72, 'auriflamense', 433.986);
INSERT INTO tb_cidades VALUES (4832, 'Avanhandava', 350440, 26, 11310, 33.4, 'avanhandavense', 338.645);
INSERT INTO tb_cidades VALUES (4833, 'Avar�', 350450, 26, 82934, 68.37, 'avareense', 1213.057);
INSERT INTO tb_cidades VALUES (4835, 'Balbinos', 350470, 26, 3702, 40.4, 'balbinense', 91.635);
INSERT INTO tb_cidades VALUES (4837, 'Bananal', 350490, 26, 10223, 16.59, 'bananalense', 616.04);
INSERT INTO tb_cidades VALUES (4839, 'Barbosa', 350510, 26, 6593, 32.14, 'barbosano', 205.15);
INSERT INTO tb_cidades VALUES (4840, 'Bariri', 350520, 26, 31593, 71.14, 'baririense', 444.069);
INSERT INTO tb_cidades VALUES (4842, 'Barra Do Chap�u', 350535, 26, 5244, 12.93, 'barrense', 405.681);
INSERT INTO tb_cidades VALUES (4844, 'Barretos', 350550, 26, 112101, 71.6, 'barretense', 1565.64);
INSERT INTO tb_cidades VALUES (4845, 'Barrinha', 350560, 26, 28496, 195.66, 'barrinhense', 145.643);
INSERT INTO tb_cidades VALUES (4847, 'Bastos', 350580, 26, 20445, 118.95, 'bastense', 171.885);
INSERT INTO tb_cidades VALUES (4849, 'Bauru', 350600, 26, 343937, 515.12, 'bauruense', 667.681);
INSERT INTO tb_cidades VALUES (4851, 'Bento De Abreu', 350620, 26, 2674, 8.87, 'bento-abreuense', 301.395);
INSERT INTO tb_cidades VALUES (4853, 'Bertioga', 350635, 26, 47645, 97.23, 'bertioguense', 490.03);
INSERT INTO tb_cidades VALUES (4854, 'Bilac', 350640, 26, 7048, 44.63, 'bilaquense', 157.903);
INSERT INTO tb_cidades VALUES (4856, 'Biritiba Mirim', 350660, 26, 28575, 90.1, 'biritibano', 317.158);
INSERT INTO tb_cidades VALUES (4858, 'Bocaina', 350680, 26, 10859, 29.84, 'bocainense', 363.927);
INSERT INTO tb_cidades VALUES (4859, 'Bofete', 350690, 26, 9618, 14.72, 'bofetense', 653.542);
INSERT INTO tb_cidades VALUES (4861, 'Bom Jesus Dos Perd�es', 350710, 26, 19708, 183.08, 'perdoense', 107.647);
INSERT INTO tb_cidades VALUES (4863, 'Bor�', 350720, 26, 805, 6.8, 'boraense', 118.45);
INSERT INTO tb_cidades VALUES (4864, 'Borac�ia', 350730, 26, 4268, 34.95, 'boraceense', 122.11);
INSERT INTO tb_cidades VALUES (4866, 'Borebi', 350745, 26, 2293, 6.59, 'borebiense', 347.989);
INSERT INTO tb_cidades VALUES (4868, 'Bragan�a Paulista', 350760, 26, 146744, 286.26, 'bragantino', 512.622);
INSERT INTO tb_cidades VALUES (4870, 'Brejo Alegre', 350775, 26, 2573, 24.41, 'brejoalegrense', 105.399);
INSERT INTO tb_cidades VALUES (4871, 'Brodowski', 350780, 26, 21107, 75.51, 'brodosquiano', 279.521);
INSERT INTO tb_cidades VALUES (4873, 'Buri', 350800, 26, 18563, 15.52, 'buriense', 1195.911);
INSERT INTO tb_cidades VALUES (4875, 'Buritizal', 350820, 26, 4053, 15.21, 'buritinense', 266.42);
INSERT INTO tb_cidades VALUES (4877, 'Cabre�va', 350840, 26, 41604, 159.91, 'cabreuvano', 260.164);
INSERT INTO tb_cidades VALUES (4878, 'Ca�apava', 350850, 26, 84752, 228.91, 'ca�apavense', 370.247);
INSERT INTO tb_cidades VALUES (4880, 'Caconde', 350870, 26, 18538, 39.44, 'cacondense', 469.98);
INSERT INTO tb_cidades VALUES (4882, 'Caiabu', 350890, 26, 4072, 16.11, 'caiabuense', 252.84);
INSERT INTO tb_cidades VALUES (4884, 'Caiu�', 350910, 26, 5039, 9.13, 'caiuense', 552.141);
INSERT INTO tb_cidades VALUES (4885, 'Cajamar', 350920, 26, 64114, 487.92, 'cajamarense', 131.403);
INSERT INTO tb_cidades VALUES (4887, 'Cajobi', 350930, 26, 9768, 55.22, 'cajobiense', 176.897);
INSERT INTO tb_cidades VALUES (4889, 'Campina Do Monte Alegre', 350945, 26, 5567, 30.09, 'campinense', 185.031);
INSERT INTO tb_cidades VALUES (4891, 'Campo Limpo Paulista', 350960, 26, 74074, 930.79, 'campo-limpense', 79.582);
INSERT INTO tb_cidades VALUES (4893, 'Campos Novos Paulista', 350980, 26, 4539, 9.38, 'campos-novense', 483.98);
INSERT INTO tb_cidades VALUES (4894, 'Canan�ia', 350990, 26, 12226, 9.84, 'cananeiense', 1242.949);
INSERT INTO tb_cidades VALUES (4896, 'C�ndido Mota', 351000, 26, 29884, 50.12, 'c�ndido-motense', 596.211);
INSERT INTO tb_cidades VALUES (4898, 'Canitar', 351015, 26, 4369, 76.34, 'canitarense', 57.231);
INSERT INTO tb_cidades VALUES (4900, 'Capela Do Alto', 351030, 26, 17532, 103.2, 'capelense', 169.89);
INSERT INTO tb_cidades VALUES (4901, 'Capivari', 351040, 26, 48576, 150.53, 'capivariano', 322.707);
INSERT INTO tb_cidades VALUES (4903, 'Carapicu�ba', 351060, 26, 369584, 10.68, 'carapicuibano', 34.605);
INSERT INTO tb_cidades VALUES (4905, 'Casa Branca', 351080, 26, 28307, 32.76, 'casa-branquense', 864.181);
INSERT INTO tb_cidades VALUES (4907, 'Castilho', 351100, 26, 18003, 16.89, 'castilhense', 1065.804);
INSERT INTO tb_cidades VALUES (4908, 'Catanduva', 351110, 26, 112820, 388.24, 'catanduvense', 290.596);
INSERT INTO tb_cidades VALUES (4910, 'Cedral', 351130, 26, 7972, 40.38, 'cedralense', 197.429);
INSERT INTO tb_cidades VALUES (4913, 'Ces�rio Lange', 351160, 26, 15540, 81.46, 'cesariano-lange', 190.767);
INSERT INTO tb_cidades VALUES (4915, 'Chavantes', 355720, 26, 12114, 64.4, 'chavantense', 188.102);
INSERT INTO tb_cidades VALUES (4916, 'Clementina', 351190, 26, 7065, 41.85, 'clementinense', 168.836);
INSERT INTO tb_cidades VALUES (4918, 'Col�mbia', 351210, 26, 5994, 8.22, 'colombiano', 729.254);
INSERT INTO tb_cidades VALUES (4920, 'Conchas', 351230, 26, 16288, 34.95, 'conchense', 466.024);
INSERT INTO tb_cidades VALUES (4922, 'Coroados', 351250, 26, 5238, 21.26, 'coroadense', 246.357);
INSERT INTO tb_cidades VALUES (4924, 'Corumbata�', 351270, 26, 3874, 13.9, 'corumbataiense', 278.622);
INSERT INTO tb_cidades VALUES (4925, 'Cosm�polis', 351280, 26, 58827, 380.37, 'cosmopolense', 154.659);
INSERT INTO tb_cidades VALUES (4927, 'Cotia', 351300, 26, 201150, 622.55, 'cotiano', 323.104);
INSERT INTO tb_cidades VALUES (4928, 'Cravinhos', 351310, 26, 31691, 101.84, 'cravinhense', 311.193);
INSERT INTO tb_cidades VALUES (4930, 'Cruz�lia', 351330, 26, 2274, 15.26, 'cruzaliense', 149.054);
INSERT INTO tb_cidades VALUES (4932, 'Cubat�o', 351350, 26, 118720, 833.81, 'cubatonense', 142.382);
INSERT INTO tb_cidades VALUES (4934, 'Descalvado', 351370, 26, 31056, 41.2, 'descalvadense', 753.706);
INSERT INTO tb_cidades VALUES (4935, 'Diadema', 351380, 26, 386089, 12.519, 'diademense', 30.84);
INSERT INTO tb_cidades VALUES (4937, 'Divinol�ndia', 351390, 26, 11208, 50.46, 'divinolandense', 222.127);
INSERT INTO tb_cidades VALUES (4939, 'Dois C�rregos', 351410, 26, 24761, 39.12, 'dois-correguense', 632.973);
INSERT INTO tb_cidades VALUES (4941, 'Dourado', 351430, 26, 8609, 41.82, 'douradense', 205.875);
INSERT INTO tb_cidades VALUES (4943, 'Duartina', 351450, 26, 12251, 46.31, 'duartinense', 264.556);
INSERT INTO tb_cidades VALUES (4944, 'Dumont', 351460, 26, 8143, 73.19, 'dumonense', 111.254);
INSERT INTO tb_cidades VALUES (4946, 'Eldorado', 351480, 26, 14641, 8.85, 'eldoradense', 1654.259);
INSERT INTO tb_cidades VALUES (4948, 'Elisi�rio', 351492, 26, 3120, 33.2, 'elisiarense', 93.98);
INSERT INTO tb_cidades VALUES (4950, 'Embu Das Artes', 351500, 26, 240230, 3.412, 'embuense', 70.397);
INSERT INTO tb_cidades VALUES (4951, 'Embu Gua�u', 351510, 26, 62769, 405.11, 'embu-gua�uense', 154.945);
INSERT INTO tb_cidades VALUES (4953, 'Engenheiro Coelho', 351515, 26, 15721, 142.99, 'engenheiro coelhense', 109.941);
INSERT INTO tb_cidades VALUES (4955, 'Esp�rito Santo Do Turvo', 351519, 26, 4244, 21.92, 'esp�rito santense', 193.656);
INSERT INTO tb_cidades VALUES (4957, 'Estrela D`Oeste', 351520, 26, 8208, 27.69, 'estrelense', 296.41);
INSERT INTO tb_cidades VALUES (4958, 'Estrela Do Norte', 351530, 26, 2658, 10.09, 'estrelense', 263.42);
INSERT INTO tb_cidades VALUES (4960, 'Fartura', 351540, 26, 15320, 35.7, 'farturense', 429.172);
INSERT INTO tb_cidades VALUES (4962, 'Fernand�polis', 351550, 26, 64696, 117.62, 'fernandopolense', 550.033);
INSERT INTO tb_cidades VALUES (4963, 'Fern�o', 351565, 26, 1563, 15.51, 'fern�oense', 100.761);
INSERT INTO tb_cidades VALUES (4965, 'Flora Rica', 351580, 26, 1752, 7.78, 'flora-riquense', 225.299);
INSERT INTO tb_cidades VALUES (4966, 'Floreal', 351590, 26, 3003, 14.7, 'florealense', 204.296);
INSERT INTO tb_cidades VALUES (4968, 'Fl�rida Paulista', 351600, 26, 12848, 24.47, 'floridense', 525.083);
INSERT INTO tb_cidades VALUES (4970, 'Francisco Morato', 351630, 26, 154472, 3.13, 'moratense', 49.345);
INSERT INTO tb_cidades VALUES (4972, 'Gabriel Monteiro', 351650, 26, 2708, 19.55, 'monteirense', 138.546);
INSERT INTO tb_cidades VALUES (4973, 'G�lia', 351660, 26, 7011, 19.69, 'galiense', 356.011);
INSERT INTO tb_cidades VALUES (4975, 'Gast�o Vidigal', 351680, 26, 4193, 23.17, 'vidigalense', 180.938);
INSERT INTO tb_cidades VALUES (4977, 'General Salgado', 351690, 26, 10669, 21.63, 'salgadense', 493.348);
INSERT INTO tb_cidades VALUES (4979, 'Glic�rio', 351710, 26, 4565, 16.69, 'glicerense', 273.553);
INSERT INTO tb_cidades VALUES (4980, 'Guai�ara', 351720, 26, 10670, 39.48, 'guai�arense', 270.23);
INSERT INTO tb_cidades VALUES (4982, 'Gua�ra', 351740, 26, 37404, 29.72, 'guairense', 1258.476);
INSERT INTO tb_cidades VALUES (4984, 'Guapiara', 351760, 26, 17998, 44.08, 'guapiense', 408.293);
INSERT INTO tb_cidades VALUES (4986, 'Guara�a�', 351780, 26, 8435, 14.8, 'guara�aiense', 569.87);
INSERT INTO tb_cidades VALUES (4988, 'Guarani D`Oeste', 351800, 26, 1970, 23.03, 'guaraniense', 85.53);
INSERT INTO tb_cidades VALUES (4989, 'Guarant�', 351810, 26, 6404, 13.89, 'guarant�ense', 461.149);
INSERT INTO tb_cidades VALUES (4991, 'Guararema', 351830, 26, 25844, 95.5, 'guararemense', 270.604);
INSERT INTO tb_cidades VALUES (4993, 'Guare�', 351850, 26, 14565, 25.72, 'guareiense', 566.347);
INSERT INTO tb_cidades VALUES (4995, 'Guaruj�', 351870, 26, 290752, 2.034, 'guarujaense', 142.882);
INSERT INTO tb_cidades VALUES (4996, 'Guarulhos', 351880, 26, 1221979, 3.828, 'guarulhense', 319.191);
INSERT INTO tb_cidades VALUES (4998, 'Guzol�ndia', 351890, 26, 4754, 18.86, 'guzolandense', 252.015);
INSERT INTO tb_cidades VALUES (5000, 'Holambra', 351905, 26, 11299, 172.3, 'holambrense', 65.579);
INSERT INTO tb_cidades VALUES (5002, 'Iacanga', 351910, 26, 10013, 18.29, 'iacanguense', 547.393);
INSERT INTO tb_cidades VALUES (5003, 'Iacri', 351920, 26, 6419, 19.9, 'iacriano', 322.633);
INSERT INTO tb_cidades VALUES (5005, 'Ibat�', 351930, 26, 30734, 105.74, 'ibateense', 290.663);
INSERT INTO tb_cidades VALUES (5007, 'Ibirarema', 351950, 26, 6725, 29.45, 'ibiraremense', 228.318);
INSERT INTO tb_cidades VALUES (5009, 'Ibi�na', 351970, 26, 71217, 67.34, 'ibiunense', 1057.542);
INSERT INTO tb_cidades VALUES (5010, 'Ic�m', 351980, 26, 7462, 20.58, 'icense', 362.594);
INSERT INTO tb_cidades VALUES (5012, 'Igara�u Do Tiet�', 352000, 26, 23362, 239.07, 'igara�uense', 97.72);
INSERT INTO tb_cidades VALUES (5014, 'Igarat�', 352020, 26, 8831, 30.14, 'igaratense', 292.955);
INSERT INTO tb_cidades VALUES (5016, 'Ilha Comprida', 352042, 26, 9025, 47.9, 'ilha compridense', 188.404);
INSERT INTO tb_cidades VALUES (5018, 'Ilhabela', 352040, 26, 28196, 81.13, 'ilhabelense', 347.537);
INSERT INTO tb_cidades VALUES (5019, 'Indaiatuba', 352050, 26, 201619, 647.54, 'indaiatubano', 311.363);
INSERT INTO tb_cidades VALUES (5021, 'Indiapor�', 352070, 26, 3903, 13.96, 'indiapor�ense', 279.597);
INSERT INTO tb_cidades VALUES (5023, 'Ipaussu', 352090, 26, 13663, 65.17, 'ipau�uense', 209.657);
INSERT INTO tb_cidades VALUES (5024, 'Iper�', 352100, 26, 28300, 166.42, 'iperoense', 170.048);
INSERT INTO tb_cidades VALUES (5026, 'Ipigu�', 352115, 26, 4463, 32.62, 'ipiguarense', 136.824);
INSERT INTO tb_cidades VALUES (5028, 'Ipu�', 352130, 26, 14148, 30.37, 'ipu�nense', 465.884);
INSERT INTO tb_cidades VALUES (5030, 'Irapu�', 352150, 26, 7275, 28.21, 'irapuense', 257.908);
INSERT INTO tb_cidades VALUES (5031, 'Irapuru', 352160, 26, 7789, 36.24, 'irapuruense', 214.904);
INSERT INTO tb_cidades VALUES (5033, 'Ita�', 352180, 26, 24008, 21.61, 'itaiense', 1111.182);
INSERT INTO tb_cidades VALUES (5035, 'Itaju', 352200, 26, 3246, 14.12, 'itajuense', 229.824);
INSERT INTO tb_cidades VALUES (5037, 'Ita�ca', 352215, 26, 3228, 17.64, 'itaoquense', 183.015);
INSERT INTO tb_cidades VALUES (5039, 'Itapetininga', 352230, 26, 144377, 80.65, 'itapetingano', 1790.212);
INSERT INTO tb_cidades VALUES (5040, 'Itapeva', 352240, 26, 87753, 48.05, 'itapevense', 1826.261);
INSERT INTO tb_cidades VALUES (5043, 'Itapirapu� Paulista', 352265, 26, 3880, 9.55, 'itapirapu� paulistense', 406.479);
INSERT INTO tb_cidades VALUES (5044, 'It�polis', 352270, 26, 40051, 40.18, 'itapolitano', 996.853);
INSERT INTO tb_cidades VALUES (5046, 'Itapu�', 352290, 26, 12173, 86.46, 'itapuiense', 140.799);
INSERT INTO tb_cidades VALUES (5048, 'Itaquaquecetuba', 352310, 26, 321770, 3.877, 'itaquaquecetubano', 82.979);
INSERT INTO tb_cidades VALUES (5050, 'Itariri', 352330, 26, 15471, 56.5, 'itaririense', 273.845);
INSERT INTO tb_cidades VALUES (5052, 'Itatinga', 352350, 26, 18052, 18.42, 'itatinguense', 979.819);
INSERT INTO tb_cidades VALUES (5054, 'Itirapu�', 352370, 26, 5914, 36.71, 'itirapu�nense', 161.118);
INSERT INTO tb_cidades VALUES (5055, 'Itobi', 352380, 26, 7546, 54.2, 'itobiano', 139.214);
INSERT INTO tb_cidades VALUES (5057, 'Itupeva', 352400, 26, 44859, 223.46, 'itupevense', 200.748);
INSERT INTO tb_cidades VALUES (5059, 'Jaborandi', 352420, 26, 6592, 24.11, 'jaborandiense', 273.438);
INSERT INTO tb_cidades VALUES (5061, 'Jacare�', 352440, 26, 211214, 459.48, 'jacareiense', 459.684);
INSERT INTO tb_cidades VALUES (5063, 'Jacupiranga', 352460, 26, 17208, 24.44, 'jacupiranguense', 704.09);
INSERT INTO tb_cidades VALUES (5064, 'Jaguari�na', 352470, 26, 44311, 312.56, 'jaguariunense', 141.769);
INSERT INTO tb_cidades VALUES (5066, 'Jambeiro', 352490, 26, 5349, 29.03, 'jambeirense', 184.258);
INSERT INTO tb_cidades VALUES (5068, 'Jardin�polis', 352510, 26, 37661, 74.95, 'jardinopolense', 502.482);
INSERT INTO tb_cidades VALUES (5070, 'Ja�', 352530, 26, 131040, 191.09, 'jauense', 685.762);
INSERT INTO tb_cidades VALUES (5071, 'Jeriquara', 352540, 26, 3160, 22.26, 'jeriquarense', 141.971);
INSERT INTO tb_cidades VALUES (5073, 'Jo�o Ramalho', 352560, 26, 4150, 9.99, 'ramalhense', 415.249);
INSERT INTO tb_cidades VALUES (5075, 'J�lio Mesquita', 352580, 26, 4430, 34.55, 'j�lio-mesquitense', 128.22);
INSERT INTO tb_cidades VALUES (5077, 'Jundia�', 352590, 26, 370126, 857.77, 'jundiaiense', 431.498);
INSERT INTO tb_cidades VALUES (5079, 'Juqui�', 352610, 26, 19246, 23.41, 'juquiaense', 821.976);
INSERT INTO tb_cidades VALUES (5080, 'Juquitiba', 352620, 26, 28737, 55.04, 'juquitibense', 522.064);
INSERT INTO tb_cidades VALUES (5082, 'Laranjal Paulista', 352640, 26, 25251, 65.75, 'laranjalense', 384.022);
INSERT INTO tb_cidades VALUES (5084, 'Lavrinhas', 352660, 26, 6590, 39.45, 'lavrinhense', 167.067);
INSERT INTO tb_cidades VALUES (5085, 'Leme', 352670, 26, 91756, 227.75, 'lemense', 402.873);
INSERT INTO tb_cidades VALUES (5087, 'Limeira', 352690, 26, 276022, 475.08, 'limeirense', 581.002);
INSERT INTO tb_cidades VALUES (5089, 'Lins', 352710, 26, 71432, 125.27, 'linense', 570.238);
INSERT INTO tb_cidades VALUES (5090, 'Lorena', 352720, 26, 82537, 199.19, 'lorenense', 414.358);
INSERT INTO tb_cidades VALUES (5092, 'Louveira', 352730, 26, 37125, 673.37, 'louveirense', 55.133);
INSERT INTO tb_cidades VALUES (5094, 'Lucian�polis', 352750, 26, 2249, 11.85, 'lucianopolense', 189.816);
INSERT INTO tb_cidades VALUES (5096, 'Luizi�nia', 352770, 26, 5030, 30.2, 'luiziano', 166.549);
INSERT INTO tb_cidades VALUES (5097, 'Lup�rcio', 352780, 26, 4353, 28.18, 'lupercense', 154.485);
INSERT INTO tb_cidades VALUES (5099, 'Macatuba', 352800, 26, 16259, 72.19, 'macatubense', 225.212);
INSERT INTO tb_cidades VALUES (5101, 'Maced�nia', 352820, 26, 3664, 11.18, 'macedoniense', 327.725);
INSERT INTO tb_cidades VALUES (5103, 'Mairinque', 352840, 26, 43223, 206.18, 'mairinquense', 209.636);
INSERT INTO tb_cidades VALUES (5105, 'Manduri', 352860, 26, 8992, 39.26, 'mandurinense', 229.053);
INSERT INTO tb_cidades VALUES (5107, 'Maraca�', 352880, 26, 13332, 24.97, 'maracaiense', 533.938);
INSERT INTO tb_cidades VALUES (5108, 'Marapoama', 352885, 26, 2633, 23.66, 'marapoamense', 111.267);
INSERT INTO tb_cidades VALUES (5110, 'Mar�lia', 352900, 26, 216745, 185.21, 'mariliense', 1170.252);
INSERT INTO tb_cidades VALUES (5112, 'Martin�polis', 352920, 26, 24219, 19.33, 'martinopolense', 1252.716);
INSERT INTO tb_cidades VALUES (5113, 'Mat�o', 352930, 26, 76786, 146.3, 'matonense', 524.855);
INSERT INTO tb_cidades VALUES (5115, 'Mendon�a', 352950, 26, 4640, 23.79, 'mendoncino', 195.039);
INSERT INTO tb_cidades VALUES (5117, 'Mes�polis', 352965, 26, 1886, 12.67, 'mesopolense', 148.856);
INSERT INTO tb_cidades VALUES (5119, 'Mineiros Do Tiet�', 352980, 26, 12038, 56.45, 'mineirense', 213.243);
INSERT INTO tb_cidades VALUES (5120, 'Mira Estrela', 353000, 26, 2820, 13.01, 'mira-estrelense', 216.831);
INSERT INTO tb_cidades VALUES (5122, 'Mirand�polis', 353010, 26, 27483, 29.91, 'mirandopolense', 918.801);
INSERT INTO tb_cidades VALUES (5124, 'Mirassol', 353030, 26, 53792, 221.22, 'mirassolense', 243.161);
INSERT INTO tb_cidades VALUES (5125, 'Mirassol�ndia', 353040, 26, 4295, 25.85, 'mirassolandense', 166.168);
INSERT INTO tb_cidades VALUES (5127, 'Mogi Das Cruzes', 353060, 26, 387779, 543.65, 'mogiano', 713.291);
INSERT INTO tb_cidades VALUES (5129, 'Moji Mirim', 353080, 26, 86505, 173.78, 'mogi-miriano', 497.779);
INSERT INTO tb_cidades VALUES (5131, 'Mon��es', 353100, 26, 2132, 20.45, 'mon�olense', 104.237);
INSERT INTO tb_cidades VALUES (5132, 'Mongagu�', 353110, 26, 46293, 325.72, 'mongaguano', 142.126);
INSERT INTO tb_cidades VALUES (5134, 'Monte Alto', 353130, 26, 46642, 134.61, 'monte-altense', 346.501);
INSERT INTO tb_cidades VALUES (5136, 'Monte Azul Paulista', 353150, 26, 18931, 71.86, 'monte-azulense', 263.444);
INSERT INTO tb_cidades VALUES (5138, 'Monte Mor', 353180, 26, 48949, 203.55, 'monte-morense ', 240.481);
INSERT INTO tb_cidades VALUES (5139, 'Monteiro Lobato', 353170, 26, 4120, 12.36, 'lobatense', 333.332);
INSERT INTO tb_cidades VALUES (5141, 'Morungaba', 353200, 26, 11769, 80.14, 'morungabense', 146.852);
INSERT INTO tb_cidades VALUES (5143, 'Murutinga Do Sul', 353210, 26, 4186, 16.69, 'murutinguense', 250.837);
INSERT INTO tb_cidades VALUES (5144, 'Nantes', 353215, 26, 2707, 9.46, 'nantense', 286.162);
INSERT INTO tb_cidades VALUES (5146, 'Natividade Da Serra', 353230, 26, 6678, 8.01, 'nativense', 833.372);
INSERT INTO tb_cidades VALUES (5148, 'Neves Paulista', 353250, 26, 8772, 40.18, 'nevense', 218.34);
INSERT INTO tb_cidades VALUES (5149, 'Nhandeara', 353260, 26, 10725, 24.61, 'nhandearense', 435.772);
INSERT INTO tb_cidades VALUES (5151, 'Nova Alian�a', 353280, 26, 5891, 27.11, 'nova-aliancense', 217.311);
INSERT INTO tb_cidades VALUES (5153, 'Nova Cana� Paulista', 353284, 26, 2114, 16.99, 'novacanaense', 124.419);
INSERT INTO tb_cidades VALUES (5155, 'Nova Europa', 353290, 26, 9300, 58, 'nova-europense', 160.353);
INSERT INTO tb_cidades VALUES (5156, 'Nova Granada', 353300, 26, 19180, 36.06, 'granadense', 531.885);
INSERT INTO tb_cidades VALUES (5158, 'Nova Independ�ncia', 353320, 26, 3068, 11.54, 'independentino', 265.777);
INSERT INTO tb_cidades VALUES (5160, 'Nova Odessa', 353340, 26, 51242, 694.34, 'novaodessense', 73.8);
INSERT INTO tb_cidades VALUES (5161, 'Novais', 353325, 26, 4592, 38.99, 'novaense', 117.772);
INSERT INTO tb_cidades VALUES (5163, 'Nuporanga', 353360, 26, 6817, 19.57, 'nuporanguense', 348.265);
INSERT INTO tb_cidades VALUES (5165, '�leo', 353380, 26, 2673, 13.49, 'oleense', 198.136);
INSERT INTO tb_cidades VALUES (5166, 'Ol�mpia', 353390, 26, 50024, 62.32, 'olimpiense', 802.652);
INSERT INTO tb_cidades VALUES (5168, 'Oriente', 353410, 26, 6097, 27.89, 'orientense', 218.608);
INSERT INTO tb_cidades VALUES (5170, 'Orl�ndia', 353430, 26, 39781, 136.34, 'orlandino', 291.774);
INSERT INTO tb_cidades VALUES (5428, 'Aguiarn�polis', 170030, 27, 5162, 21.93, 'aguiarnopolense', 235.393);
INSERT INTO tb_cidades VALUES (5173, 'Osvaldo Cruz', 353460, 26, 30917, 124.47, 'osvaldo-cruzense', 248.391);
INSERT INTO tb_cidades VALUES (5174, 'Ourinhos', 353470, 26, 103035, 347.78, 'ourinhense', 296.269);
INSERT INTO tb_cidades VALUES (5176, 'Ouroeste', 353475, 26, 8405, 29.1, 'ouroestense', 288.839);
INSERT INTO tb_cidades VALUES (5178, 'Palestina', 353500, 26, 11051, 15.89, 'palestinense', 695.457);
INSERT INTO tb_cidades VALUES (5180, 'Palmeira D`Oeste', 353520, 26, 9584, 30.02, 'palmeirense', 319.222);
INSERT INTO tb_cidades VALUES (5181, 'Palmital', 353530, 26, 21186, 38.67, 'palmitalense', 547.806);
INSERT INTO tb_cidades VALUES (5183, 'Paragua�u Paulista', 353550, 26, 42278, 42.28, 'paragua�uense', 999.935);
INSERT INTO tb_cidades VALUES (5185, 'Para�so', 353570, 26, 5898, 37.85, 'paraisense', 155.842);
INSERT INTO tb_cidades VALUES (5187, 'Paranapu�', 353590, 26, 3815, 27.16, 'paranapuense', 140.475);
INSERT INTO tb_cidades VALUES (5188, 'Parapu�', 353600, 26, 10844, 29.65, 'parapuense', 365.695);
INSERT INTO tb_cidades VALUES (5190, 'Pariquera A�u', 353620, 26, 18446, 51.34, 'pariquerense', 359.305);
INSERT INTO tb_cidades VALUES (5192, 'Patroc�nio Paulista', 353630, 26, 13000, 21.56, 'patrocinense', 602.848);
INSERT INTO tb_cidades VALUES (5194, 'Paul�nia', 353650, 26, 82146, 591.72, 'paulinense', 138.826);
INSERT INTO tb_cidades VALUES (5195, 'Paulist�nia', 353657, 26, 1779, 6.93, 'paulistaniense', 256.654);
INSERT INTO tb_cidades VALUES (5197, 'Pederneiras', 353670, 26, 41497, 56.92, 'pederneirense', 729.001);
INSERT INTO tb_cidades VALUES (5199, 'Pedran�polis', 353690, 26, 2558, 9.83, 'pedranopolense', 260.185);
INSERT INTO tb_cidades VALUES (5201, 'Pedreira', 353710, 26, 41558, 380.45, 'pedreirense', 109.233);
INSERT INTO tb_cidades VALUES (5202, 'Pedrinhas Paulista', 353715, 26, 2940, 19.28, 'pedrinhense', 152.515);
INSERT INTO tb_cidades VALUES (5204, 'Pen�polis', 353730, 26, 58510, 82.31, 'penapolitano', 710.826);
INSERT INTO tb_cidades VALUES (5206, 'Pereiras', 353750, 26, 7454, 33.38, 'pereirense', 223.275);
INSERT INTO tb_cidades VALUES (5207, 'Peru�be', 353760, 26, 59773, 191.95, 'peruibense', 311.394);
INSERT INTO tb_cidades VALUES (5209, 'Piedade', 353780, 26, 52143, 69.82, 'piedadense', 746.868);
INSERT INTO tb_cidades VALUES (5211, 'Pindamonhangaba', 353800, 26, 146995, 201.39, 'pindamonhangabense', 729.886);
INSERT INTO tb_cidades VALUES (5213, 'Pinhalzinho', 353820, 26, 13105, 84.8, 'pinhalense', 154.531);
INSERT INTO tb_cidades VALUES (5215, 'Piquete', 353850, 26, 14107, 80.16, 'piquetense', 175.996);
INSERT INTO tb_cidades VALUES (5216, 'Piracaia', 353860, 26, 25116, 65.23, 'piracaiense', 385.028);
INSERT INTO tb_cidades VALUES (5218, 'Piraju', 353880, 26, 28475, 56.44, 'pirajuense', 504.505);
INSERT INTO tb_cidades VALUES (5220, 'Pirangi', 353900, 26, 10623, 49.3, 'piranginense', 215.459);
INSERT INTO tb_cidades VALUES (5222, 'Pirapozinho', 353920, 26, 24694, 51.49, 'pirapozense', 479.559);
INSERT INTO tb_cidades VALUES (5223, 'Pirassununga', 353930, 26, 70081, 96.38, 'pirassununguense', 727.118);
INSERT INTO tb_cidades VALUES (5225, 'Pitangueiras', 353950, 26, 35307, 81.99, 'pitangueirense', 430.638);
INSERT INTO tb_cidades VALUES (5227, 'Platina', 353970, 26, 3192, 9.77, 'platinense', 326.734);
INSERT INTO tb_cidades VALUES (5229, 'Poloni', 353990, 26, 5395, 40.4, 'poloniense', 133.54);
INSERT INTO tb_cidades VALUES (5230, 'Pomp�ia', 354000, 26, 19964, 25.46, 'pompeiano', 784.058);
INSERT INTO tb_cidades VALUES (5232, 'Pontal', 354020, 26, 40244, 112.94, 'pontalense', 356.32);
INSERT INTO tb_cidades VALUES (5234, 'Pontes Gestal', 354030, 26, 2518, 11.58, 'pontes-gestalense', 217.378);
INSERT INTO tb_cidades VALUES (5236, 'Porangaba', 354050, 26, 8326, 31.34, 'porangabense', 265.706);
INSERT INTO tb_cidades VALUES (5238, 'Porto Ferreira', 354070, 26, 51400, 209.88, 'ferreirense', 244.906);
INSERT INTO tb_cidades VALUES (5240, 'Potirendaba', 354080, 26, 15449, 45.12, 'potirendabano', 342.376);
INSERT INTO tb_cidades VALUES (5241, 'Pracinha', 354085, 26, 2858, 45.48, 'pracinhense', 62.841);
INSERT INTO tb_cidades VALUES (5243, 'Praia Grande', 354100, 26, 262051, 1.776, 'praia-grandense', 147.544);
INSERT INTO tb_cidades VALUES (5245, 'Presidente Alves', 354110, 26, 4123, 14.36, 'alvense', 287.185);
INSERT INTO tb_cidades VALUES (5247, 'Presidente Epit�cio', 354130, 26, 41318, 32.82, 'epitaciano', 1259.089);
INSERT INTO tb_cidades VALUES (5248, 'Presidente Prudente', 354140, 26, 207610, 368.89, 'prudentino', 562.795);
INSERT INTO tb_cidades VALUES (5250, 'Promiss�o', 354160, 26, 35674, 45.65, 'promissense', 781.489);
INSERT INTO tb_cidades VALUES (5251, 'Quadra', 354165, 26, 3236, 15.73, 'quadrense', 205.663);
INSERT INTO tb_cidades VALUES (5253, 'Queiroz', 354180, 26, 2808, 12.01, 'queirozense', 233.79);
INSERT INTO tb_cidades VALUES (5255, 'Quintana', 354200, 26, 6004, 18.79, 'quintanense', 319.566);
INSERT INTO tb_cidades VALUES (5257, 'Rancharia', 354220, 26, 28804, 18.14, 'ranchariense', 1587.473);
INSERT INTO tb_cidades VALUES (5259, 'Regente Feij�', 354240, 26, 18494, 69.76, 'regentense', 265.105);
INSERT INTO tb_cidades VALUES (5260, 'Regin�polis', 354250, 26, 7323, 17.83, 'reginopolitano', 410.816);
INSERT INTO tb_cidades VALUES (5262, 'Restinga', 354270, 26, 6587, 26.8, 'restinguense', 245.746);
INSERT INTO tb_cidades VALUES (5264, 'Ribeir�o Bonito', 354290, 26, 12135, 25.73, 'ribeir�o-bonitense', 471.553);
INSERT INTO tb_cidades VALUES (5266, 'Ribeir�o Corrente', 354310, 26, 4273, 28.81, 'ribeir�o-correntense', 148.332);
INSERT INTO tb_cidades VALUES (5268, 'Ribeir�o Dos �ndios', 354323, 26, 2187, 11.14, 'ribeirindio', 196.341);
INSERT INTO tb_cidades VALUES (5269, 'Ribeir�o Grande', 354325, 26, 7422, 22.26, 'ribeir�o grandense', 333.364);
INSERT INTO tb_cidades VALUES (5271, 'Ribeir�o Preto', 354340, 26, 604682, 928.46, 'ribeir�o-pretano', 651.276);
INSERT INTO tb_cidades VALUES (5273, 'Rinc�o', 354370, 26, 10414, 32.97, 'rinconense', 315.851);
INSERT INTO tb_cidades VALUES (5275, 'Rio Claro', 354390, 26, 186253, 373.47, 'rio-clarense', 498.707);
INSERT INTO tb_cidades VALUES (5276, 'Rio Das Pedras', 354400, 26, 29501, 130.16, 'rio-pedrense', 226.657);
INSERT INTO tb_cidades VALUES (5278, 'Riol�ndia', 354420, 26, 10575, 16.7, 'riolandense', 633.375);
INSERT INTO tb_cidades VALUES (5280, 'Rosana', 354425, 26, 19691, 26.51, 'rosanense', 742.872);
INSERT INTO tb_cidades VALUES (5282, 'Rubi�cea', 354440, 26, 2729, 11.52, 'rubiacense', 236.927);
INSERT INTO tb_cidades VALUES (5283, 'Rubin�ia', 354450, 26, 2862, 12.08, 'rubineiense', 236.873);
INSERT INTO tb_cidades VALUES (5285, 'Sagres', 354470, 26, 2395, 16.2, 'sagrense', 147.802);
INSERT INTO tb_cidades VALUES (5287, 'Sales Oliveira', 354490, 26, 10568, 34.58, 'salense', 305.644);
INSERT INTO tb_cidades VALUES (5289, 'Salmour�o', 354510, 26, 4818, 27.96, 'salmourense', 172.292);
INSERT INTO tb_cidades VALUES (5290, 'Saltinho', 354515, 26, 7059, 70.77, 'saltinhense', 99.739);
INSERT INTO tb_cidades VALUES (5292, 'Salto De Pirapora', 354530, 26, 40132, 143.07, 'saltense', 280.502);
INSERT INTO tb_cidades VALUES (5294, 'Sandovalina', 354550, 26, 3699, 8.13, 'sandovalinense', 455.116);
INSERT INTO tb_cidades VALUES (5296, 'Santa Albertina', 354570, 26, 5723, 20.98, 'santa-albertinense', 272.774);
INSERT INTO tb_cidades VALUES (5297, 'Santa B�rbara D`Oeste', 354580, 26, 180009, 663.08, 'barbarense', 271.476);
INSERT INTO tb_cidades VALUES (5413, 'Valinhos', 355620, 26, 106793, 721.02, 'valinhense', 148.113);
INSERT INTO tb_cidades VALUES (5415, 'Vargem', 355635, 26, 8801, 61.64, 'vargense', 142.786);
INSERT INTO tb_cidades VALUES (5417, 'Vargem Grande Paulista', 355645, 26, 42997, 1.021, 'vargem-grandense', 42.08);
INSERT INTO tb_cidades VALUES (5418, 'V�rzea Paulista', 355650, 26, 107089, 3.076, 'varzino', 34.807);
INSERT INTO tb_cidades VALUES (5420, 'Vinhedo', 355670, 26, 63611, 779.51, 'vinhedense', 81.604);
INSERT INTO tb_cidades VALUES (5421, 'Viradouro', 355680, 26, 17297, 79.44, 'viradourense', 217.727);
INSERT INTO tb_cidades VALUES (5301, 'Santa Cruz Da Esperan�a', 354625, 26, 1953, 13.19, 'santacruzense', 148.062);
INSERT INTO tb_cidades VALUES (5303, 'Santa Cruz Do Rio Pardo', 354640, 26, 43921, 39.44, 'santa-cruzense', 1113.504);
INSERT INTO tb_cidades VALUES (5304, 'Santa Ernestina', 354650, 26, 5568, 41.42, 'santa-ernestinense', 134.421);
INSERT INTO tb_cidades VALUES (5306, 'Santa Gertrudes', 354670, 26, 21634, 220.74, 'santa-gertrudense', 98.007);
INSERT INTO tb_cidades VALUES (5308, 'Santa L�cia', 354690, 26, 8248, 53.55, 'santa-luciense', 154.033);
INSERT INTO tb_cidades VALUES (5309, 'Santa Maria Da Serra', 354700, 26, 5413, 21.05, 'serrense', 257.188);
INSERT INTO tb_cidades VALUES (5311, 'Santa Rita D`Oeste', 354740, 26, 2543, 12.1, 'santa-ritense', 210.081);
INSERT INTO tb_cidades VALUES (5313, 'Santa Rosa De Viterbo', 354760, 26, 23862, 82.69, 'santa-rosense', 288.577);
INSERT INTO tb_cidades VALUES (5314, 'Santa Salete', 354765, 26, 1447, 18.23, 'saletense', 79.389);
INSERT INTO tb_cidades VALUES (5316, 'Santana De Parna�ba', 354730, 26, 108813, 605.17, 'parnaibano', 179.807);
INSERT INTO tb_cidades VALUES (5317, 'Santo Anast�cio', 354770, 26, 20475, 37.06, 'anastaciano', 552.537);
INSERT INTO tb_cidades VALUES (5319, 'Santo Ant�nio Da Alegria', 354790, 26, 6304, 20.31, 'alegriense', 310.339);
INSERT INTO tb_cidades VALUES (5321, 'Santo Ant�nio Do Aracangu�', 354805, 26, 7626, 5.83, 'aracanguaense', 1308.236);
INSERT INTO tb_cidades VALUES (5323, 'Santo Ant�nio Do Pinhal', 354820, 26, 6486, 48.76, 'pinhalense', 133.008);
INSERT INTO tb_cidades VALUES (5324, 'Santo Expedito', 354830, 26, 2803, 29.68, 'expeditense', 94.444);
INSERT INTO tb_cidades VALUES (5326, 'Santos', 354850, 26, 419400, 1.492, 'santista', 281.056);
INSERT INTO tb_cidades VALUES (5327, 'S�o Bento Do Sapuca�', 354860, 26, 10468, 41.44, 's�o-bentista', 252.58);
INSERT INTO tb_cidades VALUES (5329, 'S�o Caetano Do Sul', 354880, 26, 149263, 9.708, 'sul-caetanense', 15.374);
INSERT INTO tb_cidades VALUES (5330, 'S�o Carlos', 354890, 26, 221950, 195.15, 's�o-carlense', 1137.303);
INSERT INTO tb_cidades VALUES (5332, 'S�o Jo�o Da Boa Vista', 354910, 26, 83639, 161.96, 's�o-joanense', 516.418);
INSERT INTO tb_cidades VALUES (5334, 'S�o Jo�o De Iracema', 354925, 26, 1780, 9.97, 'iracemense', 178.61);
INSERT INTO tb_cidades VALUES (5336, 'S�o Joaquim Da Barra', 354940, 26, 46512, 113.28, 'joaquinense', 410.597);
INSERT INTO tb_cidades VALUES (5337, 'S�o Jos� Da Bela Vista', 354950, 26, 8406, 30.35, 'bela-vistense', 276.952);
INSERT INTO tb_cidades VALUES (5339, 'S�o Jos� Do Rio Pardo', 354970, 26, 51900, 123.81, 'rio-pardense', 419.186);
INSERT INTO tb_cidades VALUES (5340, 'S�o Jos� Do Rio Preto', 354980, 26, 408258, 946.53, 'rio-pretense', 431.321);
INSERT INTO tb_cidades VALUES (5342, 'S�o Louren�o Da Serra', 354995, 26, 13973, 74.96, 's�o-lourensano', 186.401);
INSERT INTO tb_cidades VALUES (5344, 'S�o Manuel', 355010, 26, 38342, 58.92, 's�o-manuelense', 650.768);
INSERT INTO tb_cidades VALUES (5345, 'S�o Miguel Arcanjo', 355020, 26, 31450, 33.8, 's�o-miguelense', 930.34);
INSERT INTO tb_cidades VALUES (5347, 'S�o Pedro', 355040, 26, 31662, 51.82, 's�o-pedrense', 610.997);
INSERT INTO tb_cidades VALUES (5349, 'S�o Roque', 355060, 26, 78821, 257.3, 's�o-roquense', 306.34);
INSERT INTO tb_cidades VALUES (5350, 'S�o Sebasti�o', 355070, 26, 73942, 184.68, 'sebastianense', 400.387);
INSERT INTO tb_cidades VALUES (5352, 'S�o Sim�o', 355090, 26, 14346, 23.24, 'simonense', 617.202);
INSERT INTO tb_cidades VALUES (5353, 'S�o Vicente', 355100, 26, 332445, 2.232, 'vicentino', 148.926);
INSERT INTO tb_cidades VALUES (5355, 'Sarutai�', 355120, 26, 3622, 25.58, 'sarutaiano', 141.608);
INSERT INTO tb_cidades VALUES (5357, 'Serra Azul', 355140, 26, 11256, 39.77, 'serra-azulense', 283.031);
INSERT INTO tb_cidades VALUES (5358, 'Serra Negra', 355160, 26, 26387, 129.52, 'serrano', 203.736);
INSERT INTO tb_cidades VALUES (5360, 'Sert�ozinho', 355170, 26, 110074, 273.43, 'sertanezino', 402.57);
INSERT INTO tb_cidades VALUES (5362, 'Sever�nia', 355190, 26, 15501, 110.38, 'severinense', 140.432);
INSERT INTO tb_cidades VALUES (5364, 'Socorro', 355210, 26, 36686, 81.7, 'socorrense', 449.029);
INSERT INTO tb_cidades VALUES (5365, 'Sorocaba', 355220, 26, 586625, 1.306, 'sorocabano', 448.989);
INSERT INTO tb_cidades VALUES (5367, 'Sumar�', 355240, 26, 241311, 1.577, 'sumareense', 153.005);
INSERT INTO tb_cidades VALUES (5369, 'Suzano', 355250, 26, 262480, 1.27, 'suzanense', 206.617);
INSERT INTO tb_cidades VALUES (5370, 'Tabapu�', 355260, 26, 11363, 32.88, 'tabapu�nense', 345.565);
INSERT INTO tb_cidades VALUES (5372, 'Tabo�o Da Serra', 355280, 26, 244528, 12.049, 'taboense', 20.293);
INSERT INTO tb_cidades VALUES (5374, 'Tagua�', 355300, 26, 10828, 74.51, 'tagua�no', 145.332);
INSERT INTO tb_cidades VALUES (5376, 'Tai�va', 355320, 26, 5447, 41.12, 'taiuvense', 132.459);
INSERT INTO tb_cidades VALUES (5378, 'Tanabi', 355340, 26, 24055, 32.25, 'tanabiense', 745.8);
INSERT INTO tb_cidades VALUES (5379, 'Tapira�', 355350, 26, 8012, 10.61, 'tapiraiense', 755.101);
INSERT INTO tb_cidades VALUES (5381, 'Taquaral', 355365, 26, 2726, 50.58, 'taquaralense', 53.892);
INSERT INTO tb_cidades VALUES (5383, 'Taquarituba', 355380, 26, 22291, 49.71, 'taquaritubense', 448.429);
INSERT INTO tb_cidades VALUES (5385, 'Tarabai', 355390, 26, 6607, 33.57, 'taraba�no', 196.791);
INSERT INTO tb_cidades VALUES (5386, 'Tarum�', 355395, 26, 12885, 42.5, 'tarumaense', 303.184);
INSERT INTO tb_cidades VALUES (5388, 'Taubat�', 355410, 26, 278686, 445.98, 'taubateano', 624.885);
INSERT INTO tb_cidades VALUES (5390, 'Teodoro Sampaio', 355430, 26, 21386, 13.74, 'teodorense', 1555.996);
INSERT INTO tb_cidades VALUES (5392, 'Tiet�', 355450, 26, 36835, 91, 'tieteense', 404.792);
INSERT INTO tb_cidades VALUES (5394, 'Torre De Pedra', 355465, 26, 2254, 31.59, 'torrepedrense', 71.348);
INSERT INTO tb_cidades VALUES (5395, 'Torrinha', 355470, 26, 9330, 30.03, 'torrinhense', 310.699);
INSERT INTO tb_cidades VALUES (5397, 'Trememb�', 355480, 26, 40984, 214.17, 'tremembeense', 191.363);
INSERT INTO tb_cidades VALUES (5399, 'Tuiuti', 355495, 26, 5930, 46.8, 'tuiutiense', 126.699);
INSERT INTO tb_cidades VALUES (5401, 'Tupi Paulista', 355510, 26, 14269, 58.16, 'tupinense-paulista', 245.336);
INSERT INTO tb_cidades VALUES (5402, 'Turi�ba', 355520, 26, 1930, 12.6, 'turiubano', 153.126);
INSERT INTO tb_cidades VALUES (5404, 'Ubarana', 355535, 26, 5289, 25.23, 'ubaranense', 209.631);
INSERT INTO tb_cidades VALUES (5406, 'Ubirajara', 355550, 26, 4427, 15.68, 'ubirajarense', 282.368);
INSERT INTO tb_cidades VALUES (5408, 'Uni�o Paulista', 355570, 26, 1599, 20.21, 'uni�o-paulistense', 79.111);
INSERT INTO tb_cidades VALUES (5410, 'Uru', 355590, 26, 1251, 8.51, 'uruense', 146.966);
INSERT INTO tb_cidades VALUES (5411, 'Urup�s', 355600, 26, 12714, 39.27, 'urupeense', 323.746);
INSERT INTO tb_cidades VALUES (5423, 'Vit�ria Brasil', 355695, 26, 1737, 34.95, 'vitoriabrasiliense', 49.696);
INSERT INTO tb_cidades VALUES (5425, 'Votuporanga', 355710, 26, 84692, 199.69, 'votuporanguense', 424.115);
INSERT INTO tb_cidades VALUES (5427, 'Abreul�ndia', 170025, 27, 2391, 1.26, 'abreulandense ', 1895.207);
INSERT INTO tb_cidades VALUES (5429, 'Alian�a Do Tocantins', 170035, 27, 5671, 3.59, 'aliancense', 1579.748);
INSERT INTO tb_cidades VALUES (5430, 'Almas', 170040, 27, 7586, 1.89, 'almense', 4013.234);
INSERT INTO tb_cidades VALUES (5432, 'Anan�s', 170100, 27, 9865, 6.26, 'ananaense ', 1576.967);
INSERT INTO tb_cidades VALUES (5434, 'Aparecida Do Rio Negro', 170110, 27, 4213, 3.63, 'aparecidense', 1160.365);
INSERT INTO tb_cidades VALUES (5436, 'Araguacema', 170190, 27, 6317, 2.27, 'araguacemense', 2778.468);
INSERT INTO tb_cidades VALUES (5437, 'Aragua�u', 170200, 27, 8786, 1.7, 'aragua�uense', 5167.943);
INSERT INTO tb_cidades VALUES (5439, 'Araguan�', 170215, 27, 5030, 6.02, 'araguanaense', 836.028);
INSERT INTO tb_cidades VALUES (5441, 'Arapoema', 170230, 27, 6742, 4.34, 'arapoemense', 1552.217);
INSERT INTO tb_cidades VALUES (5443, 'Augustin�polis', 170255, 27, 15950, 40.38, 'augustinopolino', 394.974);
INSERT INTO tb_cidades VALUES (5445, 'Axix� Do Tocantins', 170290, 27, 9275, 61.75, 'axixaense', 150.212);
INSERT INTO tb_cidades VALUES (5446, 'Baba�ul�ndia', 170300, 27, 10424, 5.83, 'baba�ulense', 1788.455);
INSERT INTO tb_cidades VALUES (5448, 'Barra Do Ouro', 170307, 27, 4123, 3.73, 'barraourense', 1106.341);
INSERT INTO tb_cidades VALUES (5450, 'Bernardo Say�o', 170320, 27, 4456, 4.81, 'bernardense', 926.885);
INSERT INTO tb_cidades VALUES (5451, 'Bom Jesus Do Tocantins', 170330, 27, 3768, 2.83, 'bonjesuense', 1332.668);
INSERT INTO tb_cidades VALUES (5453, 'Brejinho De Nazar�', 170370, 27, 5185, 3.01, 'brejinense', 1724.446);
INSERT INTO tb_cidades VALUES (5454, 'Buriti Do Tocantins', 170380, 27, 9768, 38.77, 'buritinense', 251.918);
INSERT INTO tb_cidades VALUES (5456, 'Campos Lindos', 170384, 27, 8139, 2.51, 'campolindense', 3240.166);
INSERT INTO tb_cidades VALUES (5458, 'Carmol�ndia', 170388, 27, 2316, 6.82, 'carmolandense', 339.404);
INSERT INTO tb_cidades VALUES (5460, 'Caseara', 170390, 27, 4601, 2.72, 'casearense', 1691.61);
INSERT INTO tb_cidades VALUES (5461, 'Centen�rio', 170410, 27, 2566, 1.31, 'centenarense', 1954.693);
INSERT INTO tb_cidades VALUES (5463, 'Chapada De Areia', 170460, 27, 1335, 2.03, 'chapadareiense', 659.247);
INSERT INTO tb_cidades VALUES (5465, 'Colm�ia', 171670, 27, 8611, 8.69, 'colmeiense', 990.718);
INSERT INTO tb_cidades VALUES (5466, 'Combinado', 170555, 27, 4669, 22.27, 'combinadense', 209.614);
INSERT INTO tb_cidades VALUES (5468, 'Couto Magalh�es', 170600, 27, 5009, 3.16, 'coutense', 1585.783);
INSERT INTO tb_cidades VALUES (5469, 'Cristal�ndia', 170610, 27, 7234, 3.91, 'cristalandense', 1848.237);
INSERT INTO tb_cidades VALUES (5471, 'Darcin�polis', 170650, 27, 5273, 3.22, 'darcinopolino', 1639.156);
INSERT INTO tb_cidades VALUES (5472, 'Dian�polis', 170700, 27, 19112, 5.94, 'dianopolino', 3217.143);
INSERT INTO tb_cidades VALUES (5474, 'Dois Irm�os Do Tocantins', 170720, 27, 7161, 1.91, 'doisirmanense', 3757.027);
INSERT INTO tb_cidades VALUES (5476, 'Esperantina', 170740, 27, 9476, 18.8, 'esperantinense', 504.021);
INSERT INTO tb_cidades VALUES (5477, 'F�tima', 170755, 27, 3805, 9.94, 'fatimense', 382.907);
INSERT INTO tb_cidades VALUES (5479, 'Filad�lfia', 170770, 27, 8505, 4.28, 'filadelfiense', 1988.074);
INSERT INTO tb_cidades VALUES (5481, 'Fortaleza Do Taboc�o', 170825, 27, 2419, 3.89, 'tabocoense', 621.56);
INSERT INTO tb_cidades VALUES (5483, 'Goiatins', 170900, 27, 12064, 1.88, 'goiatinense', 6408.581);
INSERT INTO tb_cidades VALUES (5484, 'Guara�', 170930, 27, 23200, 10.23, 'guaraiense', 2268.155);
INSERT INTO tb_cidades VALUES (5486, 'Ipueiras', 170980, 27, 1639, 2.01, 'ipueirense', 815.253);
INSERT INTO tb_cidades VALUES (5488, 'Itaguatins', 171070, 27, 6029, 8.15, 'itaguatinense', 739.846);
INSERT INTO tb_cidades VALUES (5490, 'Itapor� Do Tocantins', 171110, 27, 2445, 2.51, 'itaporanense', 972.975);
INSERT INTO tb_cidades VALUES (5491, 'Ja� Do Tocantins', 171150, 27, 3507, 1.61, 'jauense', 2173.044);
INSERT INTO tb_cidades VALUES (5493, 'Lagoa Da Confus�o', 171190, 27, 10210, 0.97, 'lagoense', 10564.565);
INSERT INTO tb_cidades VALUES (5495, 'Lajeado', 171200, 27, 2773, 8.6, 'lajeadense', 322.484);
INSERT INTO tb_cidades VALUES (5497, 'Lizarda', 171240, 27, 3725, 0.65, 'lizardense', 5723.217);
INSERT INTO tb_cidades VALUES (5498, 'Luzin�polis', 171245, 27, 2622, 9.38, 'luzinopolino', 279.562);
INSERT INTO tb_cidades VALUES (5500, 'Mateiros', 171270, 27, 2223, 0.23, 'mateirense', 9583.458);
INSERT INTO tb_cidades VALUES (5502, 'Miracema Do Tocantins', 171320, 27, 20684, 7.79, 'miracemense', 2656.084);
INSERT INTO tb_cidades VALUES (5503, 'Miranorte', 171330, 27, 12623, 12.24, 'miranortense', 1031.622);
INSERT INTO tb_cidades VALUES (5505, 'Monte Santo Do Tocantins', 171370, 27, 2085, 1.91, 'montesantense', 1091.551);
INSERT INTO tb_cidades VALUES (5507, 'Natividade', 171420, 27, 9000, 2.78, 'nativitano', 3240.708);
INSERT INTO tb_cidades VALUES (5508, 'Nazar�', 171430, 27, 4386, 11.08, 'nazareno ', 395.906);
INSERT INTO tb_cidades VALUES (5510, 'Nova Rosal�ndia', 171500, 27, 3770, 7.3, 'rosalandense ', 516.307);
INSERT INTO tb_cidades VALUES (5512, 'Novo Alegre', 171515, 27, 2286, 11.42, 'novoalegrense ', 200.103);
INSERT INTO tb_cidades VALUES (5514, 'Oliveira De F�tima', 171550, 27, 1037, 5.04, 'oliverense ', 205.849);
INSERT INTO tb_cidades VALUES (5515, 'Palmas', 172100, 27, 228332, 102.9, 'palmense ', 2218.937);
INSERT INTO tb_cidades VALUES (5517, 'Palmeiras Do Tocantins', 171380, 27, 5740, 7.67, '', 747.895);
INSERT INTO tb_cidades VALUES (5519, 'Para�so Do Tocantins', 171610, 27, 44417, 35.03, 'paraisense', 1268.058);
INSERT INTO tb_cidades VALUES (5520, 'Paran�', 171620, 27, 10338, 0.92, 'paran�ense', 11260.187);
INSERT INTO tb_cidades VALUES (5522, 'Pedro Afonso', 171650, 27, 11539, 5.74, 'pedro afonsino', 2010.896);
INSERT INTO tb_cidades VALUES (5524, 'Pequizeiro', 171665, 27, 5054, 4.18, 'pequizeirense', 1209.796);
INSERT INTO tb_cidades VALUES (5526, 'Piraqu�', 171720, 27, 2920, 2.14, 'piraqu�ense', 1367.608);
INSERT INTO tb_cidades VALUES (5527, 'Pium', 171750, 27, 6694, 0.67, 'piuense', 10013.865);
INSERT INTO tb_cidades VALUES (5529, 'Ponte Alta Do Tocantins', 171790, 27, 7180, 1.11, 'pontealtense do tocantins', 6491.108);
INSERT INTO tb_cidades VALUES (5531, 'Porto Nacional', 171820, 27, 49146, 11.04, 'portuense', 4449.908);
INSERT INTO tb_cidades VALUES (5532, 'Praia Norte', 171830, 27, 7659, 26.5, 'praianortense', 289.053);
INSERT INTO tb_cidades VALUES (5534, 'Pugmil', 171845, 27, 2369, 5.9, 'pugmilense', 401.833);
INSERT INTO tb_cidades VALUES (5536, 'Riachinho', 171855, 27, 4191, 8.1, 'riachiense', 517.476);
INSERT INTO tb_cidades VALUES (5537, 'Rio Da Concei��o', 171865, 27, 1714, 2.18, 'concei��oense', 787.114);
INSERT INTO tb_cidades VALUES (5539, 'Rio Sono', 171875, 27, 6254, 0.98, 'riosonense', 6357.135);
INSERT INTO tb_cidades VALUES (5541, 'Sandol�ndia', 171884, 27, 3326, 0.94, 'sandolandense', 3528.616);
INSERT INTO tb_cidades VALUES (5543, 'Santa Maria Do Tocantins', 171888, 27, 2894, 2.05, 'santamarinense', 1410.453);
INSERT INTO tb_cidades VALUES (5544, 'Santa Rita Do Tocantins', 171889, 27, 2128, 0.65, 'santa ritense', 3274.941);
INSERT INTO tb_cidades VALUES (1, 'Acrel�ndia', 120001, 1, 12538, 6.94, 'acrelandense', 1807.891);
INSERT INTO tb_cidades VALUES (2, 'Assis Brasil', 120005, 1, 6072, 1.22, 'assis-brasiliense', 4974.193);
INSERT INTO tb_cidades VALUES (4, 'Bujari', 120013, 1, 8471, 2.79, 'bujariense', 3034.849);
INSERT INTO tb_cidades VALUES (6, 'Cruzeiro Do Sul', 120020, 1, 78507, 8.94, 'cruzeirense', 8779.19);
INSERT INTO tb_cidades VALUES (9, 'Jord�o', 120032, 1, 6577, 1.23, 'jord�oense', 5357.299);
INSERT INTO tb_cidades VALUES (11, 'Manoel Urbano', 120034, 1, 7981, 0.75, 'manoel-urbanense', 10634.539);
INSERT INTO tb_cidades VALUES (13, 'Pl�cido De Castro', 120038, 1, 17209, 8.86, 'placidiano', 1943.249);
INSERT INTO tb_cidades VALUES (16, 'Rio Branco', 120040, 1, 336038, 38.03, 'rio-branquense', 8835.675);
INSERT INTO tb_cidades VALUES (18, 'Santa Rosa Do Purus', 120043, 1, 4691, 0.76, 'santarosense', 6145.625);
INSERT INTO tb_cidades VALUES (20, 'Senador Guiomard', 120045, 1, 20179, 8.69, 'guiomaense', 2321.452);
INSERT INTO tb_cidades VALUES (23, '�gua Branca', 270010, 2, 19377, 42.62, '�gua-branquense', 454.622);
INSERT INTO tb_cidades VALUES (25, 'Arapiraca', 270030, 2, 214006, 600.84, 'arapiraquense', 356.179);
INSERT INTO tb_cidades VALUES (27, 'Barra De Santo Ant�nio', 270050, 2, 14230, 102.79, 'barrense', 138.433);
INSERT INTO tb_cidades VALUES (30, 'Bel�m', 270080, 2, 4551, 93.58, 'belenense ', 48.63);
INSERT INTO tb_cidades VALUES (32, 'Boca Da Mata', 270100, 2, 25776, 138.19, 'matense', 186.529);
INSERT INTO tb_cidades VALUES (35, 'Cajueiro', 270130, 2, 20409, 164.24, 'cajueirense', 124.263);
INSERT INTO tb_cidades VALUES (37, 'Campo Alegre', 270140, 2, 50816, 172.2, 'campo-alegrense', 295.1);
INSERT INTO tb_cidades VALUES (39, 'Canapi', 270160, 2, 17250, 30.02, 'canapiense', 574.563);
INSERT INTO tb_cidades VALUES (42, 'Ch� Preta', 270190, 2, 7146, 41.34, 'ch�-pretense', 172.849);
INSERT INTO tb_cidades VALUES (44, 'Col�nia Leopoldina', 270210, 2, 20019, 96.29, 'leopoldinense', 207.893);
INSERT INTO tb_cidades VALUES (46, 'Coruripe', 270230, 2, 52130, 56.77, 'coruripense', 918.208);
INSERT INTO tb_cidades VALUES (48, 'Delmiro Gouveia', 270240, 2, 48096, 79.13, 'delmirense', 607.81);
INSERT INTO tb_cidades VALUES (51, 'Feira Grande', 270260, 2, 21321, 123.42, 'feira-grandense', 172.746);
INSERT INTO tb_cidades VALUES (53, 'Flexeiras', 270280, 2, 12325, 36.99, 'flexeirense', 333.221);
INSERT INTO tb_cidades VALUES (56, 'Igaci', 270310, 2, 25188, 75.31, 'igaciense', 334.452);
INSERT INTO tb_cidades VALUES (58, 'Inhapi', 270330, 2, 17898, 47.49, 'inhapiense', 376.853);
INSERT INTO tb_cidades VALUES (60, 'Jacu�pe', 270350, 2, 6997, 33.26, 'jacuipense', 210.383);
INSERT INTO tb_cidades VALUES (62, 'Jaramataia', 270370, 2, 5558, 53.59, 'jaramataiense', 103.71);
INSERT INTO tb_cidades VALUES (65, 'Jundi�', 270390, 2, 4202, 45.56, 'jundiaense', 92.223);
INSERT INTO tb_cidades VALUES (67, 'Lagoa Da Canoa', 270410, 2, 18250, 206.33, 'canoense', 88.45);
INSERT INTO tb_cidades VALUES (69, 'Macei�', 270430, 2, 932748, 1.854, 'maceioense', 503.069);
INSERT INTO tb_cidades VALUES (72, 'Maragogi', 270450, 2, 28749, 86.06, 'maragogiense', 334.042);
INSERT INTO tb_cidades VALUES (74, 'Marechal Deodoro', 270470, 2, 45977, 138.62, 'deodorense', 331.68);
INSERT INTO tb_cidades VALUES (76, 'Mata Grande', 270500, 2, 24698, 27.2, 'mata-grandense', 907.977);
INSERT INTO tb_cidades VALUES (79, 'Minador Do Negr�o', 270530, 2, 5275, 31.47, 'negrense', 167.605);
INSERT INTO tb_cidades VALUES (81, 'Murici', 270550, 2, 26710, 62.58, 'muriciense', 426.816);
INSERT INTO tb_cidades VALUES (83, 'Olho D`�gua Das Flores', 270570, 2, 20364, 111.01, 'olho-daguense', 183.441);
INSERT INTO tb_cidades VALUES (86, 'Oliven�a', 270600, 2, 11047, 63.87, 'olivense', 172.961);
INSERT INTO tb_cidades VALUES (88, 'Palestina', 270620, 2, 5112, 104.55, 'palestinense', 48.894);
INSERT INTO tb_cidades VALUES (90, 'P�o De A��car', 270640, 2, 23811, 34.86, 'p�o-de-a�ucarense', 682.986);
INSERT INTO tb_cidades VALUES (93, 'Passo De Camaragibe', 270650, 2, 14763, 60.39, 'camaragibense', 244.472);
INSERT INTO tb_cidades VALUES (95, 'Penedo', 270670, 2, 60378, 87.61, 'penedense', 689.156);
INSERT INTO tb_cidades VALUES (98, 'Pindoba', 270700, 2, 2866, 24.37, 'pindobense', 117.594);
INSERT INTO tb_cidades VALUES (100, 'Po�o Das Trincheiras', 270720, 2, 13872, 47.52, 'pocense', 291.935);
INSERT INTO tb_cidades VALUES (102, 'Porto De Pedras', 270740, 2, 8429, 32.71, 'porto-pedrense', 257.655);
INSERT INTO tb_cidades VALUES (105, 'Rio Largo', 270770, 2, 68481, 223.56, 'rio-larguense', 306.326);
INSERT INTO tb_cidades VALUES (107, 'Santa Luzia Do Norte', 270790, 2, 6891, 232.77, 'nortense', 29.604);
INSERT INTO tb_cidades VALUES (110, 'S�o Br�s', 270820, 2, 6718, 48, 's�o-braense', 139.944);
INSERT INTO tb_cidades VALUES (112, 'S�o Jos� Da Tapera', 270840, 2, 30088, 60.77, 'taperense', 495.112);
INSERT INTO tb_cidades VALUES (115, 'S�o Miguel Dos Milagres', 270870, 2, 7163, 93.34, 'milagrense', 76.744);
INSERT INTO tb_cidades VALUES (118, 'Senador Rui Palmeira', 270895, 2, 13047, 38.07, 'rui-palmeirense', 342.721);
INSERT INTO tb_cidades VALUES (120, 'Taquarana', 270910, 2, 19020, 114.55, 'taquaranense', 166.045);
INSERT INTO tb_cidades VALUES (123, 'Uni�o Dos Palmares', 270930, 2, 62358, 148.24, 'palmarino', 420.658);
INSERT INTO tb_cidades VALUES (125, 'Alvar�es', 130002, 3, 14088, 2.38, 'alvar�ense', 5911.77);
INSERT INTO tb_cidades VALUES (127, 'Anam�', 130008, 3, 10214, 4.16, 'anam�ense', 2453.935);
INSERT INTO tb_cidades VALUES (128, 'Anori', 130010, 3, 16317, 2.82, 'anoriense', 5795.308);
INSERT INTO tb_cidades VALUES (130, 'Atalaia Do Norte', 130020, 3, 15153, 0.2, 'atalaiense', 76351.882);
INSERT INTO tb_cidades VALUES (133, 'Barreirinha', 130050, 3, 27355, 4.76, 'barreirinhense', 5750.554);
INSERT INTO tb_cidades VALUES (135, 'Beruri', 130063, 3, 15486, 0.9, 'beruriense', 17250.713);
INSERT INTO tb_cidades VALUES (137, 'Boca Do Acre', 130070, 3, 30632, 1.4, 'bocacrense', 21952.76);
INSERT INTO tb_cidades VALUES (139, 'Caapiranga', 130083, 3, 10975, 1.16, 'caapiranguense', 9456.611);
INSERT INTO tb_cidades VALUES (142, 'Careiro', 130110, 3, 32734, 5.37, 'careirense', 6091.547);
INSERT INTO tb_cidades VALUES (144, 'Coari', 130120, 3, 75965, 1.31, 'coariense', 57921.914);
INSERT INTO tb_cidades VALUES (146, 'Eirunep�', 130140, 3, 30665, 2.04, 'eirunepeense', 15011.814);
INSERT INTO tb_cidades VALUES (5547, 'Santa Terezinha Do Tocantins', 172000, 27, 2474, 9.17, 'terezinense do tocantins', 269.676);
INSERT INTO tb_cidades VALUES (5549, 'S�o F�lix Do Tocantins', 172015, 27, 1437, 0.75, 's�o felense', 1908.673);
INSERT INTO tb_cidades VALUES (5550, 'S�o Miguel Do Tocantins', 172020, 27, 10481, 26.28, 's�o miguelense', 398.819);
INSERT INTO tb_cidades VALUES (5552, 'S�o Sebasti�o Do Tocantins', 172030, 27, 4283, 14.91, 'sansebastianense', 287.274);
INSERT INTO tb_cidades VALUES (5554, 'Silvan�polis', 172065, 27, 5068, 4.03, 'silvanopolino', 1258.828);
INSERT INTO tb_cidades VALUES (5555, 'S�tio Novo Do Tocantins', 172080, 27, 9148, 28.23, 's�tionovense', 324.105);
INSERT INTO tb_cidades VALUES (5557, 'Taguatinga', 172090, 27, 15051, 6.18, 'taguatinense', 2437.393);
INSERT INTO tb_cidades VALUES (5559, 'Talism�', 172097, 27, 2562, 1.19, 'talism�ense', 2156.897);
INSERT INTO tb_cidades VALUES (5560, 'Tocant�nia', 172110, 27, 6736, 2.59, 'tocantiniense', 2601.596);
INSERT INTO tb_cidades VALUES (5562, 'Tupirama', 172125, 27, 1574, 2.21, 'tupiramense', 712.204);
INSERT INTO tb_cidades VALUES (5564, 'Wanderl�ndia', 172208, 27, 10981, 8, 'wanderlandiense', 1373.057);
INSERT INTO tb_cidades VALUES (148, 'Fonte Boa', 130160, 3, 22817, 1.88, 'fonte-boense', 12110.933);
INSERT INTO tb_cidades VALUES (151, 'Ipixuna', 130180, 3, 22254, 1.85, 'ipixunense', 12044.755);
INSERT INTO tb_cidades VALUES (153, 'Itacoatiara', 130190, 3, 86839, 9.77, 'itacoatiarense', 8892.021);
INSERT INTO tb_cidades VALUES (155, 'Itapiranga', 130200, 3, 8211, 1.94, 'itapiranguense', 4231.145);
INSERT INTO tb_cidades VALUES (157, 'Juru�', 130220, 3, 10802, 0.56, 'juruaense', 19400.708);
INSERT INTO tb_cidades VALUES (160, 'Manacapuru', 130250, 3, 85141, 11.62, 'manacapuruense', 7330.066);
INSERT INTO tb_cidades VALUES (162, 'Manaus', 130260, 3, 1802014, 158.06, 'manauara', 11401.077);
INSERT INTO tb_cidades VALUES (164, 'Mara�', 130280, 3, 17528, 1.04, 'mara�ense', 16910.372);
INSERT INTO tb_cidades VALUES (167, 'Nova Olinda Do Norte', 130310, 3, 30696, 5.47, 'olindense', 5608.557);
INSERT INTO tb_cidades VALUES (169, 'Novo Aripuan�', 130330, 3, 21451, 0.52, 'aripuanense', 41188.524);
INSERT INTO tb_cidades VALUES (172, 'Presidente Figueiredo', 130353, 3, 27175, 1.07, 'figueirense', 25422.259);
INSERT INTO tb_cidades VALUES (174, 'Santa Isabel Do Rio Negro', 130360, 3, 18146, 0.29, 'santa-isabelense', 62846.382);
INSERT INTO tb_cidades VALUES (176, 'S�o Gabriel Da Cachoeira', 130380, 3, 37896, 0.35, 's�o-gabrielense', 109183.45);
INSERT INTO tb_cidades VALUES (180, 'Tabatinga', 130406, 3, 52272, 16.21, 'tabatinguense', 3224.88);
INSERT INTO tb_cidades VALUES (182, 'Tef�', 130420, 3, 61453, 2.59, 'tefeense', 23704.488);
INSERT INTO tb_cidades VALUES (184, 'Uarini', 130426, 3, 11891, 1.16, 'uarinense', 10246.239);
INSERT INTO tb_cidades VALUES (186, 'Urucurituba', 130440, 3, 17837, 6.14, 'urucuritubense', 2906.698);
INSERT INTO tb_cidades VALUES (189, 'Cutias', 160021, 4, 4696, 2.22, 'cutienses', 2114.237);
INSERT INTO tb_cidades VALUES (191, 'Itaubal', 160025, 4, 4265, 2.5, 'itaubenses', 1703.962);
INSERT INTO tb_cidades VALUES (193, 'Macap�', 160030, 4, 398204, 62.14, 'macapaense', 6408.517);
INSERT INTO tb_cidades VALUES (195, 'Oiapoque', 160050, 4, 20509, 0.91, 'oiapoquenses', 22625.075);
INSERT INTO tb_cidades VALUES (197, 'Porto Grande', 160053, 4, 16809, 3.82, 'portograndenses', 4401.774);
INSERT INTO tb_cidades VALUES (200, 'Serra Do Navio', 160005, 4, 4380, 0.56, 'serranavienses', 7756.102);
INSERT INTO tb_cidades VALUES (202, 'Vit�ria Do Jari', 160080, 4, 12428, 5.01, 'vitorenses', 2482.879);
INSERT INTO tb_cidades VALUES (205, 'Acajutiba', 290030, 5, 14653, 75.75, 'acajutibense', 193.444);
INSERT INTO tb_cidades VALUES (207, '�gua Fria', 290040, 5, 15731, 23.77, '�gua-friense', 661.856);
INSERT INTO tb_cidades VALUES (209, 'Alagoinhas', 290070, 5, 141949, 188.66, 'alagoinhense', 752.389);
INSERT INTO tb_cidades VALUES (212, 'Amargosa', 290100, 5, 34351, 74.16, 'amargosense', 463.181);
INSERT INTO tb_cidades VALUES (214, 'Am�rica Dourada', 290115, 5, 15961, 19.02, 'am�rico-douradense', 839.261);
INSERT INTO tb_cidades VALUES (216, 'Andara�', 290130, 5, 13960, 7.5, 'andaraiense', 1861.657);
INSERT INTO tb_cidades VALUES (219, 'Anguera', 290150, 5, 10242, 57.85, 'anguerense', 177.042);
INSERT INTO tb_cidades VALUES (221, 'Ant�nio Cardoso', 290170, 5, 11554, 39.24, 'cardosense', 294.45);
INSERT INTO tb_cidades VALUES (223, 'Apor�', 290190, 5, 17731, 31.56, 'aporense', 561.822);
INSERT INTO tb_cidades VALUES (226, 'Aracatu', 290200, 5, 13743, 9.22, 'aracatuense', 1489.767);
INSERT INTO tb_cidades VALUES (228, 'Aramari', 290220, 5, 10036, 30.45, 'aramariense', 329.641);
INSERT INTO tb_cidades VALUES (230, 'Aratu�pe', 290230, 5, 8599, 47.47, 'aratuipense', 181.139);
INSERT INTO tb_cidades VALUES (232, 'Baian�polis', 290250, 5, 13850, 4.14, 'baianopolense', 3342.642);
INSERT INTO tb_cidades VALUES (235, 'Barra', 290270, 5, 49325, 4.32, 'barrense', 11412.794);
INSERT INTO tb_cidades VALUES (237, 'Barra Do Cho�a', 290290, 5, 34788, 53.8, 'barra-chocense', 646.631);
INSERT INTO tb_cidades VALUES (240, 'Barreiras', 290320, 5, 137427, 17.49, 'barreirense', 7859.128);
INSERT INTO tb_cidades VALUES (242, 'Barrocas', 290327, 5, 14191, 70.62, 'barroquense', 200.96);
INSERT INTO tb_cidades VALUES (244, 'Belmonte', 290340, 5, 21798, 11.11, 'belmontense', 1961.193);
INSERT INTO tb_cidades VALUES (247, 'Boa Nova', 290370, 5, 15411, 17.74, 'boa-novense', 868.78);
INSERT INTO tb_cidades VALUES (249, 'Bom Jesus Da Lapa', 290390, 5, 63480, 15.11, 'lapense', 4200.3);
INSERT INTO tb_cidades VALUES (251, 'Boninal', 290400, 5, 13695, 14.66, 'boninalense', 934.018);
INSERT INTO tb_cidades VALUES (254, 'Botupor�', 290420, 5, 11154, 17.28, 'botupor�ense', 645.512);
INSERT INTO tb_cidades VALUES (256, 'Brejol�ndia', 290440, 5, 11077, 4.04, 'brejolandense', 2744.487);
INSERT INTO tb_cidades VALUES (257, 'Brotas De Maca�bas', 290450, 5, 10717, 4.78, 'brotense', 2240.002);
INSERT INTO tb_cidades VALUES (259, 'Buerarema', 290470, 5, 18605, 80.73, 'bueraremense', 230.459);
INSERT INTO tb_cidades VALUES (261, 'Caatiba', 290480, 5, 11420, 23.24, 'caatibense', 491.347);
INSERT INTO tb_cidades VALUES (263, 'Cachoeira', 290490, 5, 32026, 81.04, 'cachoeirano', 395.211);
INSERT INTO tb_cidades VALUES (266, 'Caetanos', 290515, 5, 13639, 17.61, 'caetanense', 774.692);
INSERT INTO tb_cidades VALUES (268, 'Cafarnaum', 290530, 5, 17209, 25.48, 'cafarnauense', 675.439);
INSERT INTO tb_cidades VALUES (270, 'Caldeir�o Grande', 290550, 5, 12491, 27.44, 'caldeir�o-grandense', 455.172);
INSERT INTO tb_cidades VALUES (273, 'Camamu', 290580, 5, 35180, 38.22, 'camamuense', 920.366);
INSERT INTO tb_cidades VALUES (274, 'Campo Alegre De Lourdes', 290590, 5, 28090, 10.1, 'campo-alegrense', 2781.357);
INSERT INTO tb_cidades VALUES (277, 'Canarana', 290620, 5, 24067, 41.76, 'canaraense', 576.384);
INSERT INTO tb_cidades VALUES (280, 'Candeias', 290650, 5, 83158, 321.87, 'candeense', 258.357);
INSERT INTO tb_cidades VALUES (282, 'C�ndido Sales', 290670, 5, 27918, 17.26, 'c�ndido-salense', 1617.522);
INSERT INTO tb_cidades VALUES (284, 'Canudos', 290682, 5, 15732, 4.89, 'canudense', 3219.297);
INSERT INTO tb_cidades VALUES (286, 'Capim Grosso', 290687, 5, 26577, 79.06, 'capim-grossense', 336.183);
INSERT INTO tb_cidades VALUES (289, 'Cardeal Da Silva', 290700, 5, 8899, 40.3, 'cardinalense', 220.842);
INSERT INTO tb_cidades VALUES (291, 'Casa Nova', 290720, 5, 64940, 6.73, 'casa-novense', 9646.956);
INSERT INTO tb_cidades VALUES (294, 'Catu', 290750, 5, 51077, 122.72, 'catuense', 416.211);
INSERT INTO tb_cidades VALUES (296, 'Central', 290760, 5, 17013, 28.24, 'centralense', 602.41);
INSERT INTO tb_cidades VALUES (298, 'C�cero Dantas', 290780, 5, 32300, 47.99, 'c�cero-dantense', 673.048);
INSERT INTO tb_cidades VALUES (301, 'Cocos', 290810, 5, 18153, 1.79, 'coquense', 10148.089);
INSERT INTO tb_cidades VALUES (303, 'Concei��o Do Almeida', 290830, 5, 17889, 61.7, 'almeidense', 289.936);
INSERT INTO tb_cidades VALUES (305, 'Concei��o Do Jacu�pe', 290850, 5, 30123, 256.3, 'conjacuipense', 117.529);
INSERT INTO tb_cidades VALUES (308, 'Contendas Do Sincor�', 290880, 5, 4663, 4.46, 'contendense', 1044.683);
INSERT INTO tb_cidades VALUES (311, 'Coribe', 290910, 5, 14307, 5.67, 'coribense', 2523.154);
INSERT INTO tb_cidades VALUES (313, 'Correntina', 290930, 5, 31249, 2.62, 'correntinense', 11941);
INSERT INTO tb_cidades VALUES (315, 'Cravol�ndia', 290950, 5, 5041, 31.09, 'cravolandense', 162.168);
INSERT INTO tb_cidades VALUES (318, 'Cruz Das Almas', 290980, 5, 58606, 402.11, 'cruz-almense', 145.747);
INSERT INTO tb_cidades VALUES (320, 'D�rio Meira', 291000, 5, 12836, 28.82, 'd�rio-meirense', 445.421);
INSERT INTO tb_cidades VALUES (323, 'Dom Macedo Costa', 291020, 5, 3874, 45.71, 'macedense', 84.759);
INSERT INTO tb_cidades VALUES (325, 'Encruzilhada', 291040, 5, 23766, 11.99, 'encruzilhadense', 1982.467);
INSERT INTO tb_cidades VALUES (327, '�rico Cardoso', 290050, 5, 10859, 15.48, '�rico-cardosense', 701.413);
INSERT INTO tb_cidades VALUES (330, 'Eun�polis', 291072, 5, 100196, 84.98, 'eunapolitano', 1179.115);
INSERT INTO tb_cidades VALUES (332, 'Feira Da Mata', 291077, 5, 6184, 3.71, 'matense', 1668.528);
INSERT INTO tb_cidades VALUES (335, 'Firmino Alves', 291090, 5, 5384, 33.15, 'firmino-alvense', 162.425);
INSERT INTO tb_cidades VALUES (337, 'Formosa Do Rio Preto', 291110, 5, 22528, 1.37, 'formosense', 16404.396);
INSERT INTO tb_cidades VALUES (340, 'Gentio Do Ouro', 291130, 5, 10622, 2.87, 'gentiense', 3700.124);
INSERT INTO tb_cidades VALUES (342, 'Gongogi', 291150, 5, 8357, 42.28, 'gongogiense', 197.65);
INSERT INTO tb_cidades VALUES (345, 'Guanambi', 291170, 5, 78833, 60.8, 'guanambiense', 1296.656);
INSERT INTO tb_cidades VALUES (347, 'Heli�polis', 291185, 5, 13192, 42.22, 'heliopoliense', 312.455);
INSERT INTO tb_cidades VALUES (349, 'Ibiassuc�', 291200, 5, 10062, 23.58, 'ibiassuceense', 426.671);
INSERT INTO tb_cidades VALUES (351, 'Ibicoara', 291220, 5, 17282, 20.33, 'ibicoarense', 849.872);
INSERT INTO tb_cidades VALUES (354, 'Ibipitanga', 291250, 5, 14171, 14.85, 'ibipitanguense', 954.369);
INSERT INTO tb_cidades VALUES (356, 'Ibirapitanga', 291270, 5, 22598, 50.53, 'ibirapitanguense', 447.259);
INSERT INTO tb_cidades VALUES (358, 'Ibirataia', 291290, 5, 18943, 64.24, 'ibirataense', 294.864);
INSERT INTO tb_cidades VALUES (361, 'Ibotirama', 291320, 5, 25424, 14.76, 'ibotiramense', 1722.335);
INSERT INTO tb_cidades VALUES (363, 'Igapor�', 291340, 5, 15205, 18.26, 'igaporaense', 832.525);
INSERT INTO tb_cidades VALUES (365, 'Igua�', 291350, 5, 25705, 31.05, 'iguaiense', 827.824);
INSERT INTO tb_cidades VALUES (367, 'Inhambupe', 291370, 5, 36306, 29.7, 'inhambupense', 1222.58);
INSERT INTO tb_cidades VALUES (370, 'Ipir�', 291400, 5, 59343, 19.47, 'ipiraense', 3048.505);
INSERT INTO tb_cidades VALUES (372, 'Irajuba', 291420, 5, 7002, 16.93, 'irajubense', 413.524);
INSERT INTO tb_cidades VALUES (374, 'Iraquara', 291440, 5, 22601, 21.96, 'iraquarense', 1029.375);
INSERT INTO tb_cidades VALUES (377, 'Itabela', 291465, 5, 28390, 33.37, 'itabelense', 850.663);
INSERT INTO tb_cidades VALUES (379, 'Itabuna', 291480, 5, 204667, 473.5, 'itabunense', 432.243);
INSERT INTO tb_cidades VALUES (381, 'Itaet�', 291500, 5, 14924, 12.35, 'itaeteense', 1208.673);
INSERT INTO tb_cidades VALUES (383, 'Itagib�', 291520, 5, 15193, 19.26, 'itagibaense', 788.835);
INSERT INTO tb_cidades VALUES (385, 'Itagua�u Da Bahia', 291535, 5, 13209, 2.97, 'itagua�uense', 4451.214);
INSERT INTO tb_cidades VALUES (386, 'Itaju Do Col�nia', 291540, 5, 7309, 5.98, 'itajuense', 1222.708);
INSERT INTO tb_cidades VALUES (388, 'Itamaraju', 291560, 5, 63069, 27.73, 'itamarajuense', 2274.269);
INSERT INTO tb_cidades VALUES (390, 'Itamb�', 291580, 5, 23089, 16.02, 'itambeense', 1441.58);
INSERT INTO tb_cidades VALUES (393, 'Itaparica', 291610, 5, 20725, 175.58, 'itaparicano', 118.04);
INSERT INTO tb_cidades VALUES (395, 'Itapebi', 291630, 5, 10495, 10.44, 'itapebiense', 1005.369);
INSERT INTO tb_cidades VALUES (397, 'Itapicuru', 291650, 5, 32261, 20.35, 'itapicuruense', 1585.567);
INSERT INTO tb_cidades VALUES (399, 'Itaquara', 291670, 5, 7678, 23.77, 'itaquarense', 322.975);
INSERT INTO tb_cidades VALUES (402, 'Itiru�u', 291690, 5, 12693, 40.46, 'itiru�uense', 313.701);
INSERT INTO tb_cidades VALUES (404, 'Itoror�', 291710, 5, 19914, 63.5, 'itororoense', 313.585);
INSERT INTO tb_cidades VALUES (406, 'Ituber�', 291730, 5, 26591, 63.73, 'ituberense', 417.255);
INSERT INTO tb_cidades VALUES (408, 'Jaborandi', 291735, 5, 8973, 0.94, 'jaborandiense', 9525.655);
INSERT INTO tb_cidades VALUES (411, 'Jaguaquara', 291760, 5, 51011, 54.95, 'jaguaquarense', 928.235);
INSERT INTO tb_cidades VALUES (413, 'Jaguaripe', 291780, 5, 16467, 18.32, 'jaguaripense', 898.656);
INSERT INTO tb_cidades VALUES (415, 'Jequi�', 291800, 5, 151895, 47.07, 'jequieense', 3227.338);
INSERT INTO tb_cidades VALUES (418, 'Jita�na', 291830, 5, 14115, 64.48, 'jitaunense', 218.906);
INSERT INTO tb_cidades VALUES (419, 'Jo�o Dourado', 291835, 5, 22549, 24.65, 'jo�o-douradense', 914.874);
INSERT INTO tb_cidades VALUES (422, 'Jussara', 291850, 5, 15052, 15.87, 'jussaraense', 948.64);
INSERT INTO tb_cidades VALUES (425, 'Lafaiete Coutinho', 291870, 5, 3901, 9.63, 'lafaietense', 405.253);
INSERT INTO tb_cidades VALUES (427, 'Laje', 291880, 5, 22201, 48.5, 'lajista', 457.744);
INSERT INTO tb_cidades VALUES (429, 'Lajedinho', 291900, 5, 3936, 5.07, 'lajedinhense', 776.087);
INSERT INTO tb_cidades VALUES (432, 'Lap�o', 291915, 5, 25646, 42.57, 'lapoense', 602.44);
INSERT INTO tb_cidades VALUES (434, 'Len��is', 291930, 5, 10368, 8.12, 'len�oense', 1277.029);
INSERT INTO tb_cidades VALUES (436, 'Livramento De Nossa Senhora', 291950, 5, 42693, 19.99, 'livramentense', 2135.585);
INSERT INTO tb_cidades VALUES (439, 'Macarani', 291970, 5, 17093, 13.28, 'macaraniense', 1287.525);
INSERT INTO tb_cidades VALUES (441, 'Macurur�', 291990, 5, 8073, 3.52, 'macururense', 2294.272);
INSERT INTO tb_cidades VALUES (443, 'Maetinga', 291995, 5, 7038, 10.32, 'maetinguense', 681.668);
INSERT INTO tb_cidades VALUES (445, 'Mairi', 292010, 5, 19326, 20.29, 'mairiense', 952.65);
INSERT INTO tb_cidades VALUES (447, 'Malhada De Pedras', 292030, 5, 8468, 16.01, 'malhada-pedrense', 529.047);
INSERT INTO tb_cidades VALUES (450, 'Marac�s', 292050, 5, 24613, 10.92, 'maracaense', 2253.171);
INSERT INTO tb_cidades VALUES (452, 'Mara�', 292070, 5, 19101, 23.2, 'marauense', 823.398);
INSERT INTO tb_cidades VALUES (454, 'Mascote', 292090, 5, 14640, 18.95, 'mascotense', 772.461);
INSERT INTO tb_cidades VALUES (457, 'Medeiros Neto', 292110, 5, 21560, 17.4, 'medeirense', 1238.739);
INSERT INTO tb_cidades VALUES (459, 'Milagres', 292130, 5, 10306, 36.24, 'milagrense', 284.375);
INSERT INTO tb_cidades VALUES (462, 'Monte Santo', 292150, 5, 52338, 16.42, 'monte-santense', 3186.872);
INSERT INTO tb_cidades VALUES (464, 'Morro Do Chap�u', 292170, 5, 35164, 6.12, 'morrense', 5742.91);
INSERT INTO tb_cidades VALUES (466, 'Mucug�', 292190, 5, 10545, 4.3, 'mucugeense', 2455.018);
INSERT INTO tb_cidades VALUES (468, 'Mulungu Do Morro', 292205, 5, 12249, 21.64, 'mulunguense', 566.008);
INSERT INTO tb_cidades VALUES (471, 'Muqu�m De S�o Francisco', 292225, 5, 10272, 2.82, 'sanfranciscano', 3638.055);
INSERT INTO tb_cidades VALUES (474, 'Nazar�', 292250, 5, 27274, 107.47, 'nazareno', 253.779);
INSERT INTO tb_cidades VALUES (476, 'Nordestina', 292265, 5, 12371, 26.82, 'nordestinense', 461.223);
INSERT INTO tb_cidades VALUES (478, 'Nova F�tima', 292273, 5, 7602, 21.73, 'fatimense', 349.899);
INSERT INTO tb_cidades VALUES (480, 'Nova Itarana', 292280, 5, 7435, 15.8, 'nova-itaranense', 470.428);
INSERT INTO tb_cidades VALUES (483, 'Nova Vi�osa', 292300, 5, 38556, 29.15, 'nova-vi�osense', 1322.897);
INSERT INTO tb_cidades VALUES (485, 'Novo Triunfo', 292305, 5, 15051, 59.86, 'novo-triunfense', 251.422);
INSERT INTO tb_cidades VALUES (487, 'Oliveira Dos Brejinhos', 292320, 5, 21831, 6.21, 'brejinhense', 3512.658);
INSERT INTO tb_cidades VALUES (490, 'Palmas De Monte Alto', 292340, 5, 20775, 8.23, 'monte-altense', 2524.942);
INSERT INTO tb_cidades VALUES (493, 'Paratinga', 292370, 5, 29504, 11.28, 'paratinguense', 2614.768);
INSERT INTO tb_cidades VALUES (495, 'Pau Brasil', 292390, 5, 10852, 17.89, 'pau-brasilense', 606.546);
INSERT INTO tb_cidades VALUES (497, 'P� De Serra', 292405, 5, 13752, 22.32, 'p�-de-serrense', 616.209);
INSERT INTO tb_cidades VALUES (499, 'Pedro Alexandre', 292420, 5, 16995, 18.96, 'pedro-alexandrense', 896.162);
INSERT INTO tb_cidades VALUES (502, 'Pinda�', 292450, 5, 15628, 25.45, 'pindaiense', 614.062);
INSERT INTO tb_cidades VALUES (504, 'Pintadas', 292465, 5, 10342, 18.96, 'pintadense', 545.534);
INSERT INTO tb_cidades VALUES (507, 'Piritiba', 292480, 5, 22399, 22.96, 'piritibano', 975.576);
INSERT INTO tb_cidades VALUES (509, 'Planalto', 292500, 5, 24481, 25.46, 'planaltense', 961.689);
INSERT INTO tb_cidades VALUES (511, 'Pojuca', 292520, 5, 33066, 113.98, 'pojucano', 290.113);
INSERT INTO tb_cidades VALUES (513, 'Porto Seguro', 292530, 5, 126929, 52.7, 'porto-segurense', 2408.492);
INSERT INTO tb_cidades VALUES (516, 'Presidente Dutra', 292560, 5, 13750, 84.07, 'utrense', 163.55);
INSERT INTO tb_cidades VALUES (517, 'Presidente J�nio Quadros', 292570, 5, 13652, 11.52, 'janio-quadrense', 1185.134);
INSERT INTO tb_cidades VALUES (520, 'Quijingue', 292590, 5, 27228, 20.27, 'quijinguense', 1342.948);
INSERT INTO tb_cidades VALUES (522, 'Rafael Jambeiro', 292595, 5, 22874, 18.77, 'jambeirense', 1218.877);
INSERT INTO tb_cidades VALUES (524, 'Retirol�ndia', 292610, 5, 12055, 66.43, 'retirolandense', 181.471);
INSERT INTO tb_cidades VALUES (526, 'Riach�o Do Jacu�pe', 292630, 5, 33172, 27.87, 'jacuipense', 1190.203);
INSERT INTO tb_cidades VALUES (529, 'Ribeira Do Pombal', 292660, 5, 47518, 60.25, 'pombalense', 788.626);
INSERT INTO tb_cidades VALUES (532, 'Rio Do Ant�nio', 292680, 5, 14815, 18.19, 'rio-antoniense', 814.348);
INSERT INTO tb_cidades VALUES (534, 'Rio Real', 292700, 5, 37164, 51.84, 'rio-realense', 716.881);
INSERT INTO tb_cidades VALUES (537, 'Salinas Da Margarida', 292730, 5, 13456, 89.81, 'salinense', 149.821);
INSERT INTO tb_cidades VALUES (539, 'Santa B�rbara', 292750, 5, 19064, 55.15, 'barbarense', 345.645);
INSERT INTO tb_cidades VALUES (541, 'Santa Cruz Cabr�lia', 292770, 5, 26264, 16.81, 'santa-cruzense', 1562.701);
INSERT INTO tb_cidades VALUES (544, 'Santa Luzia', 292805, 5, 13344, 17.22, 'santa-luziense', 774.877);
INSERT INTO tb_cidades VALUES (546, 'Santa Rita De C�ssia', 292840, 5, 26250, 4.39, 'santa-ritense ', 5977.746);
INSERT INTO tb_cidades VALUES (549, 'Santana', 292820, 5, 24750, 13.6, 'santanense', 1820.1);
INSERT INTO tb_cidades VALUES (551, 'Santo Amaro', 292860, 5, 57800, 117.26, 'santo-amarense', 492.912);
INSERT INTO tb_cidades VALUES (553, 'Santo Est�v�o', 292880, 5, 47880, 131.92, 'santo-estevense', 362.96);
INSERT INTO tb_cidades VALUES (555, 'S�o Domingos', 292895, 5, 9226, 28.22, 's�o-dominguense', 326.94);
INSERT INTO tb_cidades VALUES (558, 'S�o F�lix Do Coribe', 292905, 5, 13048, 13.74, 's�o-felense', 949.381);
INSERT INTO tb_cidades VALUES (560, 'S�o Gabriel', 292925, 5, 18427, 15.36, 's�o-gabrielense', 1199.498);
INSERT INTO tb_cidades VALUES (562, 'S�o Jos� Da Vit�ria', 292935, 5, 5715, 78.83, 's�o-joseense', 72.494);
INSERT INTO tb_cidades VALUES (565, 'S�o Sebasti�o Do Pass�', 292950, 5, 42153, 78.3, 'sebastianense', 538.32);
INSERT INTO tb_cidades VALUES (568, 'Saubara', 292975, 5, 11201, 68.51, 'saubarense', 163.495);
INSERT INTO tb_cidades VALUES (570, 'Seabra', 292990, 5, 41798, 16.6, 'seabrense', 2517.271);
INSERT INTO tb_cidades VALUES (572, 'Senhor Do Bonfim', 293010, 5, 74419, 89.93, 'bonfinense', 827.477);
INSERT INTO tb_cidades VALUES (575, 'Serra Dourada', 293030, 5, 18112, 13.45, 'serra-douradense', 1346.608);
INSERT INTO tb_cidades VALUES (578, 'Serrol�ndia', 293060, 5, 12344, 41.73, 'serrolandense', 295.823);
INSERT INTO tb_cidades VALUES (580, 'S�tio Do Mato', 293075, 5, 12050, 6.88, 's�tio-matense', 1751.025);
INSERT INTO tb_cidades VALUES (582, 'Sobradinho', 293077, 5, 22000, 17.76, 'sobradinhense', 1238.905);
INSERT INTO tb_cidades VALUES (584, 'Tabocas Do Brejo Velho', 293090, 5, 11431, 8.31, 'taboquense', 1375.78);
INSERT INTO tb_cidades VALUES (587, 'Tanquinho', 293110, 5, 8008, 36.42, 'tanquinhense', 219.87);
INSERT INTO tb_cidades VALUES (589, 'Tapiramut�', 293130, 5, 16516, 24.88, 'tapiramutaense', 663.879);
INSERT INTO tb_cidades VALUES (591, 'Teodoro Sampaio', 293140, 5, 7895, 34.1, 'teodorense', 231.539);
INSERT INTO tb_cidades VALUES (594, 'Terra Nova', 293170, 5, 12803, 64.36, 'terra-novense', 198.925);
INSERT INTO tb_cidades VALUES (596, 'Tucano', 293190, 5, 52418, 18.73, 'tucanense', 2799.12);
INSERT INTO tb_cidades VALUES (599, 'Ubaitaba', 293220, 5, 20691, 115.71, 'ubaitabense', 178.815);
INSERT INTO tb_cidades VALUES (601, 'Uiba�', 293240, 5, 13625, 24.73, 'uibaiense', 550.998);
INSERT INTO tb_cidades VALUES (603, 'Una', 293250, 5, 24110, 20.48, 'unense', 1177.473);
INSERT INTO tb_cidades VALUES (605, 'Uru�uca', 293270, 5, 19837, 50.61, 'uru�uquense', 391.97);
INSERT INTO tb_cidades VALUES (607, 'Valen�a', 293290, 5, 88673, 74.35, 'valenciano', 1192.61);
INSERT INTO tb_cidades VALUES (610, 'V�rzea Do Po�o', 293310, 5, 8661, 42.27, 'varzeapense', 204.913);
INSERT INTO tb_cidades VALUES (612, 'Varzedo', 293317, 5, 9109, 40.16, 'varzedense', 226.794);
INSERT INTO tb_cidades VALUES (614, 'Vereda', 293325, 5, 6800, 7.78, 'veredense', 874.24);
INSERT INTO tb_cidades VALUES (617, 'Wanderley', 293345, 5, 12485, 4.22, 'wanderleiense', 2959.513);
INSERT INTO tb_cidades VALUES (618, 'Wenceslau Guimar�es', 293350, 5, 22189, 32.92, 'wenceslau-guimar�ense', 674.028);
INSERT INTO tb_cidades VALUES (622, 'Acara�', 230020, 6, 57551, 68.31, 'acarauense', 842.555);
INSERT INTO tb_cidades VALUES (624, 'Aiuaba', 230040, 6, 16203, 6.66, 'aiuabense', 2434.41);
INSERT INTO tb_cidades VALUES (626, 'Altaneira', 230060, 6, 6856, 93.54, 'altaneirense', 73.296);
INSERT INTO tb_cidades VALUES (628, 'Amontada', 230075, 6, 39232, 33.27, 'amontadense', 1179.031);
INSERT INTO tb_cidades VALUES (631, 'Aquiraz', 230100, 6, 72628, 150.5, 'aquirazense', 482.566);
INSERT INTO tb_cidades VALUES (633, 'Aracoiaba', 230120, 6, 25391, 38.67, 'aracoiabense', 656.593);
INSERT INTO tb_cidades VALUES (635, 'Araripe', 230130, 6, 20685, 18.81, 'araripense', 1099.926);
INSERT INTO tb_cidades VALUES (638, 'Assar�', 230160, 6, 22445, 20.11, 'assareense', 1116.325);
INSERT INTO tb_cidades VALUES (640, 'Baixio', 230180, 6, 6026, 41.15, 'baixiense', 146.433);
INSERT INTO tb_cidades VALUES (642, 'Barbalha', 230190, 6, 55323, 92.31, 'barbalhense', 599.307);
INSERT INTO tb_cidades VALUES (644, 'Barro', 230200, 6, 21514, 30.22, 'barrense', 711.883);
INSERT INTO tb_cidades VALUES (646, 'Baturit�', 230210, 6, 33321, 107.98, 'baturiteense', 308.579);
INSERT INTO tb_cidades VALUES (648, 'Bela Cruz', 230230, 6, 30878, 37.45, 'bela-cruzense', 824.409);
INSERT INTO tb_cidades VALUES (651, 'Camocim', 230260, 6, 60158, 52.81, 'camocimense', 1139.206);
INSERT INTO tb_cidades VALUES (653, 'Canind�', 230280, 6, 74473, 23.14, 'canindeense', 3218.462);
INSERT INTO tb_cidades VALUES (655, 'Caridade', 230300, 6, 20020, 23.65, 'caridadense', 846.5);
INSERT INTO tb_cidades VALUES (657, 'Cariria�u', 230320, 6, 26393, 41.41, 'cariria�uense', 637.353);
INSERT INTO tb_cidades VALUES (660, 'Cascavel', 230350, 6, 66142, 78.99, 'cascavelense', 837.321);
INSERT INTO tb_cidades VALUES (662, 'Catunda', 230365, 6, 9952, 12.71, 'catundense', 783.192);
INSERT INTO tb_cidades VALUES (664, 'Cedro', 230380, 6, 24527, 33.79, 'cedrense', 725.794);
INSERT INTO tb_cidades VALUES (667, 'Chorozinho', 230395, 6, 18915, 67.94, 'chorozinhense', 278.411);
INSERT INTO tb_cidades VALUES (669, 'Crate�s', 230410, 6, 72812, 24.37, 'crateuense', 2988.29);
INSERT INTO tb_cidades VALUES (671, 'Croat�', 230423, 6, 17069, 24.49, 'croataense', 696.978);
INSERT INTO tb_cidades VALUES (673, 'Deputado Irapuan Pinheiro', 230426, 6, 9095, 19.33, 'irapuense', 470.422);
INSERT INTO tb_cidades VALUES (676, 'Farias Brito', 230430, 6, 19007, 37.74, 'farias-britense', 503.619);
INSERT INTO tb_cidades VALUES (678, 'Fortaleza', 230440, 6, 2452185, 7.786, 'fortalezense', 314.927);
INSERT INTO tb_cidades VALUES (681, 'General Sampaio', 230460, 6, 6218, 33.23, 'sampaiense', 187.131);
INSERT INTO tb_cidades VALUES (683, 'Granja', 230470, 6, 52645, 19.51, 'granjense', 2698.104);
INSERT INTO tb_cidades VALUES (685, 'Groa�ras', 230490, 6, 10228, 65.59, 'groairense', 155.946);
INSERT INTO tb_cidades VALUES (688, 'Guaramiranga', 230510, 6, 4164, 41.29, 'guaramiranguense', 100.856);
INSERT INTO tb_cidades VALUES (690, 'Horizonte', 230523, 6, 55187, 344.96, 'horizontino', 159.979);
INSERT INTO tb_cidades VALUES (692, 'Ibiapina', 230530, 6, 23808, 57.38, 'ibiapinense', 414.936);
INSERT INTO tb_cidades VALUES (695, 'Ic�', 230540, 6, 65456, 34.97, 'icoense', 1872.003);
INSERT INTO tb_cidades VALUES (697, 'Independ�ncia', 230560, 6, 25573, 7.95, 'independenciense', 3218.661);
INSERT INTO tb_cidades VALUES (699, 'Ipaumirim', 230570, 6, 12009, 43.86, 'ipaumirinense', 273.825);
INSERT INTO tb_cidades VALUES (702, 'Iracema', 230600, 6, 13722, 16.65, 'iracemense', 824.034);
INSERT INTO tb_cidades VALUES (704, 'Itai�aba', 230620, 6, 7316, 34.86, 'itai�abense', 209.851);
INSERT INTO tb_cidades VALUES (706, 'Itapag�', 230630, 6, 48350, 112.33, 'itapageense', 430.414);
INSERT INTO tb_cidades VALUES (709, 'Itarema', 230655, 6, 37471, 52, 'itaremense', 720.66);
INSERT INTO tb_cidades VALUES (711, 'Jaguaretama', 230670, 6, 17863, 10.15, 'jaguaretamense', 1759.724);
INSERT INTO tb_cidades VALUES (713, 'Jaguaribe', 230690, 6, 34409, 18.33, 'jaguaribano', 1876.796);
INSERT INTO tb_cidades VALUES (716, 'Jati', 230720, 6, 7660, 21.21, 'jatiense', 361.069);
INSERT INTO tb_cidades VALUES (717, 'Jijoca De Jericoacoara', 230725, 6, 17002, 83.02, 'jijoquense', 204.792);
INSERT INTO tb_cidades VALUES (720, 'Lavras Da Mangabeira', 230750, 6, 31090, 32.8, 'lavrense', 947.963);
INSERT INTO tb_cidades VALUES (723, 'Maracana�', 230765, 6, 209057, 1.877, 'maracanauense', 111.334);
INSERT INTO tb_cidades VALUES (725, 'Marco', 230780, 6, 24703, 43.03, 'marquense', 574.134);
INSERT INTO tb_cidades VALUES (727, 'Massap�', 230800, 6, 35191, 62.11, 'massapeense', 566.578);
INSERT INTO tb_cidades VALUES (730, 'Milagres', 230830, 6, 28316, 49.08, 'milagrense', 576.96);
INSERT INTO tb_cidades VALUES (732, 'Mira�ma', 230837, 6, 12800, 18.29, 'miraimense', 699.96);
INSERT INTO tb_cidades VALUES (734, 'Momba�a', 230850, 6, 42690, 20.14, 'momba�ano', 2119.469);
INSERT INTO tb_cidades VALUES (737, 'Mora�jo', 230880, 6, 8070, 19.42, 'moraujense', 415.631);
INSERT INTO tb_cidades VALUES (739, 'Mucambo', 230900, 6, 14102, 73.99, 'mucambense', 190.601);
INSERT INTO tb_cidades VALUES (741, 'Nova Olinda', 230920, 6, 14256, 50.13, 'novo-olindense', 284.399);
INSERT INTO tb_cidades VALUES (743, 'Novo Oriente', 230940, 6, 27453, 29.01, 'novo-oriental', 946.225);
INSERT INTO tb_cidades VALUES (746, 'Pacajus', 230960, 6, 61838, 243, 'pacajuense', 254.477);
INSERT INTO tb_cidades VALUES (748, 'Pacoti', 230980, 6, 11607, 105.92, 'pacotiense', 109.586);
INSERT INTO tb_cidades VALUES (751, 'Palm�cia', 231010, 6, 12005, 101.9, 'palmaciano', 117.813);
INSERT INTO tb_cidades VALUES (753, 'Paraipaba', 231025, 6, 30041, 99.83, 'paraipabense', 300.919);
INSERT INTO tb_cidades VALUES (755, 'Paramoti', 231040, 6, 11308, 23.43, 'paramotiense', 482.589);
INSERT INTO tb_cidades VALUES (757, 'Penaforte', 231060, 6, 8226, 57.96, 'penafortense', 141.926);
INSERT INTO tb_cidades VALUES (759, 'Pereiro', 231080, 6, 15757, 37.24, 'pereirense', 423.117);
INSERT INTO tb_cidades VALUES (761, 'Piquet Carneiro', 231090, 6, 15467, 26.31, 'piquet-carneirense', 587.873);
INSERT INTO tb_cidades VALUES (764, 'Porteiras', 231110, 6, 15061, 69.22, 'porteirense', 217.577);
INSERT INTO tb_cidades VALUES (766, 'Potiretama', 231123, 6, 6126, 15.14, 'potiretamense', 404.602);
INSERT INTO tb_cidades VALUES (768, 'Quixad�', 231130, 6, 80604, 39.91, 'quixadaense', 2019.822);
INSERT INTO tb_cidades VALUES (770, 'Quixeramobim', 231140, 6, 71887, 21.59, 'quixeramobinense', 3330.068);
INSERT INTO tb_cidades VALUES (773, 'Reriutaba', 231170, 6, 19455, 50.75, 'reriutabano', 383.316);
INSERT INTO tb_cidades VALUES (774, 'Russas', 231180, 6, 69833, 43.88, 'russano', 1591.281);
INSERT INTO tb_cidades VALUES (775, 'Saboeiro', 231190, 6, 15752, 11.39, 'saboeirense', 1383.477);
INSERT INTO tb_cidades VALUES (777, 'Santa Quit�ria', 231220, 6, 42763, 10.04, 'quiteriense', 4260.455);
INSERT INTO tb_cidades VALUES (779, 'Santana Do Cariri', 231210, 6, 17170, 20.07, 'santanense-do-cariri', 855.558);
INSERT INTO tb_cidades VALUES (782, 'S�o Jo�o Do Jaguaribe', 231250, 6, 7900, 28.17, 'jaguaribense', 280.454);
INSERT INTO tb_cidades VALUES (785, 'Senador S�', 231280, 6, 6852, 16.16, 'saense', 423.917);
INSERT INTO tb_cidades VALUES (787, 'Solon�pole', 231300, 6, 17665, 11.5, 'solonopolitano', 1536.156);
INSERT INTO tb_cidades VALUES (789, 'Tamboril', 231320, 6, 25451, 12.72, 'tamborilense', 2000.767);
INSERT INTO tb_cidades VALUES (792, 'Teju�uoca', 231335, 6, 16827, 21.53, 'teju�uoquense', 781.741);
INSERT INTO tb_cidades VALUES (794, 'Trairi', 231350, 6, 51422, 55.55, 'trairiense', 925.717);
INSERT INTO tb_cidades VALUES (796, 'Ubajara', 231360, 6, 31787, 75.5, 'ubajarense', 421.031);
INSERT INTO tb_cidades VALUES (799, 'Uruburetama', 231380, 6, 19765, 183.75, 'uruburetamense', 107.566);
INSERT INTO tb_cidades VALUES (801, 'Varjota', 231395, 6, 17593, 98.07, 'varjotense', 179.396);
INSERT INTO tb_cidades VALUES (803, 'Vi�osa Do Cear�', 231410, 6, 54955, 41.9, 'vi�osense', 1311.62);
INSERT INTO tb_cidades VALUES (805, 'Afonso Cl�udio', 320010, 8, 31091, 32.57, 'afonso-claudense', 954.658);
INSERT INTO tb_cidades VALUES (808, 'Alegre', 320020, 8, 30768, 39.82, 'alegrense', 772.717);
INSERT INTO tb_cidades VALUES (810, 'Alto Rio Novo', 320035, 8, 7317, 32.13, 'alto-rio-novense', 227.728);
INSERT INTO tb_cidades VALUES (813, 'Aracruz', 320060, 8, 81832, 56.99, 'aracruzense', 1435.97);
INSERT INTO tb_cidades VALUES (814, 'Atilio Vivacqua', 320070, 8, 9850, 43.43, 'atilio-vivacquense', 226.814);
INSERT INTO tb_cidades VALUES (817, 'Boa Esperan�a', 320100, 8, 14199, 33.13, 'esperancense', 428.557);
INSERT INTO tb_cidades VALUES (820, 'Cachoeiro De Itapemirim', 320120, 8, 189889, 216.57, 'cachoeirense', 876.795);
INSERT INTO tb_cidades VALUES (822, 'Castelo', 320140, 8, 34747, 52.31, 'castelense', 664.226);
INSERT INTO tb_cidades VALUES (824, 'Concei��o Da Barra', 320160, 8, 28449, 23.95, 'barrense', 1187.766);
INSERT INTO tb_cidades VALUES (827, 'Domingos Martins', 320190, 8, 31847, 25.99, 'martinense', 1225.331);
INSERT INTO tb_cidades VALUES (830, 'Fund�o', 320220, 8, 17025, 60.9, 'fund�oense', 279.54);
INSERT INTO tb_cidades VALUES (831, 'Governador Lindenberg', 320225, 8, 10869, 30.22, 'lindenberguense', 359.616);
INSERT INTO tb_cidades VALUES (834, 'Ibatiba', 320245, 8, 22366, 92.77, 'ibatibense', 241.084);
INSERT INTO tb_cidades VALUES (837, 'Iconha', 320260, 8, 12523, 61.71, 'iconhense', 202.92);
INSERT INTO tb_cidades VALUES (839, 'Itagua�u', 320270, 8, 14134, 26.65, 'itagua�uense', 530.389);
INSERT INTO tb_cidades VALUES (841, 'Itarana', 320290, 8, 10881, 36.38, 'itaranense', 299.078);
INSERT INTO tb_cidades VALUES (844, 'Jer�nimo Monteiro', 320310, 8, 10879, 67.09, 'monteirense', 162.164);
INSERT INTO tb_cidades VALUES (846, 'Laranja Da Terra', 320316, 8, 10826, 23.69, 'laranjense', 456.987);
INSERT INTO tb_cidades VALUES (848, 'Manten�polis', 320330, 8, 13612, 42.44, 'mantenopolisense', 320.744);
INSERT INTO tb_cidades VALUES (851, 'Maril�ndia', 320335, 8, 11107, 35.89, 'marilandense', 309.447);
INSERT INTO tb_cidades VALUES (853, 'Montanha', 320350, 8, 17849, 16.26, 'montanhense', 1097.93);
INSERT INTO tb_cidades VALUES (855, 'Muniz Freire', 320370, 8, 18397, 27.06, 'muniz-freirense', 679.926);
INSERT INTO tb_cidades VALUES (858, 'Pancas', 320400, 8, 21548, 26.16, 'panquense', 823.835);
INSERT INTO tb_cidades VALUES (860, 'Pinheiros', 320410, 8, 23895, 24.5, 'pinheirense', 975.36);
INSERT INTO tb_cidades VALUES (863, 'Presidente Kennedy', 320430, 8, 10314, 17.59, 'kennediense', 586.517);
INSERT INTO tb_cidades VALUES (865, 'Rio Novo Do Sul', 320440, 8, 11325, 55.59, 'novense-do-sul', 203.721);
INSERT INTO tb_cidades VALUES (867, 'Santa Maria De Jetib�', 320455, 8, 34176, 46.46, 'santa-mariense', 735.555);
INSERT INTO tb_cidades VALUES (870, 'S�o Gabriel Da Palha', 320470, 8, 31859, 73.61, 'gabrielense', 432.815);
INSERT INTO tb_cidades VALUES (873, 'S�o Roque Do Cana�', 320495, 8, 11273, 32.92, 's�o-roquense', 342.395);
INSERT INTO tb_cidades VALUES (876, 'Vargem Alta', 320503, 8, 19130, 46.13, 'vargem-altense', 414.739);
INSERT INTO tb_cidades VALUES (878, 'Viana', 320510, 8, 65001, 208.6, 'vianense', 311.606);
INSERT INTO tb_cidades VALUES (880, 'Vila Val�rio', 320517, 8, 13830, 29.78, 'vila-valense', 464.387);
INSERT INTO tb_cidades VALUES (883, 'Abadia De Goi�s', 520005, 9, 6876, 46.85, 'abadiense', 146.778);
INSERT INTO tb_cidades VALUES (885, 'Acre�na', 520013, 9, 20279, 12.95, 'acreunense', 1565.997);
INSERT INTO tb_cidades VALUES (887, '�gua Fria De Goi�s', 520017, 9, 5090, 2.51, '�gua-friense', 2029.413);
INSERT INTO tb_cidades VALUES (890, 'Alex�nia', 520030, 9, 23814, 28.09, 'alexaniense', 847.893);
INSERT INTO tb_cidades VALUES (892, 'Alto Horizonte', 520055, 9, 4505, 8.94, 'alto horizontino', 503.763);
INSERT INTO tb_cidades VALUES (895, 'Amaralina', 520082, 9, 3434, 2.56, 'amaralinense', 1343.172);
INSERT INTO tb_cidades VALUES (897, 'Amorin�polis', 520090, 9, 3609, 8.83, 'amorinopolense', 408.525);
INSERT INTO tb_cidades VALUES (899, 'Anhanguera', 520120, 9, 1020, 17.91, 'anhanguerino', 56.95);
INSERT INTO tb_cidades VALUES (900, 'Anicuns', 520130, 9, 20239, 20.67, 'anicuense', 979.23);
INSERT INTO tb_cidades VALUES (901, 'Aparecida De Goi�nia', 520140, 9, 455657, 1.58, 'aparecidense', 288.342);
INSERT INTO tb_cidades VALUES (904, 'Ara�u', 520160, 9, 3802, 25.53, 'ara�uense', 148.936);
INSERT INTO tb_cidades VALUES (906, 'Aragoi�nia', 520180, 9, 8365, 38.1, 'aragoianense', 219.55);
INSERT INTO tb_cidades VALUES (908, 'Aren�polis', 520235, 9, 3277, 3.05, 'arenopolino', 1074.595);
INSERT INTO tb_cidades VALUES (911, 'Avelin�polis', 520280, 9, 2450, 14.11, 'avelinopense', 173.64);
INSERT INTO tb_cidades VALUES (913, 'Barro Alto', 520320, 9, 8716, 7.97, 'barro-altense', 1093.247);
INSERT INTO tb_cidades VALUES (915, 'Bom Jardim De Goi�s', 520340, 9, 8423, 4.43, 'bom-jardinense', 1899.478);
INSERT INTO tb_cidades VALUES (918, 'Bon�polis', 520357, 9, 3503, 2.15, 'bonopolino', 1628.484);
INSERT INTO tb_cidades VALUES (920, 'Brit�nia', 520380, 9, 5509, 3.77, 'britaniense', 1461.186);
INSERT INTO tb_cidades VALUES (922, 'Buriti De Goi�s', 520393, 9, 2560, 12.85, 'buritiense', 199.292);
INSERT INTO tb_cidades VALUES (925, 'Cachoeira Alta', 520410, 9, 10553, 6.38, 'cachoeira-altense', 1654.555);
INSERT INTO tb_cidades VALUES (927, 'Cachoeira Dourada', 520425, 9, 8254, 15.84, 'cachoeirense-do-sul', 521.134);
INSERT INTO tb_cidades VALUES (930, 'Caldas Novas', 520450, 9, 70473, 44.16, 'caldense', 1595.965);
INSERT INTO tb_cidades VALUES (932, 'Campestre De Goi�s', 520460, 9, 3387, 12.37, 'campestrino', 273.815);
INSERT INTO tb_cidades VALUES (935, 'Campo Alegre De Goi�s', 520480, 9, 6060, 2.46, 'campo-alegrense', 2462.991);
INSERT INTO tb_cidades VALUES (937, 'Campos Belos', 520490, 9, 18410, 25.43, 'campo-belense', 724.066);
INSERT INTO tb_cidades VALUES (939, 'Carmo Do Rio Verde', 520500, 9, 8928, 21.33, 'carmo-rio-verdino', 418.543);
INSERT INTO tb_cidades VALUES (942, 'Catura�', 520520, 9, 4686, 22.61, 'caturaiense', 207.264);
INSERT INTO tb_cidades VALUES (945, 'Cezarina', 520545, 9, 7545, 18.15, 'cezarinense', 415.811);
INSERT INTO tb_cidades VALUES (947, 'Cidade Ocidental', 520549, 9, 55915, 143.4, 'ocidentalense', 389.92);
INSERT INTO tb_cidades VALUES (949, 'Colinas Do Sul', 520552, 9, 3523, 2.06, 'colinense', 1708.185);
INSERT INTO tb_cidades VALUES (952, 'Corumba�ba', 520590, 9, 8181, 4.34, 'corumbaibense', 1883.665);
INSERT INTO tb_cidades VALUES (954, 'Cristian�polis', 520630, 9, 2932, 13.01, 'cristianopolino', 225.358);
INSERT INTO tb_cidades VALUES (956, 'Crom�nia', 520650, 9, 3555, 9.76, 'crominiense', 364.105);
INSERT INTO tb_cidades VALUES (959, 'Damol�ndia', 520680, 9, 2747, 32.51, 'damolandense', 84.495);
INSERT INTO tb_cidades VALUES (961, 'Diorama', 520710, 9, 2479, 3.61, 'dioramense', 687.348);
INSERT INTO tb_cidades VALUES (963, 'Doverl�ndia', 520725, 9, 7892, 2.45, 'doverlandense', 3222.942);
INSERT INTO tb_cidades VALUES (966, 'Estrela Do Norte', 520750, 9, 3320, 11.01, 'estrela-nortense', 301.641);
INSERT INTO tb_cidades VALUES (968, 'Fazenda Nova', 520760, 9, 6322, 4.93, 'fazenda-novense', 1281.419);
INSERT INTO tb_cidades VALUES (970, 'Flores De Goi�s', 520790, 9, 12066, 3.25, 'florense', 3709.421);
INSERT INTO tb_cidades VALUES (973, 'Gameleira De Goi�s', 520815, 9, 3275, 5.53, 'gameleirense', 591.994);
INSERT INTO tb_cidades VALUES (976, 'Goian�sia', 520860, 9, 59549, 38.49, 'goianesiense', 1547.272);
INSERT INTO tb_cidades VALUES (978, 'Goianira', 520880, 9, 34060, 162.94, 'goianirense', 209.037);
INSERT INTO tb_cidades VALUES (980, 'Goiatuba', 520910, 9, 32492, 13.13, 'goiatubense', 2475.112);
INSERT INTO tb_cidades VALUES (983, 'Guara�ta', 520929, 9, 2376, 11.57, 'guaraitense', 205.306);
INSERT INTO tb_cidades VALUES (985, 'Guarinos', 520945, 9, 2299, 3.86, 'guarinense', 595.866);
INSERT INTO tb_cidades VALUES (987, 'Hidrol�ndia', 520970, 9, 17398, 18.43, 'hidrolandense', 943.896);
INSERT INTO tb_cidades VALUES (990, 'Inaciol�ndia', 520993, 9, 5699, 8.28, 'inaciolandense', 688.404);
INSERT INTO tb_cidades VALUES (992, 'Inhumas', 521000, 9, 48246, 78.68, 'inhumense', 613.225);
INSERT INTO tb_cidades VALUES (994, 'Ipiranga De Goi�s', 521015, 9, 2844, 11.79, 'ipiranguense', 241.289);
INSERT INTO tb_cidades VALUES (997, 'Itabera�', 521040, 9, 35371, 24.27, 'itaberino', 1457.279);
INSERT INTO tb_cidades VALUES (999, 'Itaguaru', 521060, 9, 5437, 22.68, 'itaguaruense', 239.677);
INSERT INTO tb_cidades VALUES (1001, 'Itapaci', 521090, 9, 18458, 19.31, 'itapacino', 956.125);
INSERT INTO tb_cidades VALUES (1004, 'Itarum�', 521130, 9, 6300, 1.83, 'itarumaense', 3433.628);
INSERT INTO tb_cidades VALUES (1006, 'Itumbiara', 521150, 9, 92883, 37.71, 'itumbiarense', 2462.93);
INSERT INTO tb_cidades VALUES (1008, 'Jandaia', 521170, 9, 6164, 7.13, 'jandaiense', 864.106);
INSERT INTO tb_cidades VALUES (1010, 'Jata�', 521190, 9, 88006, 12.27, 'jataiense', 7174.231);
INSERT INTO tb_cidades VALUES (1013, 'Jovi�nia', 521210, 9, 7118, 15.98, 'jovianiense', 445.487);
INSERT INTO tb_cidades VALUES (1015, 'Lagoa Santa', 521225, 9, 1254, 2.73, 'lagosentense', 458.868);
INSERT INTO tb_cidades VALUES (1017, 'Luzi�nia', 521250, 9, 174531, 44.06, 'luzianiense', 3961.118);
INSERT INTO tb_cidades VALUES (1019, 'Mamba�', 521270, 9, 6871, 7.8, 'mambaiense', 880.622);
INSERT INTO tb_cidades VALUES (1022, 'Matrinch�', 521295, 9, 4414, 3.84, 'matrinchaense', 1150.893);
INSERT INTO tb_cidades VALUES (1024, 'Mimoso De Goi�s', 521305, 9, 2685, 1.94, 'mimosense', 1386.914);
INSERT INTO tb_cidades VALUES (1026, 'Mineiros', 521310, 9, 52935, 5.84, 'mineirense', 9060.096);
INSERT INTO tb_cidades VALUES (1028, 'Monte Alegre De Goi�s', 521350, 9, 7730, 2.48, 'monte-alegrense', 3119.802);
INSERT INTO tb_cidades VALUES (1030, 'Montividiu', 521375, 9, 10572, 5.64, 'montividiuense', 1874.153);
INSERT INTO tb_cidades VALUES (1032, 'Morrinhos', 521380, 9, 41460, 14.57, 'morrinhense', 2846.198);
INSERT INTO tb_cidades VALUES (1035, 'Mozarl�ndia', 521400, 9, 13404, 7.73, 'mozarlandense', 1734.363);
INSERT INTO tb_cidades VALUES (1037, 'Mutun�polis', 521410, 9, 3849, 4.03, 'mutunopolino', 955.874);
INSERT INTO tb_cidades VALUES (1040, 'Niquel�ndia', 521460, 9, 42361, 4.3, 'niquelandense', 9843.235);
INSERT INTO tb_cidades VALUES (1042, 'Nova Aurora', 521480, 9, 2062, 6.81, 'nova-aurorense', 302.655);
INSERT INTO tb_cidades VALUES (1044, 'Nova Gl�ria', 521486, 9, 8508, 20.6, 'nova-glorino', 412.953);
INSERT INTO tb_cidades VALUES (1047, 'Nova Veneza', 521500, 9, 8129, 65.89, 'nova-venezino', 123.377);
INSERT INTO tb_cidades VALUES (1049, 'Novo Gama', 521523, 9, 95018, 489.41, 'novo-gamense', 194.148);
INSERT INTO tb_cidades VALUES (1051, 'Orizona', 521530, 9, 14300, 7.25, 'orizonense', 1972.883);
INSERT INTO tb_cidades VALUES (1053, 'Ouvidor', 521550, 9, 5467, 13.21, 'ouvidorense', 413.784);
INSERT INTO tb_cidades VALUES (1055, 'Palestina De Goi�s', 521565, 9, 3371, 2.55, 'palestinense', 1320.687);
INSERT INTO tb_cidades VALUES (1058, 'Palmin�polis', 521590, 9, 3557, 9.17, 'palminopolino', 387.693);
INSERT INTO tb_cidades VALUES (1060, 'Paranaiguara', 521630, 9, 9100, 7.89, 'paranaiguarense', 1153.834);
INSERT INTO tb_cidades VALUES (1063, 'Petrolina De Goi�s', 521680, 9, 10283, 19.35, 'petrolinense', 531.3);
INSERT INTO tb_cidades VALUES (1065, 'Piracanjuba', 521710, 9, 24026, 9.99, 'piracanjubense', 2405.12);
INSERT INTO tb_cidades VALUES (1067, 'Piren�polis', 521730, 9, 23006, 10.43, 'pirenopolino', 2205.008);
INSERT INTO tb_cidades VALUES (1070, 'Pontalina', 521770, 9, 17121, 11.91, 'pontalinense', 1436.954);
INSERT INTO tb_cidades VALUES (1072, 'Porteir�o', 521805, 9, 3347, 5.54, 'porteirense', 603.941);
INSERT INTO tb_cidades VALUES (1075, 'Professor Jamil', 521839, 9, 3239, 9.32, 'jamilense', 347.465);
INSERT INTO tb_cidades VALUES (1077, 'Rialma', 521860, 9, 10523, 39.2, 'rialmense', 268.466);
INSERT INTO tb_cidades VALUES (1079, 'Rio Quente', 521878, 9, 3312, 12.94, 'rio-quentense', 255.961);
INSERT INTO tb_cidades VALUES (1082, 'Sanclerl�ndia', 521900, 9, 7550, 15.2, 'sanclerlandense', 496.825);
INSERT INTO tb_cidades VALUES (1084, 'Santa Cruz De Goi�s', 521920, 9, 3142, 2.83, 'santa-cruzano', 1108.962);
INSERT INTO tb_cidades VALUES (1086, 'Santa Helena De Goi�s', 521930, 9, 36469, 31.95, 'santa-helenense', 1141.33);
INSERT INTO tb_cidades VALUES (1089, 'Santa Rita Do Novo Destino', 521945, 9, 3173, 3.32, 'santaritense', 956.04);
INSERT INTO tb_cidades VALUES (1091, 'Santa Tereza De Goi�s', 521960, 9, 3995, 5.03, 'santerezino', 794.555);
INSERT INTO tb_cidades VALUES (1094, 'Santo Ant�nio De Goi�s', 521973, 9, 4703, 35.41, 'santoantoniense', 132.805);
INSERT INTO tb_cidades VALUES (1097, 'S�o Francisco De Goi�s', 521990, 9, 6120, 14.72, 'franciscano', 415.791);
INSERT INTO tb_cidades VALUES (1099, 'S�o Jo�o Da Para�na', 522005, 9, 1689, 5.87, 'joanino', 287.825);
INSERT INTO tb_cidades VALUES (1102, 'S�o Miguel Do Araguaia', 522020, 9, 22283, 3.63, 's�o-miguelense', 6144.4);
INSERT INTO tb_cidades VALUES (1105, 'S�o Sim�o', 522040, 9, 17088, 41.27, 'canalense', 414.011);
INSERT INTO tb_cidades VALUES (1107, 'Serran�polis', 522050, 9, 7481, 1.35, 'serranopolino', 5526.726);
INSERT INTO tb_cidades VALUES (1110, 'S�tio D`Abadia', 522070, 9, 2825, 1.77, 'sitiense', 1598.344);
INSERT INTO tb_cidades VALUES (1112, 'Teresina De Goi�s', 522108, 9, 3016, 3.89, 'teresinense', 774.637);
INSERT INTO tb_cidades VALUES (1114, 'Tr�s Ranchos', 522130, 9, 2819, 9.99, 'triranchense', 282.069);
INSERT INTO tb_cidades VALUES (1117, 'Turv�nia', 522150, 9, 4839, 10.06, 'turvaniense', 480.775);
INSERT INTO tb_cidades VALUES (1119, 'Uirapuru', 522157, 9, 2933, 2.54, 'uirapuruense', 1153.473);
INSERT INTO tb_cidades VALUES (1121, 'Uruana', 522170, 9, 13826, 26.46, 'uruanense', 522.505);
INSERT INTO tb_cidades VALUES (1123, 'Valpara�so De Goi�s', 522185, 9, 132982, 2.197, 'valparaisense', 60.525);
INSERT INTO tb_cidades VALUES (1126, 'Vicentin�polis', 522205, 9, 7371, 10, 'vicentinopolino', 737.255);
INSERT INTO tb_cidades VALUES (1129, 'A�ail�ndia', 210005, 10, 104047, 17.92, 'a�ailandense', 5806.371);
INSERT INTO tb_cidades VALUES (1131, '�gua Doce Do Maranh�o', 210015, 10, 11581, 26.13, 'aguadocense', 443.264);
INSERT INTO tb_cidades VALUES (1134, 'Altamira Do Maranh�o', 210040, 10, 11063, 15.33, 'altamirense', 721.504);
INSERT INTO tb_cidades VALUES (1136, 'Alto Alegre Do Pindar�', 210047, 10, 31057, 16.07, 'alto-alegrense', 1932.283);
INSERT INTO tb_cidades VALUES (1139, 'Amarante Do Maranh�o', 210060, 10, 37932, 5.1, 'amarantino', 7438.019);
INSERT INTO tb_cidades VALUES (1142, 'Apicum A�u', 210083, 10, 14959, 42.36, 'apicum-a�uense', 353.164);
INSERT INTO tb_cidades VALUES (1144, 'Araioses', 210090, 10, 42505, 23.84, 'araiosense', 1782.59);
INSERT INTO tb_cidades VALUES (1146, 'Arari', 210100, 10, 28488, 25.89, 'arariense', 1100.269);
INSERT INTO tb_cidades VALUES (1149, 'Bacabeira', 210125, 10, 14925, 24.25, 'bacabeirense', 615.586);
INSERT INTO tb_cidades VALUES (1150, 'Bacuri', 210130, 10, 16604, 21.08, 'bacuriense', 787.851);
INSERT INTO tb_cidades VALUES (1151, 'Bacurituba', 210135, 10, 5293, 7.85, 'bacuritubense', 674.508);
INSERT INTO tb_cidades VALUES (1153, 'Bar�o De Graja�', 210150, 10, 17841, 7.94, 'baronense', 2247.229);
INSERT INTO tb_cidades VALUES (1155, 'Barreirinhas', 210170, 10, 54930, 17.65, 'barreirinhense', 3111.974);
INSERT INTO tb_cidades VALUES (1158, 'Benedito Leite', 210180, 10, 5469, 3.07, 'beneleitense', 1781.727);
INSERT INTO tb_cidades VALUES (1160, 'Bernardo Do Mearim', 210193, 10, 5996, 22.93, 'bernardense', 261.45);
INSERT INTO tb_cidades VALUES (1163, 'Bom Jesus Das Selvas', 210203, 10, 28459, 10.62, 'bom-jesuense', 2679.093);
INSERT INTO tb_cidades VALUES (1165, 'Brejo', 210210, 10, 33359, 31.04, 'brejense', 1074.578);
INSERT INTO tb_cidades VALUES (1168, 'Buriti Bravo', 210230, 10, 22899, 14.47, 'buriti-bravense', 1582.545);
INSERT INTO tb_cidades VALUES (1170, 'Buritirana', 210235, 10, 14784, 18.06, 'buritiranense ', 818.421);
INSERT INTO tb_cidades VALUES (1172, 'Cajapi�', 210240, 10, 10593, 11.66, 'cajapioense', 908.724);
INSERT INTO tb_cidades VALUES (1174, 'Campestre Do Maranh�o', 210255, 10, 13369, 21.72, 'campestrense', 615.381);
INSERT INTO tb_cidades VALUES (1177, 'Capinzal Do Norte', 210275, 10, 10698, 18.12, 'capinzalense', 590.526);
INSERT INTO tb_cidades VALUES (1180, 'Caxias', 210300, 10, 155129, 30.12, 'caxiense', 5150.647);
INSERT INTO tb_cidades VALUES (1182, 'Central Do Maranh�o', 210312, 10, 7887, 24.72, 'centralense', 319.051);
INSERT INTO tb_cidades VALUES (1184, 'Centro Novo Do Maranh�o', 210317, 10, 17622, 2.13, 'centronovense', 8258.387);
INSERT INTO tb_cidades VALUES (1187, 'Cod�', 210330, 10, 118038, 27.06, 'codoense', 4361.318);
INSERT INTO tb_cidades VALUES (1189, 'Colinas', 210350, 10, 39132, 19.76, 'colinense', 1980.545);
INSERT INTO tb_cidades VALUES (1192, 'Cururupu', 210370, 10, 32652, 26.69, 'cururupuense', 1223.364);
INSERT INTO tb_cidades VALUES (1194, 'Dom Pedro', 210380, 10, 22681, 63.27, 'dom-pedrense', 358.492);
INSERT INTO tb_cidades VALUES (1196, 'Esperantin�polis', 210400, 10, 18452, 38.37, 'esperantinopense ', 480.914);
INSERT INTO tb_cidades VALUES (1198, 'Feira Nova Do Maranh�o', 210407, 10, 8126, 5.52, 'nova-feirense', 1473.41);
INSERT INTO tb_cidades VALUES (1201, 'Fortaleza Dos Nogueiras', 210410, 10, 11646, 7, 'fortalezense', 1664.323);
INSERT INTO tb_cidades VALUES (1204, 'Gon�alves Dias', 210440, 10, 17482, 19.9, 'gon�alvino', 878.545);
INSERT INTO tb_cidades VALUES (1206, 'Governador Edison Lob�o', 210455, 10, 15895, 25.81, 'edison-lobense ', 615.84);
INSERT INTO tb_cidades VALUES (1208, 'Governador Luiz Rocha', 210462, 10, 7337, 19.66, 'luiz-rochense ', 373.162);
INSERT INTO tb_cidades VALUES (1211, 'Gra�a Aranha', 210470, 10, 6140, 22.62, 'gra�aranhense', 271.442);
INSERT INTO tb_cidades VALUES (1214, 'Humberto De Campos', 210500, 10, 26189, 12.29, 'humbertoense', 2131.25);
INSERT INTO tb_cidades VALUES (1216, 'Igarap� Do Meio', 210515, 10, 12550, 34.04, 'igarapeense', 368.683);
INSERT INTO tb_cidades VALUES (1219, 'Itaipava Do Graja�', 210535, 10, 14297, 11.54, 'itaipavense', 1238.815);
INSERT INTO tb_cidades VALUES (1221, 'Itinga Do Maranh�o', 210542, 10, 24863, 6.94, 'itinguense', 3581.702);
INSERT INTO tb_cidades VALUES (1223, 'Jenipapo Dos Vieiras', 210547, 10, 15440, 7.87, 'jenipapoense', 1962.889);
INSERT INTO tb_cidades VALUES (1226, 'Junco Do Maranh�o', 210565, 10, 4020, 7.24, 'juncoense', 555.085);
INSERT INTO tb_cidades VALUES (1228, 'Lago Do Junco', 210580, 10, 10729, 34.72, 'juncoense', 309.019);
INSERT INTO tb_cidades VALUES (1231, 'Lagoa Do Mato', 210592, 10, 10934, 6.48, 'lagoense', 1688.038);
INSERT INTO tb_cidades VALUES (1233, 'Lajeado Novo', 210598, 10, 6923, 6.61, 'lajeadense', 1047.729);
INSERT INTO tb_cidades VALUES (1236, 'Lu�s Domingues', 210620, 10, 6510, 14.03, 'lu�s-dominguense', 464.057);
INSERT INTO tb_cidades VALUES (1238, 'Maraca�um�', 210632, 10, 19155, 30.44, 'maraca�umeense', 629.302);
INSERT INTO tb_cidades VALUES (1240, 'Maranh�ozinho', 210637, 10, 14065, 14.46, 'maranh�ozinense', 972.612);
INSERT INTO tb_cidades VALUES (1243, 'Mat�es', 210660, 10, 31015, 15.69, 'matoense', 1976.13);
INSERT INTO tb_cidades VALUES (1245, 'Milagres Do Maranh�o', 210667, 10, 8118, 12.79, 'milagrense', 634.734);
INSERT INTO tb_cidades VALUES (1248, 'Mirinzal', 210680, 10, 14218, 20.67, 'mirinzalense', 687.744);
INSERT INTO tb_cidades VALUES (1250, 'Montes Altos', 210700, 10, 9413, 6.32, 'monte-altense', 1488.331);
INSERT INTO tb_cidades VALUES (1253, 'Nova Colinas', 210725, 10, 4885, 6.57, 'nova-colinense', 743.103);
INSERT INTO tb_cidades VALUES (1255, 'Nova Olinda Do Maranh�o', 210735, 10, 19134, 7.8, 'novaolindense ', 2452.603);
INSERT INTO tb_cidades VALUES (1257, 'Olinda Nova Do Maranh�o', 210745, 10, 13181, 66.69, 'olindense', 197.635);
INSERT INTO tb_cidades VALUES (1260, 'Paraibano', 210770, 10, 20103, 37.89, 'paraibanense', 530.515);
INSERT INTO tb_cidades VALUES (1263, 'Pastos Bons', 210800, 10, 18067, 11.05, 'pastos-bonense', 1635.298);
INSERT INTO tb_cidades VALUES (1265, 'Paulo Ramos', 210810, 10, 20079, 19.06, 'paulo-ramense', 1053.409);
INSERT INTO tb_cidades VALUES (1267, 'Pedro Do Ros�rio', 210825, 10, 22732, 12.99, 'pedro-rosariense', 1749.876);
INSERT INTO tb_cidades VALUES (1270, 'Peritor�', 210845, 10, 21201, 25.71, 'peritoroense', 824.718);
INSERT INTO tb_cidades VALUES (1272, 'Pinheiro', 210860, 10, 78162, 51.66, 'pinheirense', 1512.958);
INSERT INTO tb_cidades VALUES (1274, 'Pirapemas', 210880, 10, 17381, 25.24, 'pirapemense', 688.758);
INSERT INTO tb_cidades VALUES (1275, 'Po��o De Pedras', 210890, 10, 19708, 20.13, 'po��o-pedrense', 979.199);
INSERT INTO tb_cidades VALUES (1278, 'Presidente Dutra', 210910, 10, 44731, 57.97, 'presidutrense', 771.57);
INSERT INTO tb_cidades VALUES (1280, 'Presidente M�dici', 210923, 10, 6374, 14.56, 'medicense', 437.685);
INSERT INTO tb_cidades VALUES (1283, 'Primeira Cruz', 210940, 10, 13954, 10.2, 'primeira-cruzense', 1367.669);
INSERT INTO tb_cidades VALUES (1285, 'Riach�o', 210950, 10, 20209, 3.17, 'riach�oense', 6372.995);
INSERT INTO tb_cidades VALUES (1288, 'Samba�ba', 210970, 10, 5487, 2.21, 'sambaibense', 2478.687);
INSERT INTO tb_cidades VALUES (1289, 'Santa Filomena Do Maranh�o', 210975, 10, 7061, 11.72, 'santa-filomenense', 602.338);
INSERT INTO tb_cidades VALUES (1292, 'Santa Luzia', 211000, 10, 74043, 15.54, 'santa-luziense', 4766.115);
INSERT INTO tb_cidades VALUES (1294, 'Santa Quit�ria Do Maranh�o', 211010, 10, 29191, 15.22, 'quiteriense', 1917.58);
INSERT INTO tb_cidades VALUES (1297, 'Santo Amaro Do Maranh�o', 211027, 10, 13820, 8.63, 'santamarense', 1601.171);
INSERT INTO tb_cidades VALUES (1299, 'S�o Benedito Do Rio Preto', 211040, 10, 17799, 19.11, 's�o-beneditense', 931.476);
INSERT INTO tb_cidades VALUES (1302, 'S�o Domingos Do Azeit�o', 211065, 10, 6983, 7.27, 's�o-dominguense', 960.925);
INSERT INTO tb_cidades VALUES (1305, 'S�o Francisco Do Brej�o', 211085, 10, 10261, 13.76, 'brej�oense', 745.603);
INSERT INTO tb_cidades VALUES (1307, 'S�o Jo�o Batista', 211100, 10, 19920, 28.84, 'juanino ou joanino', 690.679);
INSERT INTO tb_cidades VALUES (1309, 'S�o Jo�o Do Para�so', 211105, 10, 10814, 5.27, 'paraisense', 2053.835);
INSERT INTO tb_cidades VALUES (1312, 'S�o Jos� De Ribamar', 211120, 10, 163045, 419.82, 'ribamarense', 388.369);
INSERT INTO tb_cidades VALUES (1315, 'S�o Lu�s Gonzaga Do Maranh�o', 211140, 10, 20153, 20.81, 'gonzaguense', 968.567);
INSERT INTO tb_cidades VALUES (1318, 'S�o Pedro Dos Crentes', 211157, 10, 4425, 4.52, 's�o-pedrense', 979.628);
INSERT INTO tb_cidades VALUES (1320, 'S�o Raimundo Do Doca Bezerra', 211163, 10, 6090, 14.52, 's�o-raimundense', 419.35);
INSERT INTO tb_cidades VALUES (1323, 'Satubinha', 211172, 10, 11990, 27.14, 'satubinhense', 441.809);
INSERT INTO tb_cidades VALUES (1325, 'Senador La Rocque', 211176, 10, 17998, 14.55, 'laroquense', 1236.678);
INSERT INTO tb_cidades VALUES (1328, 'Sucupira Do Norte', 211190, 10, 10444, 9.72, 'sucupirense', 1074.46);
INSERT INTO tb_cidades VALUES (1330, 'Tasso Fragoso', 211200, 10, 7796, 1.78, 'fragosense', 4382.96);
INSERT INTO tb_cidades VALUES (1333, 'Trizidela Do Vale', 211223, 10, 18953, 85.01, 'trizidelense', 222.945);
INSERT INTO tb_cidades VALUES (1335, 'Tuntum', 211230, 10, 39183, 11.56, 'tuntuense', 3389.981);
INSERT INTO tb_cidades VALUES (1338, 'Tut�ia', 211250, 10, 52788, 31.96, 'tutoiense', 1651.647);
INSERT INTO tb_cidades VALUES (1340, 'Vargem Grande', 211270, 10, 49412, 25.24, 'vargem-grandense', 1957.74);
INSERT INTO tb_cidades VALUES (1342, 'Vila Nova Dos Mart�rios', 211285, 10, 11258, 9.47, 'vila-novense', 1188.765);
INSERT INTO tb_cidades VALUES (1345, 'Z� Doca', 211400, 10, 50173, 20.77, 'z�-doquense', 2416.053);
INSERT INTO tb_cidades VALUES (1347, 'Abaet�', 310020, 11, 22690, 12.49, 'abaetense', 1817.066);
INSERT INTO tb_cidades VALUES (1349, 'Acaiaca', 310040, 11, 3920, 38.47, 'acaiaquense', 101.886);
INSERT INTO tb_cidades VALUES (1352, '�gua Comprida', 310070, 11, 2025, 4.12, '�gua-compridense', 491.045);
INSERT INTO tb_cidades VALUES (1354, '�guas Formosas', 310090, 11, 18479, 22.53, '�guas-formosense', 820.077);
INSERT INTO tb_cidades VALUES (1356, 'Aimor�s', 310110, 11, 24959, 18.5, 'aimorense', 1348.774);
INSERT INTO tb_cidades VALUES (1359, 'Albertina', 310140, 11, 2913, 50.22, 'albertinense', 58.01);
INSERT INTO tb_cidades VALUES (1361, 'Alfenas', 310160, 11, 73774, 86.75, 'alfenense', 850.446);
INSERT INTO tb_cidades VALUES (1363, 'Almenara', 310170, 11, 38775, 16.9, 'almenarense', 2294.42);
INSERT INTO tb_cidades VALUES (1365, 'Alpin�polis', 310190, 11, 18488, 40.66, 'alpinopolense', 454.751);
INSERT INTO tb_cidades VALUES (1368, 'Alto Jequitib�', 315350, 11, 8318, 54.63, 'jequitibaense', 152.272);
INSERT INTO tb_cidades VALUES (1370, 'Alvarenga', 310220, 11, 4444, 15.98, 'alvarenguense', 278.173);
INSERT INTO tb_cidades VALUES (1372, 'Alvorada De Minas', 310240, 11, 3546, 9.48, 'alvoradense', 374.008);
INSERT INTO tb_cidades VALUES (1375, 'Andrel�ndia', 310280, 11, 12173, 12.11, 'andrelandense', 1005.284);
INSERT INTO tb_cidades VALUES (1377, 'Ant�nio Carlos', 310290, 11, 11114, 20.97, 'ant�nio-carlense', 529.915);
INSERT INTO tb_cidades VALUES (1379, 'Ant�nio Prado De Minas', 310310, 11, 1671, 19.94, 'pradense-de-minas', 83.802);
INSERT INTO tb_cidades VALUES (1382, 'Ara�ua�', 310340, 11, 36013, 16.1, 'ara�uaiense', 2236.275);
INSERT INTO tb_cidades VALUES (1385, 'Araponga', 310370, 11, 8152, 26.83, 'araponguense', 303.792);
INSERT INTO tb_cidades VALUES (1387, 'Arapu�', 310380, 11, 2775, 15.96, 'arapuaense', 173.894);
INSERT INTO tb_cidades VALUES (1389, 'Arax�', 310400, 11, 93672, 80.45, 'araxaense', 1164.358);
INSERT INTO tb_cidades VALUES (1391, 'Arcos', 310420, 11, 36597, 71.78, 'arcoense', 509.873);
INSERT INTO tb_cidades VALUES (1394, 'Aricanduva', 310445, 11, 4770, 19.6, 'aricanduvense ', 243.328);
INSERT INTO tb_cidades VALUES (1396, 'Astolfo Dutra', 310460, 11, 13049, 82.13, 'astolfo-dutrense', 158.89);
INSERT INTO tb_cidades VALUES (1397, 'Atal�ia', 310470, 11, 14455, 7.87, 'ataleiense', 1836.974);
INSERT INTO tb_cidades VALUES (1400, 'Baldim', 310500, 11, 7913, 14.23, 'baldinense', 556.266);
INSERT INTO tb_cidades VALUES (1402, 'Bandeira', 310520, 11, 4987, 10.31, 'bandeirense', 483.788);
INSERT INTO tb_cidades VALUES (1404, 'Bar�o De Cocais', 310540, 11, 28442, 83.51, 'cocaiense', 340.601);
INSERT INTO tb_cidades VALUES (1407, 'Barra Longa', 310570, 11, 6143, 16.01, 'barra-longuense', 383.628);
INSERT INTO tb_cidades VALUES (1409, 'Bela Vista De Minas', 310600, 11, 10004, 91.66, 'bela-vistano', 109.143);
INSERT INTO tb_cidades VALUES (1411, 'Belo Horizonte', 310620, 11, 2375151, 7.167, 'belo-horizontino', 331.4);
INSERT INTO tb_cidades VALUES (1414, 'Berilo', 310650, 11, 12300, 20.95, 'berilense', 587.105);
INSERT INTO tb_cidades VALUES (1416, 'Bert�polis', 310660, 11, 4498, 10.51, 'bertopolitano', 427.802);
INSERT INTO tb_cidades VALUES (1418, 'Bias Fortes', 310680, 11, 3793, 13.38, 'bias-fortense', 283.535);
INSERT INTO tb_cidades VALUES (1421, 'Boa Esperan�a', 310710, 11, 38516, 44.75, 'esperancense', 860.669);
INSERT INTO tb_cidades VALUES (1423, 'Bocai�va', 310730, 11, 46654, 14.45, 'bocaiuvense', 3227.622);
INSERT INTO tb_cidades VALUES (1425, 'Bom Jardim De Minas', 310750, 11, 6501, 15.78, 'bom-jardinense', 412.021);
INSERT INTO tb_cidades VALUES (1428, 'Bom Jesus Do Galho', 310780, 11, 15364, 25.94, 'bom-jesuense', 592.288);
INSERT INTO tb_cidades VALUES (1430, 'Bom Sucesso', 310800, 11, 17243, 24.46, 'bom-sucessense', 705.046);
INSERT INTO tb_cidades VALUES (1432, 'Bonfin�polis De Minas', 310820, 11, 5865, 3.28, 'bonfinopolitano', 1789.165);
INSERT INTO tb_cidades VALUES (1435, 'Botelhos', 310840, 11, 14920, 44.66, 'botelhense', 334.089);
INSERT INTO tb_cidades VALUES (1437, 'Br�s Pires', 310870, 11, 4637, 20.76, 'br�s-pirense', 223.351);
INSERT INTO tb_cidades VALUES (1439, 'Bras�lia De Minas', 310860, 11, 31213, 22.3, 'brasilminense', 1399.482);
INSERT INTO tb_cidades VALUES (1442, 'Brumadinho', 310900, 11, 33973, 53.13, 'brumadinhense', 639.434);
INSERT INTO tb_cidades VALUES (1444, 'Buen�polis', 310920, 11, 10292, 6.43, 'buenopolitano ', 1599.879);
INSERT INTO tb_cidades VALUES (1447, 'Buritizeiro', 310940, 11, 26922, 3.73, 'buritizeirense', 7218.392);
INSERT INTO tb_cidades VALUES (1449, 'Cabo Verde', 310950, 11, 13823, 37.54, 'cabo-verdense', 368.206);
INSERT INTO tb_cidades VALUES (1451, 'Cachoeira De Minas', 310970, 11, 11034, 36.27, 'cachoeirense', 304.243);
INSERT INTO tb_cidades VALUES (1453, 'Cachoeira Dourada', 310980, 11, 2505, 12.47, 'cachoeirense', 200.928);
INSERT INTO tb_cidades VALUES (1456, 'Caiana', 311010, 11, 4968, 46.67, 'caianense', 106.459);
INSERT INTO tb_cidades VALUES (1458, 'Caldas', 311030, 11, 13633, 19.16, 'caldense', 711.414);
INSERT INTO tb_cidades VALUES (1461, 'Cambu�', 311060, 11, 26488, 108.31, 'cambuiense', 244.567);
INSERT INTO tb_cidades VALUES (1463, 'Campan�rio', 311080, 11, 3564, 8.06, 'campanarense', 442.397);
INSERT INTO tb_cidades VALUES (1465, 'Campestre', 311100, 11, 20686, 35.8, 'campestrense', 577.843);
INSERT INTO tb_cidades VALUES (1467, 'Campo Azul', 311115, 11, 3684, 7.28, 'campoazulense', 505.913);
INSERT INTO tb_cidades VALUES (1469, 'Campo Do Meio', 311130, 11, 11476, 41.67, 'campo-meiense', 275.426);
INSERT INTO tb_cidades VALUES (1472, 'Campos Gerais', 311160, 11, 27600, 35.87, 'campos-geraiense', 769.504);
INSERT INTO tb_cidades VALUES (1474, 'Cana�', 311170, 11, 4628, 26.46, 'cana�ense', 174.9);
INSERT INTO tb_cidades VALUES (1477, 'Cantagalo', 311205, 11, 4195, 29.57, 'cantagalense', 141.855);
INSERT INTO tb_cidades VALUES (1479, 'Capela Nova', 311220, 11, 4755, 42.81, 'capela-novense', 111.073);
INSERT INTO tb_cidades VALUES (1481, 'Capetinga', 311240, 11, 7089, 23.79, 'capetinguense', 297.937);
INSERT INTO tb_cidades VALUES (1483, 'Capin�polis', 311260, 11, 15290, 24.63, 'capinopolino', 620.716);
INSERT INTO tb_cidades VALUES (1485, 'Capit�o En�as', 311270, 11, 14206, 14.62, 'capit�o-eneense', 971.581);
INSERT INTO tb_cidades VALUES (1488, 'Cara�', 311300, 11, 22343, 17.99, 'caraiense', 1242.197);
INSERT INTO tb_cidades VALUES (1490, 'Caranda�', 311320, 11, 23346, 48.06, 'carandaiense', 485.723);
INSERT INTO tb_cidades VALUES (1492, 'Caratinga', 311340, 11, 85239, 67.72, 'caratinguense', 1258.776);
INSERT INTO tb_cidades VALUES (1495, 'Carlos Chagas', 311370, 11, 20069, 6.27, 'carlos-chaguense', 3202.977);
INSERT INTO tb_cidades VALUES (1497, 'Carmo Da Cachoeira', 311390, 11, 11836, 23.38, 'carmo-cachoeirense', 506.333);
INSERT INTO tb_cidades VALUES (1499, 'Carmo De Minas', 311410, 11, 13750, 42.66, 'carmoense', 322.285);
INSERT INTO tb_cidades VALUES (1502, 'Carmo Do Rio Claro', 311440, 11, 20426, 19.17, 'carmelitano', 1065.685);
INSERT INTO tb_cidades VALUES (1505, 'Carrancas', 311460, 11, 3948, 5.42, 'carranquense', 727.893);
INSERT INTO tb_cidades VALUES (1507, 'Carvalhos', 311480, 11, 4556, 16.14, 'carvalhense', 282.254);
INSERT INTO tb_cidades VALUES (1509, 'Cascalho Rico', 311500, 11, 2857, 7.78, 'cascalho-riquense', 367.308);
INSERT INTO tb_cidades VALUES (1512, 'Catas Altas', 311535, 11, 4846, 20.19, 'catas-altense ', 240.042);
INSERT INTO tb_cidades VALUES (1513, 'Catas Altas Da Noruega', 311540, 11, 3462, 24.45, 'catas-altense', 141.622);
INSERT INTO tb_cidades VALUES (1516, 'Caxambu', 311550, 11, 21705, 216.01, 'caxambuense', 100.483);
INSERT INTO tb_cidades VALUES (1519, 'Centralina', 311580, 11, 10266, 31.38, 'centralinense', 327.191);
INSERT INTO tb_cidades VALUES (1521, 'Chal�', 311600, 11, 5645, 26.54, 'chaleense', 212.674);
INSERT INTO tb_cidades VALUES (1523, 'Chapada Ga�cha', 311615, 11, 10805, 3.32, 'chapadense', 3255.182);
INSERT INTO tb_cidades VALUES (1524, 'Chiador', 311620, 11, 2785, 11.01, 'chiadorense', 252.938);
INSERT INTO tb_cidades VALUES (1526, 'Claraval', 311640, 11, 4542, 19.95, 'claravalense', 227.627);
INSERT INTO tb_cidades VALUES (1528, 'Cl�udio', 311660, 11, 25771, 40.86, 'claudiense', 630.706);
INSERT INTO tb_cidades VALUES (1530, 'Coluna', 311680, 11, 9024, 25.89, 'colunense', 348.491);
INSERT INTO tb_cidades VALUES (1532, 'Comercinho', 311700, 11, 8298, 12.67, 'comerciense', 654.959);
INSERT INTO tb_cidades VALUES (1534, 'Concei��o Da Barra De Minas', 311520, 11, 3954, 14.48, 'conceicionense', 273.014);
INSERT INTO tb_cidades VALUES (1537, 'Concei��o De Ipanema', 311740, 11, 4456, 17.55, 'ipanemense', 253.935);
INSERT INTO tb_cidades VALUES (1540, 'Concei��o Do Rio Verde', 311770, 11, 12949, 35.03, 'conceicionense', 369.681);
INSERT INTO tb_cidades VALUES (1542, 'C�nego Marinho', 311783, 11, 7101, 4.32, 'c�nego marinhense', 1641.994);
INSERT INTO tb_cidades VALUES (1545, 'Congonhas', 311800, 11, 48519, 159.57, 'congonhense', 304.066);
INSERT INTO tb_cidades VALUES (1547, 'Conquista', 311820, 11, 6526, 10.55, 'conquistense', 618.363);
INSERT INTO tb_cidades VALUES (1549, 'Conselheiro Pena', 311840, 11, 22242, 14.99, 'conselheiro-penense', 1483.882);
INSERT INTO tb_cidades VALUES (1552, 'Coqueiral', 311870, 11, 9289, 31.36, 'coqueirense', 296.163);
INSERT INTO tb_cidades VALUES (1554, 'Cordisburgo', 311890, 11, 8667, 10.52, 'cordisburguense', 823.653);
INSERT INTO tb_cidades VALUES (1557, 'Coroaci', 311920, 11, 10270, 17.82, 'coroaciense', 576.273);
INSERT INTO tb_cidades VALUES (1559, 'Coronel Fabriciano', 311940, 11, 103694, 468.67, 'fabricianense', 221.252);
INSERT INTO tb_cidades VALUES (1561, 'Coronel Pacheco', 311960, 11, 2983, 22.68, 'pachequense', 131.511);
INSERT INTO tb_cidades VALUES (1564, 'C�rrego Do Bom Jesus', 311990, 11, 3730, 30.17, 'correguense', 123.651);
INSERT INTO tb_cidades VALUES (1566, 'C�rrego Novo', 312000, 11, 3127, 15.23, 'c�rrego-novense', 205.385);
INSERT INTO tb_cidades VALUES (1569, 'Cristais', 312020, 11, 11286, 17.96, 'cristalense', 628.434);
INSERT INTO tb_cidades VALUES (1571, 'Cristiano Otoni', 312040, 11, 5007, 37.68, 'cristianense', 132.872);
INSERT INTO tb_cidades VALUES (1573, 'Crucil�ndia', 312060, 11, 4757, 28.46, 'crucilandense', 167.164);
INSERT INTO tb_cidades VALUES (1576, 'Cuparaque', 312083, 11, 4680, 20.64, 'cuparaquense', 226.75);
INSERT INTO tb_cidades VALUES (1578, 'Curvelo', 312090, 11, 74219, 22.5, 'curvelano', 3298.789);
INSERT INTO tb_cidades VALUES (1580, 'Delfim Moreira', 312110, 11, 7971, 19.51, 'delfinense', 408.473);
INSERT INTO tb_cidades VALUES (1583, 'Descoberto', 312130, 11, 4768, 22.37, 'descobertense', 213.168);
INSERT INTO tb_cidades VALUES (1585, 'Desterro Do Melo', 312150, 11, 3015, 21.19, 'melense', 142.279);
INSERT INTO tb_cidades VALUES (1587, 'Diogo De Vasconcelos', 312170, 11, 3848, 23.31, 'vasconcelense', 165.091);
INSERT INTO tb_cidades VALUES (1590, 'Divino', 312200, 11, 19133, 56.64, 'divinense', 337.776);
INSERT INTO tb_cidades VALUES (1592, 'Divinol�ndia De Minas', 312220, 11, 7024, 52.76, 'divinolandense', 133.12);
INSERT INTO tb_cidades VALUES (1595, 'Divisa Nova', 312240, 11, 5763, 26.56, 'divisa-novense', 216.955);
INSERT INTO tb_cidades VALUES (1598, 'Dom Cavati', 312250, 11, 5209, 87.52, 'dom-cavatiano', 59.52);
INSERT INTO tb_cidades VALUES (1600, 'Dom Silv�rio', 312270, 11, 5196, 26.65, 'dom-silveriense', 194.972);
INSERT INTO tb_cidades VALUES (1602, 'Dona Eus�bia', 312290, 11, 6001, 85.45, 'euzebense ', 70.231);
INSERT INTO tb_cidades VALUES (1605, 'Dores Do Indai�', 312320, 11, 13778, 12.4, 'dorense', 1111.201);
INSERT INTO tb_cidades VALUES (1608, 'Douradoquara', 312350, 11, 1841, 5.88, 'douradoquarense', 312.878);
INSERT INTO tb_cidades VALUES (1610, 'El�i Mendes', 312360, 11, 25220, 50.49, 'el�i-mendense', 499.537);
INSERT INTO tb_cidades VALUES (1612, 'Engenheiro Navarro', 312380, 11, 7122, 11.71, 'navarrense', 608.305);
INSERT INTO tb_cidades VALUES (1615, 'Erv�lia', 312400, 11, 17946, 50.2, 'ervalense', 357.489);
INSERT INTO tb_cidades VALUES (1617, 'Espera Feliz', 312420, 11, 22856, 71.96, 'espera-felizense', 317.637);
INSERT INTO tb_cidades VALUES (1619, 'Esp�rito Santo Do Dourado', 312440, 11, 4429, 16.78, 'douradense ', 263.879);
INSERT INTO tb_cidades VALUES (1622, 'Estrela Do Indai�', 312470, 11, 3516, 5.53, 'estrelense', 635.981);
INSERT INTO tb_cidades VALUES (1624, 'Eugen�polis', 312490, 11, 10540, 34.07, 'eugenopolense', 309.395);
INSERT INTO tb_cidades VALUES (1627, 'Fama', 312520, 11, 2350, 27.32, 'famense', 86.024);
INSERT INTO tb_cidades VALUES (1629, 'Fel�cio Dos Santos', 312540, 11, 5142, 14.38, 'feliz-santense', 357.621);
INSERT INTO tb_cidades VALUES (1632, 'Fernandes Tourinho', 312580, 11, 3030, 19.95, 'fernandes-tourinhense', 151.874);
INSERT INTO tb_cidades VALUES (1634, 'Fervedouro', 312595, 11, 10349, 28.93, 'fervedourense', 357.683);
INSERT INTO tb_cidades VALUES (1636, 'Formiga', 312610, 11, 65128, 43.36, 'formiguense', 1501.915);
INSERT INTO tb_cidades VALUES (1639, 'Fortuna De Minas', 312640, 11, 2705, 13.61, 'fortunense', 198.709);
INSERT INTO tb_cidades VALUES (1641, 'Francisco Dumont', 312660, 11, 4863, 3.09, 'francisco-dumonsense', 1576.126);
INSERT INTO tb_cidades VALUES (1643, 'Francisc�polis', 312675, 11, 5800, 8.09, 'franciscopolitano', 717.086);
INSERT INTO tb_cidades VALUES (1646, 'Frei Lagonegro', 312695, 11, 3329, 19.88, 'frei lagonegrense', 167.474);
INSERT INTO tb_cidades VALUES (1647, 'Fronteira', 312700, 11, 14041, 70.21, 'fronteirense', 199.987);
INSERT INTO tb_cidades VALUES (1648, 'Fronteira Dos Vales', 312705, 11, 4687, 14.61, 'fronteirista-dos-vales', 320.757);
INSERT INTO tb_cidades VALUES (1651, 'Funil�ndia', 312720, 11, 3855, 19.29, 'funilandense', 199.796);
INSERT INTO tb_cidades VALUES (1653, 'Gameleiras', 312733, 11, 5139, 2.97, 'gameleirense', 1733.199);
INSERT INTO tb_cidades VALUES (1656, 'Goian�', 312738, 11, 3659, 24.07, 'goianaense', 152.039);
INSERT INTO tb_cidades VALUES (1658, 'Gonzaga', 312750, 11, 5921, 28.28, 'gonzaguense', 209.347);
INSERT INTO tb_cidades VALUES (1660, 'Governador Valadares', 312770, 11, 263689, 112.58, 'valadarense', 2342.316);
INSERT INTO tb_cidades VALUES (1663, 'Guanh�es', 312800, 11, 31262, 29.08, 'guanhanense', 1075.122);
INSERT INTO tb_cidades VALUES (1665, 'Guaraciaba', 312820, 11, 10223, 29.33, 'guaraciabense', 348.595);
INSERT INTO tb_cidades VALUES (1667, 'Guaran�sia', 312830, 11, 18714, 63.47, 'guaranesiano', 294.828);
INSERT INTO tb_cidades VALUES (1670, 'Guarda Mor', 312860, 11, 6565, 3.17, 'guarda-morense', 2069.789);
INSERT INTO tb_cidades VALUES (1672, 'Guidoval', 312880, 11, 7206, 45.5, 'guidovalense', 158.375);
INSERT INTO tb_cidades VALUES (1674, 'Guiricema', 312900, 11, 8707, 29.66, 'guiricemense', 293.578);
INSERT INTO tb_cidades VALUES (1676, 'Heliodora', 312920, 11, 6121, 39.76, 'heliodorense', 153.95);
INSERT INTO tb_cidades VALUES (1679, 'Ibi�', 312950, 11, 23218, 8.59, 'ibiaense', 2704.131);
INSERT INTO tb_cidades VALUES (1681, 'Ibiracatu', 312965, 11, 6155, 17.42, 'ibiracatuense', 353.413);
INSERT INTO tb_cidades VALUES (1683, 'Ibirit�', 312980, 11, 158954, 2.19, 'ibiritenense', 72.573);
INSERT INTO tb_cidades VALUES (1685, 'Ibituruna', 313000, 11, 2866, 18.72, 'ibiturunense', 153.106);
INSERT INTO tb_cidades VALUES (1688, 'Igaratinga', 313020, 11, 9264, 42.43, 'igaratinguense', 218.343);
INSERT INTO tb_cidades VALUES (1690, 'Ijaci', 313040, 11, 5859, 55.67, 'ijaciense', 105.246);
INSERT INTO tb_cidades VALUES (1692, 'Imb� De Minas', 313055, 11, 6424, 32.65, 'imbeense', 196.735);
INSERT INTO tb_cidades VALUES (1695, 'Indian�polis', 313070, 11, 6190, 7.46, 'indianopolense', 830.03);
INSERT INTO tb_cidades VALUES (1697, 'Inhapim', 313090, 11, 24294, 28.31, 'inhapinhense', 858.023);
INSERT INTO tb_cidades VALUES (1699, 'Inimutaba', 313110, 11, 6724, 12.82, 'inimutabano', 524.467);
INSERT INTO tb_cidades VALUES (1702, 'Ipatinga', 313130, 11, 239468, 1.452, 'ipatinguense', 164.884);
INSERT INTO tb_cidades VALUES (1704, 'Ipui�na', 313150, 11, 9521, 31.93, 'ipuiunense', 298.195);
INSERT INTO tb_cidades VALUES (1706, 'Itabira', 313170, 11, 109783, 87.57, 'itabirano', 1253.702);
INSERT INTO tb_cidades VALUES (1709, 'Itacambira', 313200, 11, 4988, 2.79, 'itacambirano', 1788.442);
INSERT INTO tb_cidades VALUES (1711, 'Itaguara', 313220, 11, 12372, 30.14, 'itaguarense', 410.468);
INSERT INTO tb_cidades VALUES (1713, 'Itajub�', 313240, 11, 90658, 307.49, 'itajubense', 294.835);
INSERT INTO tb_cidades VALUES (1715, 'Itamarati De Minas', 313260, 11, 4079, 43.13, 'tamaratiense', 94.568);
INSERT INTO tb_cidades VALUES (1717, 'Itamb� Do Mato Dentro', 313280, 11, 2283, 6, 'itambeense', 380.34);
INSERT INTO tb_cidades VALUES (1720, 'Itanhandu', 313310, 11, 14175, 98.87, 'itanhanduense', 143.368);
INSERT INTO tb_cidades VALUES (1723, 'Itapagipe', 313340, 11, 13656, 7.58, 'itapagipense', 1802.437);
INSERT INTO tb_cidades VALUES (1725, 'Itapeva', 313360, 11, 8664, 48.85, 'itapevense', 177.347);
INSERT INTO tb_cidades VALUES (1727, 'Ita� De Minas', 313375, 11, 14945, 97.41, 'itauense', 153.421);
INSERT INTO tb_cidades VALUES (1730, 'Itinga', 313400, 11, 14407, 8.73, 'itinguense', 1649.618);
INSERT INTO tb_cidades VALUES (1732, 'Ituiutaba', 313420, 11, 97171, 37.4, 'ituiutabano', 2598.046);
INSERT INTO tb_cidades VALUES (1734, 'Iturama', 313440, 11, 34456, 24.53, 'ituramense', 1404.664);
INSERT INTO tb_cidades VALUES (1736, 'Jaboticatubas', 313460, 11, 17134, 15.38, 'jaboticatubense', 1114.155);
INSERT INTO tb_cidades VALUES (1739, 'Jacutinga', 313490, 11, 22772, 65.48, 'jacutinguense', 347.75);
INSERT INTO tb_cidades VALUES (1741, 'Ja�ba', 313505, 11, 33587, 12.79, 'jaibense', 2626.326);
INSERT INTO tb_cidades VALUES (1744, 'Janu�ria', 313520, 11, 65463, 9.83, 'januarense', 6661.653);
INSERT INTO tb_cidades VALUES (1746, 'Japonvar', 313535, 11, 8298, 22.13, 'japonvaense', 374.905);
INSERT INTO tb_cidades VALUES (1748, 'Jenipapo De Minas', 313545, 11, 7116, 25.02, 'jenipapense', 284.452);
INSERT INTO tb_cidades VALUES (1751, 'Jequitib�', 313570, 11, 5156, 11.59, 'jequitibaense', 445.029);
INSERT INTO tb_cidades VALUES (1752, 'Jequitinhonha', 313580, 11, 24131, 6.87, 'jequitinhonhense', 3514.208);
INSERT INTO tb_cidades VALUES (1755, 'Joan�sia', 313610, 11, 5425, 23.25, 'joanense', 233.292);
INSERT INTO tb_cidades VALUES (1757, 'Jo�o Pinheiro', 313630, 11, 45260, 4.22, 'pinheirense', 10727.46);
INSERT INTO tb_cidades VALUES (1760, 'Jos� Gon�alves De Minas', 313652, 11, 4553, 11.94, 'gon�alvense', 381.331);
INSERT INTO tb_cidades VALUES (1762, 'Josen�polis', 313657, 11, 4566, 8.43, 'josenopolense', 541.392);
INSERT INTO tb_cidades VALUES (1765, 'Juramento', 313680, 11, 4113, 9.53, 'juramentense', 431.629);
INSERT INTO tb_cidades VALUES (1767, 'Juven�lia', 313695, 11, 5708, 5.36, 'juveniliense', 1064.695);
INSERT INTO tb_cidades VALUES (1769, 'Lagamar', 313710, 11, 7600, 5.15, 'lagamaraense', 1474.561);
INSERT INTO tb_cidades VALUES (1772, 'Lagoa Dourada', 313740, 11, 12256, 25.71, 'lagoense', 476.693);
INSERT INTO tb_cidades VALUES (1774, 'Lagoa Grande', 313753, 11, 8631, 6.98, 'lagoa grandense', 1236.3);
INSERT INTO tb_cidades VALUES (1777, 'Lambari', 313780, 11, 19554, 91.76, 'lambariense', 213.11);
INSERT INTO tb_cidades VALUES (1778, 'Lamim', 313790, 11, 3452, 29.11, 'laminense', 118.602);
INSERT INTO tb_cidades VALUES (1780, 'Lassance', 313810, 11, 6484, 2.02, 'lassancense', 3204.213);
INSERT INTO tb_cidades VALUES (1782, 'Leandro Ferreira', 313830, 11, 3205, 9.1, 'leandrense', 352.107);
INSERT INTO tb_cidades VALUES (1784, 'Leopoldina', 313840, 11, 51130, 54.22, 'leopoldinense', 943.075);
INSERT INTO tb_cidades VALUES (1787, 'Limeira Do Oeste', 313862, 11, 6890, 5.22, 'limeirense', 1319.036);
INSERT INTO tb_cidades VALUES (1789, 'Luisburgo', 313867, 11, 6234, 42.87, 'luisburguense', 145.418);
INSERT INTO tb_cidades VALUES (1791, 'Lumin�rias', 313870, 11, 5422, 10.84, 'luminarense', 500.143);
INSERT INTO tb_cidades VALUES (1794, 'Machado', 313900, 11, 38688, 66.03, 'machadense', 585.958);
INSERT INTO tb_cidades VALUES (1796, 'Malacacheta', 313920, 11, 18776, 25.8, 'malacachetense', 727.885);
INSERT INTO tb_cidades VALUES (1798, 'Manga', 313930, 11, 19813, 10.16, 'manguense', 1950.18);
INSERT INTO tb_cidades VALUES (1801, 'Mantena', 313960, 11, 27111, 39.57, 'mantenense', 685.207);
INSERT INTO tb_cidades VALUES (1803, 'Maravilhas', 313970, 11, 7163, 27.38, 'maravilhense', 261.604);
INSERT INTO tb_cidades VALUES (1805, 'Mariana', 314000, 11, 54219, 45.4, 'marianense', 1194.207);
INSERT INTO tb_cidades VALUES (1807, 'M�rio Campos', 314015, 11, 13192, 374.82, 'mario-campense', 35.196);
INSERT INTO tb_cidades VALUES (1810, 'Marmel�polis', 314040, 11, 2968, 27.51, 'marmelopolense', 107.902);
INSERT INTO tb_cidades VALUES (1812, 'Martins Soares', 314053, 11, 7173, 63.33, 'martinsoarense', 113.268);
INSERT INTO tb_cidades VALUES (1814, 'Materl�ndia', 314060, 11, 4595, 16.38, 'materlandiense', 280.53);
INSERT INTO tb_cidades VALUES (1817, 'Matias Barbosa', 314080, 11, 13435, 85.51, 'matiense', 157.107);
INSERT INTO tb_cidades VALUES (1819, 'Matip�', 314090, 11, 17639, 66.07, 'matipoense', 266.99);
INSERT INTO tb_cidades VALUES (1822, 'Matutina', 314120, 11, 3761, 14.41, 'matutinense', 260.957);
INSERT INTO tb_cidades VALUES (1824, 'Medina', 314140, 11, 21026, 14.64, 'medinense', 1435.9);
INSERT INTO tb_cidades VALUES (1826, 'Merc�s', 314160, 11, 10368, 29.77, 'mercesano', 348.271);
INSERT INTO tb_cidades VALUES (1829, 'Minduri', 314190, 11, 3840, 17.47, 'mindurense', 219.774);
INSERT INTO tb_cidades VALUES (1831, 'Miradouro', 314210, 11, 10251, 33.98, 'miradourense', 301.672);
INSERT INTO tb_cidades VALUES (1833, 'Mirav�nia', 314225, 11, 4549, 7.55, 'miravaniense', 602.127);
INSERT INTO tb_cidades VALUES (1835, 'Moema', 314240, 11, 7028, 34.67, 'moemense', 202.705);
INSERT INTO tb_cidades VALUES (1837, 'Monsenhor Paulo', 314260, 11, 8161, 37.69, 'paulense', 216.54);
INSERT INTO tb_cidades VALUES (1840, 'Monte Azul', 314290, 11, 21994, 22.12, 'monte-azulense', 994.229);
INSERT INTO tb_cidades VALUES (1842, 'Monte Carmelo', 314310, 11, 45772, 34.08, 'carmelitano', 1343.035);
INSERT INTO tb_cidades VALUES (1844, 'Monte Santo De Minas', 314320, 11, 21234, 35.71, 'monte-santense', 594.632);
INSERT INTO tb_cidades VALUES (1847, 'Montezuma', 314345, 11, 7464, 6.6, 'montesumense', 1130.416);
INSERT INTO tb_cidades VALUES (1849, 'Morro Da Gar�a', 314360, 11, 2660, 6.41, 'morrense', 414.771);
INSERT INTO tb_cidades VALUES (1852, 'Muria�', 314390, 11, 100765, 119.72, 'muriaense', 841.692);
INSERT INTO tb_cidades VALUES (1854, 'Muzambinho', 314410, 11, 20430, 49.84, 'muzambinhense', 409.948);
INSERT INTO tb_cidades VALUES (1857, 'Naque', 314435, 11, 6341, 49.86, 'naquense', 127.173);
INSERT INTO tb_cidades VALUES (1859, 'Nat�rcia', 314440, 11, 4658, 24.68, 'naterciano', 188.719);
INSERT INTO tb_cidades VALUES (1861, 'Nepomuceno', 314460, 11, 25733, 44.17, 'nepomucenense', 582.553);
INSERT INTO tb_cidades VALUES (1863, 'Nova Bel�m', 314467, 11, 3732, 25.43, 'belenense', 146.774);
INSERT INTO tb_cidades VALUES (1866, 'Nova M�dica', 314490, 11, 3790, 10.08, 'neomodicano', 375.972);
INSERT INTO tb_cidades VALUES (1868, 'Nova Porteirinha', 314505, 11, 7398, 61.17, 'novaporteirinhense', 120.943);
INSERT INTO tb_cidades VALUES (1870, 'Nova Serrana', 314520, 11, 73699, 261, 'nova-serranense', 282.369);
INSERT INTO tb_cidades VALUES (1873, 'Novo Oriente De Minas', 314535, 11, 10339, 13.69, 'novo orientense', 755.149);
INSERT INTO tb_cidades VALUES (1875, 'Olaria', 314540, 11, 1976, 11.09, 'olariense', 178.242);
INSERT INTO tb_cidades VALUES (1877, 'Ol�mpio Noronha', 314550, 11, 2533, 46.36, 'ol�mpio-noroense', 54.633);
INSERT INTO tb_cidades VALUES (1880, 'On�a De Pitangui', 314580, 11, 3055, 12.37, 'oncense', 246.976);
INSERT INTO tb_cidades VALUES (1882, 'Oriz�nia', 314587, 11, 7284, 59.8, 'orizanense', 121.8);
INSERT INTO tb_cidades VALUES (1885, 'Ouro Preto', 314610, 11, 70281, 56.41, 'ouro-pretano', 1245.864);
INSERT INTO tb_cidades VALUES (1887, 'Padre Carvalho', 314625, 11, 5834, 13.07, 'padre carvaliense', 446.325);
INSERT INTO tb_cidades VALUES (1889, 'Pai Pedro', 314655, 11, 5934, 7.07, 'paipedrense', 839.804);
INSERT INTO tb_cidades VALUES (1892, 'Paiva', 314660, 11, 1558, 26.67, 'paivense', 58.419);
INSERT INTO tb_cidades VALUES (1894, 'Palm�polis', 314675, 11, 6931, 16, 'palmopolense', 433.153);
INSERT INTO tb_cidades VALUES (1896, 'Par� De Minas', 314710, 11, 84215, 152.77, 'paraense', 551.247);
INSERT INTO tb_cidades VALUES (1899, 'Parais�polis', 314730, 11, 19379, 58.5, 'paraisopolense', 331.238);
INSERT INTO tb_cidades VALUES (1901, 'Passa Quatro', 314760, 11, 15582, 56.21, 'passa-quatrense', 277.221);
INSERT INTO tb_cidades VALUES (1903, 'Passa Vinte', 314780, 11, 2079, 8.43, 'passa-vintense', 246.564);
INSERT INTO tb_cidades VALUES (1906, 'Patis', 314795, 11, 5579, 12.56, 'patiense', 444.196);
INSERT INTO tb_cidades VALUES (1907, 'Patos De Minas', 314800, 11, 138710, 43.49, 'patense', 3189.769);
INSERT INTO tb_cidades VALUES (1909, 'Patroc�nio Do Muria�', 314820, 11, 5287, 48.84, 'patrocinense', 108.245);
INSERT INTO tb_cidades VALUES (1911, 'Paulistas', 314840, 11, 4918, 22.3, 'paulistano', 220.564);
INSERT INTO tb_cidades VALUES (1914, 'Pedra Azul', 314870, 11, 23839, 14.94, 'pedra-azulense', 1595.129);
INSERT INTO tb_cidades VALUES (1916, 'Pedra Do Anta', 314880, 11, 3365, 20.59, 'antense', 163.445);
INSERT INTO tb_cidades VALUES (1918, 'Pedra Dourada', 314900, 11, 2191, 31.3, 'douradense', 69.99);
INSERT INTO tb_cidades VALUES (1921, 'Pedrin�polis', 314920, 11, 3490, 9.75, 'pedrinopolense', 357.891);
INSERT INTO tb_cidades VALUES (1923, 'Pedro Teixeira', 314940, 11, 1785, 15.8, 'pedro-teixeirense', 112.959);
INSERT INTO tb_cidades VALUES (1926, 'Perdig�o', 314970, 11, 8912, 35.77, 'perdiguense', 249.123);
INSERT INTO tb_cidades VALUES (1928, 'Perd�es', 314990, 11, 20087, 74.22, 'perdoense', 270.657);
INSERT INTO tb_cidades VALUES (1930, 'Pescador', 315000, 11, 4128, 13, 'pescadorense', 317.462);
INSERT INTO tb_cidades VALUES (1932, 'Piedade De Caratinga', 315015, 11, 7110, 65.02, 'piedade-caratinguense', 109.345);
INSERT INTO tb_cidades VALUES (1935, 'Piedade Dos Gerais', 315040, 11, 4640, 17.87, 'piedadense', 259.638);
INSERT INTO tb_cidades VALUES (1937, 'Pingo D`�gua', 315053, 11, 4420, 66.4, 'pingodaguense', 66.57);
INSERT INTO tb_cidades VALUES (1940, 'Pirajuba', 315070, 11, 4656, 13.78, 'pirajubense', 337.98);
INSERT INTO tb_cidades VALUES (1942, 'Pirangu�u', 315090, 11, 5217, 25.62, 'pirangu�uense', 203.619);
INSERT INTO tb_cidades VALUES (1945, 'Pirapora', 315120, 11, 53368, 97.12, 'piraporense', 549.514);
INSERT INTO tb_cidades VALUES (1947, 'Pitangui', 315140, 11, 25311, 44.44, 'pitanguense', 569.611);
INSERT INTO tb_cidades VALUES (1949, 'Planura', 315160, 11, 10384, 32.7, 'planurense', 317.52);
INSERT INTO tb_cidades VALUES (1951, 'Po�os De Caldas', 315180, 11, 152435, 278.54, 'po�os-caldense', 547.261);
INSERT INTO tb_cidades VALUES (1954, 'Ponte Nova', 315210, 11, 57390, 121.94, 'ponte-novense', 470.642);
INSERT INTO tb_cidades VALUES (1956, 'Ponto Dos Volantes', 315217, 11, 11345, 9.36, 'ponto volantense', 1212.411);
INSERT INTO tb_cidades VALUES (1959, 'Pot�', 315240, 11, 15667, 25.06, 'poteense', 625.11);
INSERT INTO tb_cidades VALUES (1961, 'Pouso Alto', 315260, 11, 6213, 23.74, 'pouso-altense', 261.688);
INSERT INTO tb_cidades VALUES (1963, 'Prata', 315280, 11, 25802, 5.32, 'pratense', 4847.544);
INSERT INTO tb_cidades VALUES (1965, 'Pratinha', 315300, 11, 3265, 5.25, 'pratinhense', 622.478);
INSERT INTO tb_cidades VALUES (1967, 'Presidente Juscelino', 315320, 11, 3908, 5.62, 'juscelinense', 695.882);
INSERT INTO tb_cidades VALUES (1970, 'Prudente De Morais', 315360, 11, 9573, 77.08, 'prudentino', 124.189);
INSERT INTO tb_cidades VALUES (1973, 'Raposos', 315390, 11, 15342, 212.58, 'raposense', 72.169);
INSERT INTO tb_cidades VALUES (1975, 'Recreio', 315410, 11, 10299, 43.96, 'recreiense', 234.296);
INSERT INTO tb_cidades VALUES (1977, 'Resende Costa', 315420, 11, 10913, 17.65, 'resende-costense', 618.311);
INSERT INTO tb_cidades VALUES (1980, 'Riachinho', 315445, 11, 8007, 4.5, 'riachiense', 1780.583);
INSERT INTO tb_cidades VALUES (1982, 'Ribeir�o Das Neves', 315460, 11, 296317, 1.917, 'nevense', 154.501);
INSERT INTO tb_cidades VALUES (1984, 'Rio Acima', 315480, 11, 9090, 39.55, 'rio-acimense', 229.812);
INSERT INTO tb_cidades VALUES (1987, 'Rio Doce', 315500, 11, 2465, 21.99, 'rio-docense', 112.094);
INSERT INTO tb_cidades VALUES (1989, 'Rio Manso', 315530, 11, 5276, 22.79, 'rio-mansense', 231.54);
INSERT INTO tb_cidades VALUES (1991, 'Rio Parana�ba', 315550, 11, 11885, 8.79, 'rio-paraibano', 1352.353);
INSERT INTO tb_cidades VALUES (1994, 'Rio Pomba', 315580, 11, 17110, 67.78, 'rio-pombense', 252.418);
INSERT INTO tb_cidades VALUES (1996, 'Rio Vermelho', 315600, 11, 13645, 13.83, 'rio-vermelhense', 986.56);
INSERT INTO tb_cidades VALUES (1998, 'Rochedo De Minas', 315620, 11, 2116, 26.65, 'rochedense', 79.402);
INSERT INTO tb_cidades VALUES (2001, 'Ros�rio Da Limeira', 315645, 11, 4247, 38.21, 'limeirense', 111.155);
INSERT INTO tb_cidades VALUES (2003, 'Rubim', 315660, 11, 9919, 10.28, 'rubinense', 965.172);
INSERT INTO tb_cidades VALUES (2005, 'Sabin�polis', 315680, 11, 15704, 17.07, 'sabinopolense', 919.81);
INSERT INTO tb_cidades VALUES (2008, 'Salto Da Divisa', 315710, 11, 6859, 7.31, 'saltense', 937.921);
INSERT INTO tb_cidades VALUES (2010, 'Santa B�rbara Do Leste', 315725, 11, 7682, 71.53, 'santa barbarense', 107.402);
INSERT INTO tb_cidades VALUES (2013, 'Santa Cruz De Minas', 315733, 11, 7865, 2.206, 'santacruzense', 3.565);
INSERT INTO tb_cidades VALUES (2015, 'Santa Cruz Do Escalvado', 315740, 11, 4992, 19.29, 'santa-cruzense', 258.726);
INSERT INTO tb_cidades VALUES (2018, 'Santa Helena De Minas', 315765, 11, 6055, 21.9, 'santaelenense de minas', 276.432);
INSERT INTO tb_cidades VALUES (2021, 'Santa Margarida', 315790, 11, 15011, 58.7, 'santa-margaridense', 255.73);
INSERT INTO tb_cidades VALUES (2023, 'Santa Maria Do Salto', 315810, 11, 5284, 11.99, 'santa-mariense', 440.604);
INSERT INTO tb_cidades VALUES (2025, 'Santa Rita De Caldas', 315920, 11, 9027, 17.95, 'santa-ritense', 503.012);
INSERT INTO tb_cidades VALUES (2028, 'Santa Rita De Minas', 315935, 11, 6547, 96.06, 'santa-ritense', 68.153);
INSERT INTO tb_cidades VALUES (2030, 'Santa Rita Do Sapuca�', 315960, 11, 37754, 106.96, 'santa-ritense ', 352.969);
INSERT INTO tb_cidades VALUES (2031, 'Santa Rosa Da Serra', 315970, 11, 3224, 11.34, 'rosalense', 284.334);
INSERT INTO tb_cidades VALUES (2032, 'Santa Vit�ria', 315980, 11, 18138, 6.04, 'santa-vitoriense', 3001.358);
INSERT INTO tb_cidades VALUES (2034, 'Santana De Cataguases', 315840, 11, 3622, 22.43, 'santanense', 161.486);
INSERT INTO tb_cidades VALUES (2037, 'Santana Do Garamb�u', 315870, 11, 2234, 11, 'santanense', 203.074);
INSERT INTO tb_cidades VALUES (2039, 'Santana Do Manhua�u', 315890, 11, 8582, 24.71, 'santanense', 347.362);
INSERT INTO tb_cidades VALUES (2042, 'Santana Dos Montes', 315910, 11, 3822, 19.44, 'santanense', 196.565);
INSERT INTO tb_cidades VALUES (2044, 'Santo Ant�nio Do Aventureiro', 316000, 11, 3538, 17.51, 'aventureirense', 202.033);
INSERT INTO tb_cidades VALUES (2047, 'Santo Ant�nio Do Jacinto', 316030, 11, 11775, 23.39, 'santo-antoniense', 503.375);
INSERT INTO tb_cidades VALUES (2049, 'Santo Ant�nio Do Retiro', 316045, 11, 6955, 8.73, 'retirense', 796.288);
INSERT INTO tb_cidades VALUES (2052, 'Santos Dumont', 316070, 11, 46284, 72.62, 'sandumonense', 637.373);
INSERT INTO tb_cidades VALUES (2054, 'S�o Br�s Do Sua�u�', 316090, 11, 3513, 31.93, 'sua�uiense', 110.018);
INSERT INTO tb_cidades VALUES (2057, 'S�o F�lix De Minas', 316105, 11, 3382, 20.8, 's�o felense', 162.56);
INSERT INTO tb_cidades VALUES (2059, 'S�o Francisco De Paula', 316120, 11, 6483, 20.46, 'francisco-paulense', 316.822);
INSERT INTO tb_cidades VALUES (2061, 'S�o Francisco Do Gl�ria', 316140, 11, 5178, 31.46, 's�o-franciscano-do-gl�ria', 164.613);
INSERT INTO tb_cidades VALUES (2064, 'S�o Geraldo Do Baixio', 316165, 11, 3486, 12.41, 'baixiense', 280.954);
INSERT INTO tb_cidades VALUES (2067, 'S�o Gon�alo Do Rio Abaixo', 316190, 11, 9777, 26.87, 's�o-gon�alense', 363.811);
INSERT INTO tb_cidades VALUES (2069, 'S�o Gon�alo Do Sapuca�', 316200, 11, 23906, 46.27, 's�o-gon�alense', 516.683);
INSERT INTO tb_cidades VALUES (2072, 'S�o Jo�o Da Lagoa', 316225, 11, 4656, 4.67, 'lagoano', 998.013);
INSERT INTO tb_cidades VALUES (2074, 'S�o Jo�o Da Ponte', 316240, 11, 25358, 13.7, 'pontense', 1851.099);
INSERT INTO tb_cidades VALUES (2077, 'S�o Jo�o Do Manhua�u', 316255, 11, 10245, 71.6, 'sanjoanense', 143.095);
INSERT INTO tb_cidades VALUES (2079, 'S�o Jo�o Do Oriente', 316260, 11, 7874, 65.55, 's�o-joanense', 120.122);
INSERT INTO tb_cidades VALUES (2082, 'S�o Jo�o Evangelista', 316280, 11, 15553, 32.53, 'evangelistano', 478.183);
INSERT INTO tb_cidades VALUES (2084, 'S�o Joaquim De Bicas', 316292, 11, 25537, 356.88, 'sanjoaquimbiquense', 71.557);
INSERT INTO tb_cidades VALUES (2087, 'S�o Jos� Da Safira', 316300, 11, 4075, 19.05, 'safirense', 213.88);
INSERT INTO tb_cidades VALUES (2089, 'S�o Jos� Do Alegre', 316320, 11, 3996, 45, 'alegrense', 88.794);
INSERT INTO tb_cidades VALUES (2092, 'S�o Jos� Do Jacuri', 316350, 11, 6553, 18.99, 'jacuriense', 345.145);
INSERT INTO tb_cidades VALUES (2094, 'S�o Louren�o', 316370, 11, 41657, 717.99, 's�o-lourenciano', 58.019);
INSERT INTO tb_cidades VALUES (2097, 'S�o Pedro Do Sua�u�', 316410, 11, 5570, 18.08, 's�o-pedrense ', 308.105);
INSERT INTO tb_cidades VALUES (2100, 'S�o Roque De Minas', 316430, 11, 6686, 3.19, 's�o-roquense', 2098.866);
INSERT INTO tb_cidades VALUES (2102, 'S�o Sebasti�o Da Vargem Alegre', 316443, 11, 2798, 38, 's�o sebasti�o vargem alegrense', 73.629);
INSERT INTO tb_cidades VALUES (2105, 'S�o Sebasti�o Do Oeste', 316460, 11, 5805, 14.22, 'sebastianense', 408.09);
INSERT INTO tb_cidades VALUES (2107, 'S�o Sebasti�o Do Rio Preto', 316480, 11, 1613, 12.6, 's�o-sebastianense', 128.002);
INSERT INTO tb_cidades VALUES (2111, 'S�o Tom�s De Aquino', 316510, 11, 7093, 25.52, 'aquinense', 277.928);
INSERT INTO tb_cidades VALUES (2113, 'Sapuca� Mirim', 316540, 11, 6241, 21.89, 'sapucaiense', 285.075);
INSERT INTO tb_cidades VALUES (2116, 'Sem Peixe', 316556, 11, 2847, 16.12, 'sempeixiano', 176.634);
INSERT INTO tb_cidades VALUES (2118, 'Senador Cortes', 316560, 11, 1988, 20.22, 'senador-cortense', 98.336);
INSERT INTO tb_cidades VALUES (2120, 'Senador Jos� Bento', 316580, 11, 1868, 19.9, 'senabentense', 93.892);
INSERT INTO tb_cidades VALUES (2123, 'Senhora Do Porto', 316610, 11, 3497, 9.17, 'portuense', 381.328);
INSERT INTO tb_cidades VALUES (2125, 'Sericita', 316630, 11, 7128, 42.94, 'sericitense', 166.012);
INSERT INTO tb_cidades VALUES (2128, 'Serra Da Saudade', 316660, 11, 815, 2.43, 'serrano-saudalense', 335.659);
INSERT INTO tb_cidades VALUES (2130, 'Serra Dos Aimor�s', 316670, 11, 8412, 39.39, 'serrense', 213.577);
INSERT INTO tb_cidades VALUES (2132, 'Serran�polis De Minas', 316695, 11, 4425, 8.02, 'serranopolitano de minas', 551.953);
INSERT INTO tb_cidades VALUES (2135, 'Sete Lagoas', 316720, 11, 214152, 398.32, 'sete-lagoano', 537.638);
INSERT INTO tb_cidades VALUES (2138, 'Silvian�polis', 316740, 11, 6027, 19.31, 'silvianopolense', 312.166);
INSERT INTO tb_cidades VALUES (2140, 'Simon�sia', 316760, 11, 18298, 37.61, 'simonense', 486.542);
INSERT INTO tb_cidades VALUES (2142, 'Soledade De Minas', 316780, 11, 5676, 28.83, 'soledadense', 196.866);
INSERT INTO tb_cidades VALUES (2145, 'Taparuba', 316805, 11, 3137, 16.25, 'taparubense', 193.081);
INSERT INTO tb_cidades VALUES (2146, 'Tapira', 316810, 11, 4112, 3.49, 'tapirense', 1179.248);
INSERT INTO tb_cidades VALUES (2148, 'Taquara�u De Minas', 316830, 11, 3794, 11.52, 'taquara�uense', 329.24);
INSERT INTO tb_cidades VALUES (2151, 'Te�filo Otoni', 316860, 11, 134745, 41.56, 'te�filo-otonense', 3242.263);
INSERT INTO tb_cidades VALUES (2153, 'Tiradentes', 316880, 11, 6961, 83.82, 'tiradentino', 83.047);
INSERT INTO tb_cidades VALUES (2156, 'Tocos Do Moji', 316905, 11, 3950, 34.44, 'tocos-mogiense', 114.705);
INSERT INTO tb_cidades VALUES (2158, 'Tombos', 316920, 11, 9537, 33.45, 'tomboense', 285.125);
INSERT INTO tb_cidades VALUES (2160, 'Tr�s Marias', 316935, 11, 28318, 10.57, 'trimariense', 2678.251);
INSERT INTO tb_cidades VALUES (2163, 'Tupaciguara', 316960, 11, 24188, 13.26, 'tupaciguarense', 1823.96);
INSERT INTO tb_cidades VALUES (2165, 'Turvol�ndia', 316980, 11, 4658, 21.08, 'turvolandense', 221);
INSERT INTO tb_cidades VALUES (2168, 'Ubaporanga', 317005, 11, 12040, 63.69, 'ubaporanguense', 189.045);
INSERT INTO tb_cidades VALUES (2170, 'Uberl�ndia', 317020, 11, 604013, 146.78, 'uberlandense', 4115.206);
INSERT INTO tb_cidades VALUES (2172, 'Una�', 317040, 11, 77565, 9.18, 'unaiense', 8447.098);
INSERT INTO tb_cidades VALUES (2175, 'Uruc�nia', 317050, 11, 10291, 74.15, 'urucaniense', 138.792);
INSERT INTO tb_cidades VALUES (2177, 'Vargem Alegre', 317057, 11, 6461, 55.38, 'vargealegrense', 116.664);
INSERT INTO tb_cidades VALUES (2179, 'Vargem Grande Do Rio Pardo', 317065, 11, 4733, 9.63, 'vargengrandense', 491.511);
INSERT INTO tb_cidades VALUES (2182, 'V�rzea Da Palma', 317080, 11, 35809, 16.13, 'v�rzea-palmense', 2220.276);
INSERT INTO tb_cidades VALUES (2185, 'Verdel�ndia', 317103, 11, 8346, 5.31, 'verdelandense', 1570.574);
INSERT INTO tb_cidades VALUES (2187, 'Ver�ssimo', 317110, 11, 3483, 3.38, 'verissimense', 1031.824);
INSERT INTO tb_cidades VALUES (2189, 'Vespasiano', 317120, 11, 104527, 1.468, 'vespasianense', 71.18);
INSERT INTO tb_cidades VALUES (2192, 'Virgem Da Lapa', 317160, 11, 13619, 15.67, 'virgem-lapense', 868.913);
INSERT INTO tb_cidades VALUES (2194, 'Virgin�polis', 317180, 11, 10572, 24.03, 'virginopolitano', 439.877);
INSERT INTO tb_cidades VALUES (2196, 'Visconde Do Rio Branco', 317200, 11, 37942, 155.91, 'rio-branquense', 243.351);
INSERT INTO tb_cidades VALUES (2199, '�gua Clara', 500020, 12, 14424, 1.31, '�gua-clarense', 11031.131);
INSERT INTO tb_cidades VALUES (2201, 'Amambai', 500060, 12, 34730, 8.26, 'amambaiense', 4202.335);
INSERT INTO tb_cidades VALUES (2204, 'Ang�lica', 500085, 12, 9185, 7.21, 'angeliquense', 1273.271);
INSERT INTO tb_cidades VALUES (2206, 'Aparecida Do Taboado', 500100, 12, 22320, 8.12, 'aparecidense ', 2750.153);
INSERT INTO tb_cidades VALUES (2208, 'Aral Moreira', 500124, 12, 10251, 6.19, 'aral-moreirense', 1655.665);
INSERT INTO tb_cidades VALUES (2211, 'Bataypor�', 500200, 12, 10936, 5.98, 'bataipor�ense', 1828.028);
INSERT INTO tb_cidades VALUES (2213, 'Bodoquena', 500215, 12, 7985, 3.18, 'bodoquenense', 2507.325);
INSERT INTO tb_cidades VALUES (2215, 'Brasil�ndia', 500230, 12, 11826, 2.04, 'brasilandense', 5806.911);
INSERT INTO tb_cidades VALUES (2218, 'Campo Grande', 500270, 12, 786797, 97.22, 'campo-grandense', 8092.966);
INSERT INTO tb_cidades VALUES (2220, 'Cassil�ndia', 500290, 12, 20966, 5.74, 'cassilandense', 3649.572);
INSERT INTO tb_cidades VALUES (2223, 'Coronel Sapucaia', 500315, 12, 14064, 13.72, 'sapucaense', 1025.052);
INSERT INTO tb_cidades VALUES (2225, 'Costa Rica', 500325, 12, 19695, 3.67, 'costa-riquense', 5371.805);
INSERT INTO tb_cidades VALUES (2228, 'Dois Irm�os Do Buriti', 500348, 12, 10363, 4.42, 'buritiense', 2344.598);
INSERT INTO tb_cidades VALUES (2230, 'Dourados', 500370, 12, 196035, 47.97, 'douradense', 4086.244);
INSERT INTO tb_cidades VALUES (2232, 'F�tima Do Sul', 500380, 12, 19035, 60.4, 'f�tima-sulense', 315.161);
INSERT INTO tb_cidades VALUES (2235, 'Guia Lopes Da Laguna', 500410, 12, 10366, 8.56, 'lagunense', 1210.609);
INSERT INTO tb_cidades VALUES (2238, 'Itapor�', 500450, 12, 20865, 15.79, 'itaporanense', 1321.817);
INSERT INTO tb_cidades VALUES (2240, 'Ivinhema', 500470, 12, 22341, 11.11, 'ivinhemense', 2010.172);
INSERT INTO tb_cidades VALUES (2242, 'Jaraguari', 500490, 12, 6341, 2.18, 'jaraguariense', 2912.826);
INSERT INTO tb_cidades VALUES (2244, 'Jate�', 500510, 12, 4011, 2.08, 'jateiense', 1927.951);
INSERT INTO tb_cidades VALUES (2247, 'Laguna Carap�', 500525, 12, 6491, 3.74, 'lagunense ', 1734.072);
INSERT INTO tb_cidades VALUES (2249, 'Miranda', 500560, 12, 25595, 4.67, 'mirandense', 5478.836);
INSERT INTO tb_cidades VALUES (2251, 'Navira�', 500570, 12, 46424, 14.54, 'naviraiense', 3193.549);
INSERT INTO tb_cidades VALUES (2253, 'Nova Alvorada Do Sul', 500600, 12, 16432, 4.09, 'novalvoradense', 4019.331);
INSERT INTO tb_cidades VALUES (2256, 'Parana�ba', 500630, 12, 40192, 7.44, 'paranaibano', 5402.656);
INSERT INTO tb_cidades VALUES (2258, 'Pedro Gomes', 500640, 12, 7967, 2.18, 'pedro-gomense', 3651.179);
INSERT INTO tb_cidades VALUES (2260, 'Porto Murtinho', 500690, 12, 15372, 0.87, 'murtinhense', 17744.452);
INSERT INTO tb_cidades VALUES (2263, 'Rio Negro', 500730, 12, 5036, 2.79, 'rio-negrense', 1807.67);
INSERT INTO tb_cidades VALUES (2265, 'Rochedo', 500750, 12, 4928, 3.16, 'rochedense', 1561.059);
INSERT INTO tb_cidades VALUES (2267, 'S�o Gabriel Do Oeste', 500769, 12, 22203, 5.75, 'gabrielense', 3864.696);
INSERT INTO tb_cidades VALUES (2270, 'Sidrol�ndia', 500790, 12, 42132, 7.97, 'sidrolandense', 5286.416);
INSERT INTO tb_cidades VALUES (2272, 'Tacuru', 500795, 12, 10215, 5.72, 'tacuruense', 1785.327);
INSERT INTO tb_cidades VALUES (2273, 'Taquarussu', 500797, 12, 3518, 3.38, 'taquarussuense', 1041.124);
INSERT INTO tb_cidades VALUES (2275, 'Tr�s Lagoas', 500830, 12, 101791, 9.97, 'tr�s-lagoense', 10207.046);
INSERT INTO tb_cidades VALUES (2277, 'Acorizal', 510010, 13, 5516, 6.56, 'acorizano', 840.591);
INSERT INTO tb_cidades VALUES (2279, 'Alta Floresta', 510025, 13, 49164, 5.34, 'alta-florestense', 9212.45);
INSERT INTO tb_cidades VALUES (2282, 'Alto Gar�as', 510040, 13, 10350, 2.76, 'alto-garcense', 3748.056);
INSERT INTO tb_cidades VALUES (2284, 'Alto Taquari', 510060, 13, 8072, 5.7, 'taquariense', 1416.528);
INSERT INTO tb_cidades VALUES (2287, 'Araguainha', 510120, 13, 1096, 1.59, 'araguainhense', 687.968);
INSERT INTO tb_cidades VALUES (2289, 'Aren�polis', 510130, 13, 10316, 24.77, 'arenapolitano', 416.448);
INSERT INTO tb_cidades VALUES (2291, 'Bar�o De Melga�o', 510160, 13, 7591, 0.67, 'melgaciano', 11377.273);
INSERT INTO tb_cidades VALUES (2293, 'Barra Do Gar�as', 510180, 13, 56560, 6.23, 'barra-garcense ', 9078.982);
INSERT INTO tb_cidades VALUES (2296, 'C�ceres', 510250, 13, 87942, 3.61, 'cacerense', 24351.446);
INSERT INTO tb_cidades VALUES (2298, 'Campo Novo Do Parecis', 510263, 13, 27577, 2.92, 'campo-novense', 9434.431);
INSERT INTO tb_cidades VALUES (2301, 'Canabrava Do Norte', 510269, 13, 4786, 1.39, 'canabravense', 3452.679);
INSERT INTO tb_cidades VALUES (2303, 'Carlinda', 510279, 13, 10990, 5.1, 'carlindense', 2156.748);
INSERT INTO tb_cidades VALUES (2305, 'Chapada Dos Guimar�es', 510300, 13, 17821, 2.98, 'chapadense', 5983.595);
INSERT INTO tb_cidades VALUES (2308, 'Col�der', 510320, 13, 30766, 9.94, 'colidense', 3093.643);
INSERT INTO tb_cidades VALUES (2311, 'Confresa', 510335, 13, 25124, 4.33, 'confresense', 5801.377);
INSERT INTO tb_cidades VALUES (2312, 'Conquista D`Oeste', 510336, 13, 3385, 1.27, 'conquistense d?oeste', 2672.211);
INSERT INTO tb_cidades VALUES (2315, 'Curvel�ndia', 510343, 13, 4866, 13.53, 'curvelandenses', 359.762);
INSERT INTO tb_cidades VALUES (2317, 'Diamantino', 510350, 13, 20341, 2.47, 'diamantinense', 8230.046);
INSERT INTO tb_cidades VALUES (2319, 'Feliz Natal', 510370, 13, 10933, 0.95, 'feliz-natalenses', 11462.366);
INSERT INTO tb_cidades VALUES (2322, 'General Carneiro', 510390, 13, 5027, 1.32, 'general-carneirense', 3794.939);
INSERT INTO tb_cidades VALUES (2324, 'Guarant� Do Norte', 510410, 13, 32216, 6.8, 'guarantanhense', 4735.331);
INSERT INTO tb_cidades VALUES (2326, 'Indiava�', 510450, 13, 2397, 3.97, 'indiavaiense', 603.295);
INSERT INTO tb_cidades VALUES (2329, 'Ita�ba', 510455, 13, 4575, 1.01, 'itaubense', 4528.431);
INSERT INTO tb_cidades VALUES (2331, 'Jaciara', 510480, 13, 25647, 15.51, 'jaciarense', 1653.542);
INSERT INTO tb_cidades VALUES (2333, 'Jauru', 510500, 13, 10455, 8.03, 'jauruense', 1302.113);
INSERT INTO tb_cidades VALUES (2336, 'Juruena', 510517, 13, 11201, 3.48, 'juruenense', 3222.65);
INSERT INTO tb_cidades VALUES (2338, 'Lambari D`Oeste', 510523, 13, 5431, 3.08, 'lambarienses', 1763.904);
INSERT INTO tb_cidades VALUES (2340, 'Luci�ra', 510530, 13, 2224, 0.52, 'luciarense', 4243.058);
INSERT INTO tb_cidades VALUES (2343, 'Mirassol D`Oeste', 510562, 13, 25299, 23.5, 'miradolense', 1076.36);
INSERT INTO tb_cidades VALUES (2345, 'Nortel�ndia', 510600, 13, 6436, 4.77, 'nortelandense', 1348.933);
INSERT INTO tb_cidades VALUES (2347, 'Nova Bandeirantes', 510615, 13, 11643, 1.21, 'nova bandeirantense', 9606.256);
INSERT INTO tb_cidades VALUES (2350, 'Nova Guarita', 510880, 13, 4932, 4.43, 'nova  guaritense', 1114.126);
INSERT INTO tb_cidades VALUES (2352, 'Nova Maril�ndia', 510885, 13, 2951, 1.52, 'nova marilandense', 1939.798);
INSERT INTO tb_cidades VALUES (2354, 'Nova Monte Verde', 510895, 13, 8093, 1.54, 'nova monte verdense', 5248.541);
INSERT INTO tb_cidades VALUES (2357, 'Nova Ol�mpia', 510623, 13, 17515, 11.3, 'nova-olimpiense', 1549.823);
INSERT INTO tb_cidades VALUES (2359, 'Nova Ubirat�', 510624, 13, 9218, 0.73, 'novo-ubirat�enses', 12706.164);
INSERT INTO tb_cidades VALUES (2361, 'Novo Horizonte Do Norte', 510627, 13, 3749, 4.26, 'novo-horizontino', 879.662);
INSERT INTO tb_cidades VALUES (2364, 'Novo S�o Joaquim', 510628, 13, 6042, 1.2, 's�o-joaquinense', 5035.15);
INSERT INTO tb_cidades VALUES (2366, 'Paranatinga', 510630, 13, 19290, 0.8, 'paranatinguense', 24166.136);
INSERT INTO tb_cidades VALUES (2368, 'Peixoto De Azevedo', 510642, 13, 30812, 2.16, 'peixotense', 14257.26);
INSERT INTO tb_cidades VALUES (2371, 'Pontal Do Araguaia', 510665, 13, 5395, 1.97, 'pontalense', 2738.631);
INSERT INTO tb_cidades VALUES (2373, 'Pontes E Lacerda', 510675, 13, 41408, 4.84, 'lacerdense', 8559.824);
INSERT INTO tb_cidades VALUES (2375, 'Porto Dos Ga�chos', 510680, 13, 5449, 0.78, 'porto-gauchense', 6993.81);
INSERT INTO tb_cidades VALUES (2378, 'Poxor�o', 510700, 13, 17599, 2.55, 'poxoreano ', 6910.101);
INSERT INTO tb_cidades VALUES (2380, 'Quer�ncia', 510706, 13, 13033, 0.73, 'querenciano', 17786.176);
INSERT INTO tb_cidades VALUES (2382, 'Ribeir�o Cascalheira', 510718, 13, 8881, 0.78, 'cascalheirense', 11354.803);
INSERT INTO tb_cidades VALUES (2385, 'Rondol�ndia', 510757, 13, 3604, 0.28, 'rondolandense', 12670.803);
INSERT INTO tb_cidades VALUES (2387, 'Ros�rio Oeste', 510770, 13, 17679, 2.31, 'rosariense', 7647.978);
INSERT INTO tb_cidades VALUES (2390, 'Santa Cruz Do Xingu', 510774, 13, 1900, 0.34, 'santa-cruzense-do-xingu', 5651.731);
INSERT INTO tb_cidades VALUES (2392, 'Santa Terezinha', 510777, 13, 7397, 1.14, 'santa-terezinhense', 6467.4);
INSERT INTO tb_cidades VALUES (2394, 'Santo Ant�nio Do Leste', 510779, 13, 3754, 1.04, 'santo-antoniense-do-leste', 3600.707);
INSERT INTO tb_cidades VALUES (2396, 'S�o F�lix Do Araguaia', 510785, 13, 10625, 0.64, 's�o-felixcense', 16711.854);
INSERT INTO tb_cidades VALUES (2397, 'S�o Jos� Do Povo', 510729, 13, 3592, 8.09, 's�ojoseenses-do-povo', 443.875);
INSERT INTO tb_cidades VALUES (2398, 'S�o Jos� Do Rio Claro', 510730, 13, 17124, 3.77, 'rio-clarense', 4536.203);
INSERT INTO tb_cidades VALUES (2400, 'S�o Jos� Dos Quatro Marcos', 510710, 13, 18998, 14.74, 'quatro-marquense', 1289.09);
INSERT INTO tb_cidades VALUES (2404, 'Sinop', 510790, 13, 113099, 28.69, 'sinopense', 3942.224);
INSERT INTO tb_cidades VALUES (2406, 'Tabapor�', 510794, 13, 9932, 1.19, 'tabapoaense', 8317.062);
INSERT INTO tb_cidades VALUES (2408, 'Tapurah', 510800, 13, 10392, 2.3, 'tapuraense', 4510.646);
INSERT INTO tb_cidades VALUES (2411, 'Torixor�u', 510820, 13, 4071, 1.7, 'torixorino', 2399.462);
INSERT INTO tb_cidades VALUES (2413, 'Vale De S�o Domingos', 510835, 13, 3052, 1.58, 'vale-dominguenses', 1932.816);
INSERT INTO tb_cidades VALUES (2416, 'Vila Bela Da Sant�ssima Trindade', 510550, 13, 14493, 1.08, 'vila-belense', 13420.99);
INSERT INTO tb_cidades VALUES (2418, 'Abaetetuba', 150010, 14, 141100, 87.61, 'abaetetubense', 1610.603);
INSERT INTO tb_cidades VALUES (2420, 'Acar�', 150020, 14, 53569, 12.33, 'acaraense', 4343.786);
INSERT INTO tb_cidades VALUES (2423, 'Alenquer', 150040, 14, 52626, 2.23, 'alenquerense', 23645.373);
INSERT INTO tb_cidades VALUES (2425, 'Altamira', 150060, 14, 99075, 0.62, 'altamirense', 159533.401);
INSERT INTO tb_cidades VALUES (2427, 'Ananindeua', 150080, 14, 471980, 2.477, 'ananindeuense', 190.502);
INSERT INTO tb_cidades VALUES (2429, 'Augusto Corr�a', 150090, 14, 40497, 37.1, 'augusto-correense', 1091.536);
INSERT INTO tb_cidades VALUES (2432, 'Bagre', 150110, 14, 23864, 5.43, 'bagrense', 4397.304);
INSERT INTO tb_cidades VALUES (2434, 'Bannach', 150125, 14, 3431, 1.16, 'bannaquense', 2956.641);
INSERT INTO tb_cidades VALUES (2437, 'Belterra', 150145, 14, 16318, 3.71, 'belterrense', 4398.407);
INSERT INTO tb_cidades VALUES (2439, 'Bom Jesus Do Tocantins', 150157, 14, 15298, 5.43, 'bom-jesuense', 2816.469);
INSERT INTO tb_cidades VALUES (2441, 'Bragan�a', 150170, 14, 113227, 54.13, 'bragantino', 2091.919);
INSERT INTO tb_cidades VALUES (2443, 'Brejo Grande Do Araguaia', 150175, 14, 7317, 5.68, 'brejo-grandense', 1288.473);
INSERT INTO tb_cidades VALUES (2446, 'Bujaru', 150190, 14, 25695, 25.56, 'bujaruense', 1005.163);
INSERT INTO tb_cidades VALUES (2448, 'Cachoeira Do Piri�', 150195, 14, 26484, 10.76, 'cachoeira-piriaense', 2461.961);
INSERT INTO tb_cidades VALUES (2451, 'Capanema', 150220, 14, 63639, 103.72, 'capanemense', 613.572);
INSERT INTO tb_cidades VALUES (2453, 'Castanhal', 150240, 14, 173149, 168.29, 'castanhalense', 1028.888);
INSERT INTO tb_cidades VALUES (2455, 'Colares', 150260, 14, 11381, 18.66, 'colarense', 609.789);
INSERT INTO tb_cidades VALUES (2458, 'Cumaru Do Norte', 150276, 14, 10466, 0.61, 'curaruense ', 17084.963);
INSERT INTO tb_cidades VALUES (2460, 'Curralinho', 150280, 14, 28549, 7.89, 'curralinense ', 3617.237);
INSERT INTO tb_cidades VALUES (2462, 'Curu��', 150290, 14, 34294, 50.98, 'curu�aense', 672.674);
INSERT INTO tb_cidades VALUES (2464, 'Eldorado Dos Caraj�s', 150295, 14, 31786, 10.75, 'eldoradense', 2956.727);
INSERT INTO tb_cidades VALUES (2467, 'Garraf�o Do Norte', 150307, 14, 25034, 15.66, 'garrafaense', 1599.021);
INSERT INTO tb_cidades VALUES (2470, 'Igarap� A�u', 150320, 14, 35887, 45.66, 'igarap�-a�uense', 785.978);
INSERT INTO tb_cidades VALUES (2472, 'Inhangapi', 150340, 14, 10037, 21.29, 'inhangapiense', 471.433);
INSERT INTO tb_cidades VALUES (2474, 'Irituia', 150350, 14, 31364, 22.74, 'irituense ', 1379.356);
INSERT INTO tb_cidades VALUES (2477, 'Jacareacanga', 150375, 14, 14103, 0.26, 'jacareacanguenses', 53303.017);
INSERT INTO tb_cidades VALUES (2479, 'Juruti', 150390, 14, 47086, 5.67, 'jurutiense', 8305.125);
INSERT INTO tb_cidades VALUES (2481, 'M�e Do Rio', 150405, 14, 27904, 59.43, 'm�e-riense', 469.489);
INSERT INTO tb_cidades VALUES (2483, 'Marab�', 150420, 14, 233669, 15.45, 'marabaense', 15128.368);
INSERT INTO tb_cidades VALUES (2486, 'Marituba', 150442, 14, 108246, 1.047, 'maritubense', 103.343);
INSERT INTO tb_cidades VALUES (2488, 'Melga�o', 150450, 14, 24808, 3.66, 'melgacense', 6773.969);
INSERT INTO tb_cidades VALUES (2490, 'Moju', 150470, 14, 70018, 7.7, 'mojuense', 9094.107);
INSERT INTO tb_cidades VALUES (2493, 'Nova Esperan�a Do Piri�', 150495, 14, 20158, 7.17, 'piriaense', 2809.61);
INSERT INTO tb_cidades VALUES (2495, 'Nova Timboteua', 150500, 14, 13670, 27.91, 'timboteuense', 489.85);
INSERT INTO tb_cidades VALUES (2497, 'Novo Repartimento', 150506, 14, 62050, 4.03, 'novo-repartimentense', 15398.678);
INSERT INTO tb_cidades VALUES (2500, 'Oriximin�', 150530, 14, 62794, 0.58, 'oriximinaense', 107603.221);
INSERT INTO tb_cidades VALUES (2502, 'Ouril�ndia Do Norte', 150543, 14, 27359, 1.91, 'ourilandense', 14339.402);
INSERT INTO tb_cidades VALUES (2505, 'Paragominas', 150550, 14, 97819, 5.06, 'paragominense', 19341.858);
INSERT INTO tb_cidades VALUES (2507, 'Pau D`Arco', 150555, 14, 6033, 3.61, 'paudarquense', 1671.415);
INSERT INTO tb_cidades VALUES (2510, 'Placas', 150565, 14, 23934, 3.34, 'plaquense', 7173.175);
INSERT INTO tb_cidades VALUES (2512, 'Portel', 150580, 14, 52172, 2.06, 'portelense', 25384.865);
INSERT INTO tb_cidades VALUES (2514, 'Prainha', 150600, 14, 29349, 1.98, 'prainhense', 14786.673);
INSERT INTO tb_cidades VALUES (2516, 'Quatipuru', 150611, 14, 12411, 38.28, 'quatipuruense', 324.253);
INSERT INTO tb_cidades VALUES (2519, 'Rondon Do Par�', 150618, 14, 46964, 5.7, 'rondonense', 8246.426);
INSERT INTO tb_cidades VALUES (2521, 'Salin�polis', 150620, 14, 37421, 157.57, 'salinopolitano ', 237.487);
INSERT INTO tb_cidades VALUES (2523, 'Santa B�rbara Do Par�', 150635, 14, 17141, 61.62, 'santa-barbarense', 278.154);
INSERT INTO tb_cidades VALUES (2524, 'Santa Cruz Do Arari', 150640, 14, 8155, 7.58, 'arariense', 1075.151);
INSERT INTO tb_cidades VALUES (2525, 'Santa Isabel Do Par�', 150650, 14, 59466, 82.86, 'isabelense', 717.658);
INSERT INTO tb_cidades VALUES (2528, 'Santa Maria Do Par�', 150660, 14, 23026, 50.31, 'santa-marianense', 457.723);
INSERT INTO tb_cidades VALUES (2531, 'Santar�m Novo', 150690, 14, 6141, 26.76, 'santareno', 229.509);
INSERT INTO tb_cidades VALUES (2533, 'S�o Caetano De Odivelas', 150710, 14, 16891, 22.72, 'odivelense', 743.454);
INSERT INTO tb_cidades VALUES (2535, 'S�o Domingos Do Capim', 150720, 14, 29846, 17.79, 'capinense', 1677.252);
INSERT INTO tb_cidades VALUES (2538, 'S�o Geraldo Do Araguaia', 150745, 14, 25587, 8.08, 's�o-geraldense', 3168.37);
INSERT INTO tb_cidades VALUES (2540, 'S�o Jo�o De Pirabas', 150747, 14, 20647, 29.25, 'pirabense', 705.788);
INSERT INTO tb_cidades VALUES (2543, 'S�o Sebasti�o Da Boa Vista', 150770, 14, 22904, 14.03, 'boa-vistense', 1632.244);
INSERT INTO tb_cidades VALUES (2546, 'Soure', 150790, 14, 23001, 6.54, 'sourense', 3517.302);
INSERT INTO tb_cidades VALUES (2548, 'Terra Alta', 150796, 14, 10262, 49.72, 'terraltense', 206.413);
INSERT INTO tb_cidades VALUES (2551, 'Tracuateua', 150803, 14, 27455, 29.33, 'tracuateuense', 936.125);
INSERT INTO tb_cidades VALUES (2553, 'Tucum�', 150808, 14, 33690, 13.41, 'tucumaense', 2512.587);
INSERT INTO tb_cidades VALUES (2555, 'Ulian�polis', 150812, 14, 43341, 8.52, 'ulianopolense', 5088.447);
INSERT INTO tb_cidades VALUES (2558, 'Viseu', 150830, 14, 56716, 11.54, 'visinense ', 4915.048);
INSERT INTO tb_cidades VALUES (2560, 'Xinguara', 150840, 14, 40573, 10.74, 'xinguarense', 3779.348);
INSERT INTO tb_cidades VALUES (2562, 'Aguiar', 250020, 15, 5530, 16.04, 'aguiarense', 344.706);
INSERT INTO tb_cidades VALUES (2564, 'Alagoa Nova', 250040, 15, 19681, 160.98, 'alagoa-novense', 122.255);
INSERT INTO tb_cidades VALUES (2566, 'Alcantil', 250053, 15, 5239, 17.16, 'alcantilense ', 305.392);
INSERT INTO tb_cidades VALUES (2569, 'Amparo', 250073, 15, 2088, 17.12, 'amparense', 121.984);
INSERT INTO tb_cidades VALUES (2571, 'Ara�agi', 250080, 15, 17224, 74.51, 'ara�agiense ', 231.154);
INSERT INTO tb_cidades VALUES (2573, 'Araruna', 250100, 15, 18879, 76.83, 'ararunense', 245.722);
INSERT INTO tb_cidades VALUES (2575, 'Areia De Bara�nas', 250115, 15, 1927, 20, 'baraunense', 96.343);
INSERT INTO tb_cidades VALUES (2578, 'Assun��o', 250135, 15, 3522, 27.86, 'assun��oense', 126.427);
INSERT INTO tb_cidades VALUES (2580, 'Bananeiras', 250150, 15, 21851, 84.72, 'bananeirense', 257.93);
INSERT INTO tb_cidades VALUES (2582, 'Barra De Santa Rosa', 250160, 15, 14157, 18.25, 'santa rosense', 775.654);
INSERT INTO tb_cidades VALUES (2585, 'Bayeux', 250180, 15, 99716, 3.118, 'baienense', 31.973);
INSERT INTO tb_cidades VALUES (2587, 'Bel�m Do Brejo Do Cruz', 250200, 15, 7143, 11.84, 'belenense do brejo do cruz ', 603.04);
INSERT INTO tb_cidades VALUES (2590, 'Boa Vista', 250215, 15, 6227, 13.07, 'boavistense', 476.538);
INSERT INTO tb_cidades VALUES (2592, 'Bom Sucesso', 250230, 15, 5035, 27.35, 'bom-sucessense', 184.101);
INSERT INTO tb_cidades VALUES (2594, 'Boqueir�o', 250250, 15, 16888, 45.4, 'boqueir�oense', 371.982);
INSERT INTO tb_cidades VALUES (2597, 'Brejo Dos Santos', 250290, 15, 6198, 66.05, 'brejo-santense', 93.845);
INSERT INTO tb_cidades VALUES (2599, 'Cabaceiras', 250310, 15, 5035, 11.12, 'cabaceirense', 452.92);
INSERT INTO tb_cidades VALUES (2601, 'Cachoeira Dos �ndios', 250330, 15, 9546, 49.44, 'cachoeirense (dos �ndios)', 193.067);
INSERT INTO tb_cidades VALUES (2604, 'Cacimbas', 250355, 15, 6814, 53.85, 'cacimbense', 126.542);
INSERT INTO tb_cidades VALUES (2606, 'Cajazeiras', 250370, 15, 58446, 103.28, 'cajazeirense', 565.896);
INSERT INTO tb_cidades VALUES (2608, 'Caldas Brand�o', 250380, 15, 5637, 100.92, 'caldas-brandense', 55.854);
INSERT INTO tb_cidades VALUES (2611, 'Capim', 250403, 15, 5601, 71.66, 'capiense', 78.166);
INSERT INTO tb_cidades VALUES (2613, 'Carrapateira', 250410, 15, 2378, 43.61, 'carrapateirense', 54.523);
INSERT INTO tb_cidades VALUES (2615, 'Catingueira', 250420, 15, 4812, 9.09, 'catingueirense', 529.451);
INSERT INTO tb_cidades VALUES (2618, 'Concei��o', 250440, 15, 18363, 31.69, 'concei��oense', 579.432);
INSERT INTO tb_cidades VALUES (2620, 'Conde', 250460, 15, 21400, 123.74, 'condense', 172.949);
INSERT INTO tb_cidades VALUES (2622, 'Coremas', 250480, 15, 15149, 39.92, 'coremense', 379.491);
INSERT INTO tb_cidades VALUES (2624, 'Cruz Do Esp�rito Santo', 250490, 15, 16257, 83.12, 'Santo esp�rito-santense ', 195.595);
INSERT INTO tb_cidades VALUES (2627, 'Cuit� De Mamanguape', 250523, 15, 6202, 57.19, 'cuiteense', 108.448);
INSERT INTO tb_cidades VALUES (2629, 'Curral De Cima', 250527, 15, 5209, 61.21, 'curralense de cima', 85.096);
INSERT INTO tb_cidades VALUES (2632, 'Desterro', 250540, 15, 7991, 44.55, 'desterrense', 179.386);
INSERT INTO tb_cidades VALUES (2635, 'Duas Estradas', 250580, 15, 3638, 138.53, 'duas-estradense', 26.261);
INSERT INTO tb_cidades VALUES (2637, 'Esperan�a', 250600, 15, 31095, 189.86, 'esperancense', 163.78);
INSERT INTO tb_cidades VALUES (2639, 'Frei Martinho', 250620, 15, 2933, 12, 'frei-martinhense', 244.316);
INSERT INTO tb_cidades VALUES (2642, 'Gurinh�m', 250640, 15, 13872, 40.08, 'gurinheense ', 346.065);
INSERT INTO tb_cidades VALUES (2644, 'Ibiara', 250660, 15, 6031, 24.67, 'ibiarense', 244.484);
INSERT INTO tb_cidades VALUES (2646, 'Imaculada', 250670, 15, 11352, 35.81, 'imaculadense', 316.982);
INSERT INTO tb_cidades VALUES (2649, 'Itaporanga', 250700, 15, 23192, 49.55, 'itaporanguense', 468.057);
INSERT INTO tb_cidades VALUES (2650, 'Itapororoca', 250710, 15, 16997, 116.37, 'itapororoquense', 146.066);
INSERT INTO tb_cidades VALUES (2651, 'Itatuba', 250720, 15, 10201, 41.77, 'itatubense', 244.221);
INSERT INTO tb_cidades VALUES (2653, 'Jeric�', 250740, 15, 7538, 42.04, 'jericoense', 179.31);
INSERT INTO tb_cidades VALUES (2655, 'Joca Claudino', 251365, 15, 2615, 35.33, 'Joca-Claudinense', 74.006);
INSERT INTO tb_cidades VALUES (2658, 'Junco Do Serid�', 250780, 15, 6643, 38.98, 'juncoense', 170.419);
INSERT INTO tb_cidades VALUES (2661, 'Lagoa', 250810, 15, 4681, 26.31, 'lagoense', 177.901);
INSERT INTO tb_cidades VALUES (2663, 'Lagoa Seca', 250830, 15, 25900, 240.73, 'lagoa-sequense', 107.589);
INSERT INTO tb_cidades VALUES (2665, 'Livramento', 250850, 15, 7164, 27.53, 'livramentense', 260.219);
INSERT INTO tb_cidades VALUES (2667, 'Lucena', 250860, 15, 11730, 131.88, 'lucenense', 88.943);
INSERT INTO tb_cidades VALUES (2670, 'Mamanguape', 250890, 15, 42303, 124.23, 'mamanguapense', 340.531);
INSERT INTO tb_cidades VALUES (2672, 'Marca��o', 250905, 15, 7609, 61.91, 'marca��oense', 122.895);
INSERT INTO tb_cidades VALUES (2674, 'Mariz�polis', 250915, 15, 6173, 97.04, 'marizopolense', 63.61);
INSERT INTO tb_cidades VALUES (2677, 'Matinhas', 250933, 15, 4321, 113.34, 'matinhense', 38.123);
INSERT INTO tb_cidades VALUES (2679, 'Matur�ia', 250939, 15, 5939, 70.97, 'matureense', 83.687);
INSERT INTO tb_cidades VALUES (2681, 'Montadas', 250950, 15, 4990, 157.98, 'montadense', 31.587);
INSERT INTO tb_cidades VALUES (2684, 'Mulungu', 250980, 15, 9469, 48.48, 'mulunguense', 195.313);
INSERT INTO tb_cidades VALUES (2686, 'Nazarezinho', 251000, 15, 7280, 38.02, 'nazarezinhense', 191.486);
INSERT INTO tb_cidades VALUES (2688, 'Nova Olinda', 251020, 15, 6070, 72.04, 'nova-olindense', 84.253);
INSERT INTO tb_cidades VALUES (2690, 'Olho D`�gua', 251040, 15, 6931, 11.63, 'olho-daguense', 596.126);
INSERT INTO tb_cidades VALUES (2692, 'Ouro Velho', 251060, 15, 2928, 22.63, 'ouro-velhense', 129.399);
INSERT INTO tb_cidades VALUES (2695, 'Patos', 251080, 15, 100674, 212.82, 'patense', 473.054);
INSERT INTO tb_cidades VALUES (2697, 'Pedra Branca', 251100, 15, 3721, 32.95, 'pedra-branquense', 112.932);
INSERT INTO tb_cidades VALUES (2699, 'Pedras De Fogo', 251120, 15, 27032, 67.51, 'pedras-foguense', 400.388);
INSERT INTO tb_cidades VALUES (2702, 'Picu�', 251140, 15, 18222, 27.54, 'picu�ense', 661.654);
INSERT INTO tb_cidades VALUES (2704, 'Pil�es', 251160, 15, 6978, 108.28, 'piloense ', 64.446);
INSERT INTO tb_cidades VALUES (2706, 'Pirpirituba', 251180, 15, 10326, 129.33, 'pirpiritubense', 79.844);
INSERT INTO tb_cidades VALUES (2709, 'Po�o Dantas', 251203, 15, 3751, 38.57, 'po�odantense', 97.249);
INSERT INTO tb_cidades VALUES (2711, 'Pombal', 251210, 15, 32110, 36.13, 'pombalense', 888.802);
INSERT INTO tb_cidades VALUES (2738, 'S�o Domingos', 251396, 15, 2855, 16.88, 's�odominguense', 169.104);
INSERT INTO tb_cidades VALUES (2741, 'S�o Jo�o Do Cariri', 251400, 15, 4344, 6.65, 'caririense ', 653.598);
INSERT INTO tb_cidades VALUES (2744, 'S�o Jos� Da Lagoa Tapada', 251420, 15, 7564, 22.13, 's�o-joseense', 341.804);
INSERT INTO tb_cidades VALUES (2746, 'S�o Jos� De Espinharas', 251440, 15, 4760, 6.56, 'espinharense', 725.652);
INSERT INTO tb_cidades VALUES (2749, 'S�o Jos� Do Bonfim', 251460, 15, 3233, 24, 'bonfinense', 134.723);
INSERT INTO tb_cidades VALUES (2752, 'S�o Jos� Dos Cordeiros', 251480, 15, 3985, 9.54, 's�o-joseense (dos Cordeiros)', 417.743);
INSERT INTO tb_cidades VALUES (2755, 'S�o Miguel De Taipu', 251500, 15, 6696, 72.37, 'taipuense', 92.526);
INSERT INTO tb_cidades VALUES (2757, 'S�o Sebasti�o Do Umbuzeiro', 251520, 15, 3235, 7.02, 's�o-sebastianense', 460.571);
INSERT INTO tb_cidades VALUES (2760, 'Serra Branca', 251550, 15, 12973, 18.89, 'serra-branquense', 686.911);
INSERT INTO tb_cidades VALUES (2763, 'Serra Redonda', 251580, 15, 7050, 126.11, 'serra-redondense', 55.905);
INSERT INTO tb_cidades VALUES (2765, 'Sert�ozinho', 251593, 15, 4395, 134, 'sert�ozienhense', 32.798);
INSERT INTO tb_cidades VALUES (2768, 'Soledade', 251610, 15, 13739, 24.53, 'soledadense', 560.039);
INSERT INTO tb_cidades VALUES (2770, 'Sousa', 251620, 15, 65803, 89.1, 'sousense', 738.543);
INSERT INTO tb_cidades VALUES (2772, 'Tacima', 251640, 15, 10262, 41.6, 'tacimense', 246.657);
INSERT INTO tb_cidades VALUES (2775, 'Teixeira', 251670, 15, 14153, 87.96, 'teixeirense', 160.899);
INSERT INTO tb_cidades VALUES (2776, 'Ten�rio', 251675, 15, 2813, 26.72, 'tenorense', 105.27);
INSERT INTO tb_cidades VALUES (2778, 'Uira�na', 251690, 15, 14584, 49.52, 'uiraunense', 294.497);
INSERT INTO tb_cidades VALUES (2781, 'Vieir�polis', 251720, 15, 5045, 34.37, 'vieiropolense', 146.778);
INSERT INTO tb_cidades VALUES (2783, 'Zabel�', 251740, 15, 2075, 18.97, 'zabeleense', 109.394);
INSERT INTO tb_cidades VALUES (2785, 'Afogados Da Ingazeira', 260010, 16, 35088, 92.9, 'afogadense', 377.694);
INSERT INTO tb_cidades VALUES (2788, '�gua Preta', 260040, 16, 33095, 62.05, '�gua-pretense', 533.328);
INSERT INTO tb_cidades VALUES (2790, 'Alagoinha', 260060, 16, 13759, 63.16, 'alagoinhense', 217.827);
INSERT INTO tb_cidades VALUES (2792, 'Altinho', 260080, 16, 22353, 49.18, 'altinense', 454.482);
INSERT INTO tb_cidades VALUES (2795, 'Ara�oiaba', 260105, 16, 18156, 196.74, 'ara�oiabense', 92.282);
INSERT INTO tb_cidades VALUES (2797, 'Arcoverde', 260120, 16, 68793, 196.05, 'arcoverdense', 350.899);
INSERT INTO tb_cidades VALUES (2799, 'Barreiros', 260140, 16, 40732, 174.54, 'barreirense', 233.372);
INSERT INTO tb_cidades VALUES (2801, 'Bel�m De S�o Francisco', 260160, 16, 20253, 11.06, 'belenense', 1830.793);
INSERT INTO tb_cidades VALUES (2804, 'Bezerros', 260190, 16, 58668, 119.53, 'bezerrense', 490.815);
INSERT INTO tb_cidades VALUES (2806, 'Bom Conselho', 260210, 16, 45503, 57.44, 'conselhense', 792.182);
INSERT INTO tb_cidades VALUES (2809, 'Brej�o', 260240, 16, 8844, 55.35, 'brejonense', 159.786);
INSERT INTO tb_cidades VALUES (2811, 'Brejo Da Madre De Deus', 260260, 16, 45180, 59.26, 'brejense', 762.377);
INSERT INTO tb_cidades VALUES (2814, 'Cabo De Santo Agostinho', 260290, 16, 185025, 414.32, 'cabense', 446.578);
INSERT INTO tb_cidades VALUES (2816, 'Cachoeirinha', 260310, 16, 18819, 104.98, 'cachoeirinhense', 179.261);
INSERT INTO tb_cidades VALUES (2819, 'Calumbi', 260340, 16, 5648, 31.5, 'calumbiense', 179.314);
INSERT INTO tb_cidades VALUES (2821, 'Camocim De S�o F�lix', 260350, 16, 17104, 236, 'camocinense ', 72.476);
INSERT INTO tb_cidades VALUES (2824, 'Capoeiras', 260380, 16, 19593, 58.26, 'capoeirense', 336.311);
INSERT INTO tb_cidades VALUES (2826, 'Carnaubeira Da Penha', 260392, 16, 11782, 11.73, 'carnaubeirense', 1004.662);
INSERT INTO tb_cidades VALUES (2829, 'Casinhas', 260415, 16, 13766, 118.81, 'casinhense', 115.867);
INSERT INTO tb_cidades VALUES (2831, 'Cedro', 260430, 16, 10778, 62.79, 'cedrense', 171.64);
INSERT INTO tb_cidades VALUES (2833, 'Ch� Grande', 260450, 16, 20137, 237.33, 'ch�-grandense', 84.848);
INSERT INTO tb_cidades VALUES (2835, 'Correntes', 260470, 16, 17419, 53, 'correntense ', 328.653);
INSERT INTO tb_cidades VALUES (2838, 'Cupira', 260500, 16, 23390, 221.58, 'cupirense ', 105.559);
INSERT INTO tb_cidades VALUES (2840, 'Dormentes', 260515, 16, 16917, 11, 'dormentense', 1537.636);
INSERT INTO tb_cidades VALUES (2842, 'Exu', 260530, 16, 31636, 23.65, 'exuense ', 1337.489);
INSERT INTO tb_cidades VALUES (2844, 'Fernando De Noronha', 260545, 16, 2630, 154.55, 'noronhense', 17.017);
INSERT INTO tb_cidades VALUES (2847, 'Floresta', 260570, 16, 29285, 8.04, 'florestano', 3644.15);
INSERT INTO tb_cidades VALUES (2849, 'Gameleira', 260590, 16, 27912, 109.05, 'gameleirense', 255.96);
INSERT INTO tb_cidades VALUES (2851, 'Gl�ria Do Goit�', 260610, 16, 29019, 125.17, 'gloriense', 231.831);
INSERT INTO tb_cidades VALUES (2854, 'Gravat�', 260640, 16, 76458, 151.36, 'gravataense', 505.137);
INSERT INTO tb_cidades VALUES (2856, 'Ibimirim', 260660, 16, 26954, 13.79, 'ibimiriense', 1954.705);
INSERT INTO tb_cidades VALUES (2858, 'Igarassu', 260680, 16, 102021, 333.88, 'igarassuano ', 305.559);
INSERT INTO tb_cidades VALUES (2860, 'Ilha De Itamarac�', 260760, 16, 21884, 328.18, 'itamaracaense', 66.683);
INSERT INTO tb_cidades VALUES (2874, 'Jatob�', 260805, 16, 13963, 50.25, 'jatobaense', 277.861);
INSERT INTO tb_cidades VALUES (2876, 'Joaquim Nabuco', 260820, 16, 15773, 129.39, 'nabuquense', 121.901);
INSERT INTO tb_cidades VALUES (2879, 'Jurema', 260840, 16, 14541, 98.08, 'juremense ', 148.253);
INSERT INTO tb_cidades VALUES (2881, 'Lagoa Do Itaenga', 260850, 16, 20659, 360.65, 'itaenguense', 57.282);
INSERT INTO tb_cidades VALUES (2883, 'Lagoa Dos Gatos', 260870, 16, 15615, 70.06, 'lagoense ', 222.869);
INSERT INTO tb_cidades VALUES (2886, 'Limoeiro', 260890, 16, 55439, 202.53, 'limoeirense', 273.737);
INSERT INTO tb_cidades VALUES (2888, 'Machados', 260910, 16, 13596, 226.46, 'machadense', 60.036);
INSERT INTO tb_cidades VALUES (2890, 'Maraial', 260920, 16, 12230, 61.19, 'maraialense', 199.864);
INSERT INTO tb_cidades VALUES (2892, 'Moreil�ndia', 261430, 16, 11132, 27.52, 'moreirense', 404.57);
INSERT INTO tb_cidades VALUES (2895, 'Olinda', 260960, 16, 377779, 9.068, 'olindense', 41.659);
INSERT INTO tb_cidades VALUES (2897, 'Oroc�', 260980, 16, 13180, 23.76, 'orocoense', 554.757);
INSERT INTO tb_cidades VALUES (2900, 'Palmeirina', 261010, 16, 8189, 51.82, 'palmeirinense', 158.02);
INSERT INTO tb_cidades VALUES (2902, 'Paranatama', 261030, 16, 11001, 47.65, 'paranatamense', 230.887);
INSERT INTO tb_cidades VALUES (2904, 'Passira', 261050, 16, 28628, 87.61, 'passirense', 326.756);
INSERT INTO tb_cidades VALUES (2906, 'Paulista', 261070, 16, 300466, 3.086, 'paulistano', 97.364);
INSERT INTO tb_cidades VALUES (2907, 'Pedra', 261080, 16, 20944, 26.08, 'pedrense', 803.065);
INSERT INTO tb_cidades VALUES (2910, 'Petrolina', 261110, 16, 293962, 64.49, 'petrolinense', 4558.398);
INSERT INTO tb_cidades VALUES (2912, 'Pombos', 261130, 16, 24046, 117.84, 'pomboense', 204.052);
INSERT INTO tb_cidades VALUES (2914, 'Quipap�', 261150, 16, 24186, 104.88, 'quipapaense ', 230.616);
INSERT INTO tb_cidades VALUES (2917, 'Riacho Das Almas', 261170, 16, 19162, 61.03, 'riachense', 314.001);
INSERT INTO tb_cidades VALUES (2919, 'Rio Formoso', 261190, 16, 22151, 97.39, 'rio-formosense', 227.457);
INSERT INTO tb_cidades VALUES (2921, 'Salgadinho', 261210, 16, 9312, 104.84, 'salgadinense', 88.817);
INSERT INTO tb_cidades VALUES (2924, 'Sanhar�', 261240, 16, 21955, 81.71, 'sanharoense ', 268.685);
INSERT INTO tb_cidades VALUES (2926, 'Santa Cruz Da Baixa Verde', 261247, 16, 11768, 102.39, 'santacruzense', 114.931);
INSERT INTO tb_cidades VALUES (2928, 'Santa Filomena', 261255, 16, 13371, 13.3, 'filomense', 1005.04);
INSERT INTO tb_cidades VALUES (2931, 'Santa Terezinha', 261280, 16, 10991, 56.2, 'santa-terezinhense', 195.585);
INSERT INTO tb_cidades VALUES (2933, 'S�o Bento Do Una', 261300, 16, 53242, 74.03, 's�o-bentense', 719.16);
INSERT INTO tb_cidades VALUES (2936, 'S�o Joaquim Do Monte', 261330, 16, 20488, 88.39, 's�o-joaquinense', 231.803);
INSERT INTO tb_cidades VALUES (2938, 'S�o Jos� Do Belmonte', 261350, 16, 32617, 22.13, 'belmontense', 1474.078);
INSERT INTO tb_cidades VALUES (2940, 'S�o Louren�o Da Mata', 261370, 16, 102895, 392.49, 's�o-lourensense', 262.157);
INSERT INTO tb_cidades VALUES (2943, 'Serrita', 261400, 16, 18331, 12.1, 'serritense', 1514.37);
INSERT INTO tb_cidades VALUES (2945, 'Sirinha�m', 261420, 16, 40296, 109.18, 'sirinhaense ', 369.069);
INSERT INTO tb_cidades VALUES (2948, 'Tabira', 261460, 16, 26427, 68.11, 'tabirense', 388.003);
INSERT INTO tb_cidades VALUES (2950, 'Tacaratu', 261480, 16, 22068, 17.45, 'tacaratuense ', 1264.525);
INSERT INTO tb_cidades VALUES (2952, 'Taquaritinga Do Norte', 261500, 16, 24903, 52.41, 'taquaritinguense ', 475.181);
INSERT INTO tb_cidades VALUES (2955, 'Timba�ba', 261530, 16, 53825, 184.16, 'timbaubense', 292.28);
INSERT INTO tb_cidades VALUES (2957, 'Tracunha�m', 261550, 16, 13055, 110.27, 'tracunhaense', 118.388);
INSERT INTO tb_cidades VALUES (2959, 'Triunfo', 261570, 16, 15006, 78.35, 'triunfense', 191.517);
INSERT INTO tb_cidades VALUES (2962, 'Venturosa', 261600, 16, 16052, 50.05, 'venturosense', 320.73);
INSERT INTO tb_cidades VALUES (2964, 'Vertente Do L�rio', 261618, 16, 7873, 106.93, 'vertentense do l�rio', 73.63);
INSERT INTO tb_cidades VALUES (2966, 'Vic�ncia', 261630, 16, 30732, 134.78, 'vicenciense', 228.016);
INSERT INTO tb_cidades VALUES (2969, 'Acau�', 220005, 17, 6749, 5.27, 'acau�nense', 1279.58);
INSERT INTO tb_cidades VALUES (2971, '�gua Branca', 220020, 17, 16451, 169.53, '�gua-branquense', 97.04);
INSERT INTO tb_cidades VALUES (2973, 'Alegrete Do Piau�', 220027, 17, 5153, 18.23, 'alegretense', 282.709);
INSERT INTO tb_cidades VALUES (2976, 'Alvorada Do Gurgu�ia', 220045, 17, 5050, 2.37, 'alvoradense', 2131.951);
INSERT INTO tb_cidades VALUES (2978, 'Angical Do Piau�', 220060, 17, 6672, 29.86, 'angicalense', 223.434);
INSERT INTO tb_cidades VALUES (2980, 'Ant�nio Almeida', 220080, 17, 3039, 4.71, 'ant�nio-almeidense', 645.742);
INSERT INTO tb_cidades VALUES (2983, 'Arraial', 220100, 17, 4688, 6.87, 'arraialense', 682.757);
INSERT INTO tb_cidades VALUES (2986, 'Baixa Grande Do Ribeiro', 220115, 17, 10516, 1.35, 'baixagrandense do ribeiro', 7808.878);
INSERT INTO tb_cidades VALUES (2988, 'Barras', 220120, 17, 44850, 26.08, 'barrense', 1719.789);
INSERT INTO tb_cidades VALUES (2990, 'Barro Duro', 220140, 17, 6607, 50.39, 'barro-durense', 131.119);
INSERT INTO tb_cidades VALUES (2992, 'Bela Vista Do Piau�', 220155, 17, 3778, 7.57, 'bela  vistense', 499.391);
INSERT INTO tb_cidades VALUES (2995, 'Bertol�nia', 220170, 17, 5319, 4.34, 'bertolinense', 1225.331);
INSERT INTO tb_cidades VALUES (2998, 'Bocaina', 220180, 17, 4369, 16.27, 'bocainense', 268.575);
INSERT INTO tb_cidades VALUES (3000, 'Bom Princ�pio Do Piau�', 220191, 17, 5304, 10.17, 'bomprincipiense', 521.585);
INSERT INTO tb_cidades VALUES (3002, 'Boqueir�o Do Piau�', 220194, 17, 6193, 22.25, 'boqueir�oense', 278.291);
INSERT INTO tb_cidades VALUES (3005, 'Buriti Dos Lopes', 220200, 17, 19074, 27.6, 'buritiense', 691.158);
INSERT INTO tb_cidades VALUES (3007, 'Cabeceiras Do Piau�', 220205, 17, 9928, 16.31, 'cabeceirense', 608.526);
INSERT INTO tb_cidades VALUES (3010, 'Caldeir�o Grande Do Piau�', 220209, 17, 5671, 11.46, 'caldeir�o grandense', 494.889);
INSERT INTO tb_cidades VALUES (3013, 'Campo Grande Do Piau�', 220213, 17, 5592, 17.93, 'campo grandense', 311.827);
INSERT INTO tb_cidades VALUES (3016, 'Canavieira', 220225, 17, 3921, 1.81, 'canavieirense', 2162.865);
INSERT INTO tb_cidades VALUES (3017, 'Canto Do Buriti', 220230, 17, 20020, 4.63, 'canto-buritiense', 4325.622);
INSERT INTO tb_cidades VALUES (3020, 'Caracol', 220250, 17, 10212, 6.34, 'caracolense', 1610.951);
INSERT INTO tb_cidades VALUES (3022, 'Caridade Do Piau�', 220255, 17, 4826, 9.63, 'caridadense', 501.326);
INSERT INTO tb_cidades VALUES (3025, 'Cocal', 220270, 17, 26036, 20.51, 'cocalense', 1269.491);
INSERT INTO tb_cidades VALUES (3027, 'Cocal Dos Alves', 220272, 17, 5572, 15.58, 'cocalalvense', 357.687);
INSERT INTO tb_cidades VALUES (3029, 'Col�nia Do Gurgu�ia', 220275, 17, 6036, 14.02, 'coloniense', 430.619);
INSERT INTO tb_cidades VALUES (3030, 'Col�nia Do Piau�', 220277, 17, 7433, 7.84, 'coloniense', 947.881);
INSERT INTO tb_cidades VALUES (3031, 'Concei��o Do Canind�', 220280, 17, 4475, 5.38, 'concei��onense', 831.408);
INSERT INTO tb_cidades VALUES (3034, 'Cristal�ndia Do Piau�', 220300, 17, 7831, 6.51, 'cristalandense', 1202.891);
INSERT INTO tb_cidades VALUES (3036, 'Curimat�', 220320, 17, 10761, 4.6, 'curimataense', 2337.529);
INSERT INTO tb_cidades VALUES (3038, 'Curral Novo Do Piau�', 220327, 17, 4869, 6.47, 'curral novense', 752.308);
INSERT INTO tb_cidades VALUES (3041, 'Dirceu Arcoverde', 220335, 17, 6675, 6.56, 'arcoverdense', 1017.053);
INSERT INTO tb_cidades VALUES (3043, 'Dom Inoc�ncio', 220345, 17, 9245, 2.39, 'inocentino', 3870.151);
INSERT INTO tb_cidades VALUES (3045, 'Elesb�o Veloso', 220350, 17, 14512, 10.77, 'elesbonense', 1347.477);
INSERT INTO tb_cidades VALUES (3048, 'Fartura Do Piau�', 220375, 17, 5074, 7.12, 'farturense', 712.915);
INSERT INTO tb_cidades VALUES (3050, 'Floresta Do Piau�', 220385, 17, 2482, 12.75, 'florestense', 194.698);
INSERT INTO tb_cidades VALUES (3052, 'Francin�polis', 220400, 17, 5235, 19.48, 'francinopolitano', 268.7);
INSERT INTO tb_cidades VALUES (3055, 'Francisco Santos', 220420, 17, 8592, 17.47, 'francisco-santense', 491.86);
INSERT INTO tb_cidades VALUES (3057, 'Geminiano', 220435, 17, 5475, 11.84, 'geminianense', 462.521);
INSERT INTO tb_cidades VALUES (3060, 'Guaribas', 220455, 17, 4401, 1.41, 'guaribano', 3118.216);
INSERT INTO tb_cidades VALUES (3062, 'Ilha Grande', 220465, 17, 8914, 66.37, 'ilhagrandense', 134.317);
INSERT INTO tb_cidades VALUES (3064, 'Ipiranga Do Piau�', 220480, 17, 9327, 17.67, 'ipiranguense', 527.724);
INSERT INTO tb_cidades VALUES (3066, 'Itain�polis', 220500, 17, 11109, 13.41, 'itainopolense', 828.147);
INSERT INTO tb_cidades VALUES (3069, 'Jaic�s', 220520, 17, 18035, 20.85, 'jaicoense', 865.14);
INSERT INTO tb_cidades VALUES (3071, 'Jatob� Do Piau�', 220527, 17, 4656, 7.13, 'jatobaense', 653.231);
INSERT INTO tb_cidades VALUES (3074, 'Joaquim Pires', 220540, 17, 13817, 18.68, 'joaquim-pirense', 739.575);
INSERT INTO tb_cidades VALUES (3076, 'Jos� De Freitas', 220550, 17, 37085, 24.11, 'freitense', 1538.168);
INSERT INTO tb_cidades VALUES (3078, 'J�lio Borges', 220552, 17, 5373, 4.14, 'julio borgense', 1297.104);
INSERT INTO tb_cidades VALUES (3081, 'Lagoa De S�o Francisco', 220557, 17, 6422, 41.26, 'lagoense', 155.638);
INSERT INTO tb_cidades VALUES (3083, 'Lagoa Do Piau�', 220558, 17, 3863, 9.05, 'lagoense', 426.632);
INSERT INTO tb_cidades VALUES (3086, 'Landri Sales', 220560, 17, 5281, 4.85, 'landri-salesiano', 1088.579);
INSERT INTO tb_cidades VALUES (3088, 'Luzil�ndia', 220580, 17, 24721, 35.1, 'luzilandense', 704.343);
INSERT INTO tb_cidades VALUES (3090, 'Manoel Em�dio', 220590, 17, 5213, 3.22, 'manoel-emidense', 1618.976);
INSERT INTO tb_cidades VALUES (3093, 'Massap� Do Piau�', 220605, 17, 6220, 11.94, 'massap�ense', 521.123);
INSERT INTO tb_cidades VALUES (3095, 'Miguel Alves', 220620, 17, 32289, 23.17, 'miguel-alvense', 1393.707);
INSERT INTO tb_cidades VALUES (3097, 'Milton Brand�o', 220635, 17, 6769, 4.93, 'milton brand�oense', 1371.736);
INSERT INTO tb_cidades VALUES (3100, 'Monte Alegre Do Piau�', 220660, 17, 10345, 4.28, 'montealegrense', 2417.924);
INSERT INTO tb_cidades VALUES (3102, 'Morro Do Chap�u Do Piau�', 220667, 17, 6499, 19.8, 'morrochapeuense', 328.287);
INSERT INTO tb_cidades VALUES (3105, 'Naz�ria', 220672, 17, 8068, 22.19, '', 363.588);
INSERT INTO tb_cidades VALUES (3107, 'Nossa Senhora Dos Rem�dios', 220680, 17, 8206, 22.89, 'remediense', 358.49);
INSERT INTO tb_cidades VALUES (3110, 'Novo Santo Ant�nio', 220695, 17, 3260, 6.77, 'santantoniense', 481.705);
INSERT INTO tb_cidades VALUES (3112, 'Olho D`�gua Do Piau�', 220710, 17, 2626, 11.96, 'olho d?aguense', 219.597);
INSERT INTO tb_cidades VALUES (3115, 'Paje� Do Piau�', 220735, 17, 3363, 3.12, 'pajeuense', 1079.168);
INSERT INTO tb_cidades VALUES (3118, 'Paquet�', 220755, 17, 4147, 9.25, 'paquetaense', 448.456);
INSERT INTO tb_cidades VALUES (3120, 'Parna�ba', 220770, 17, 145705, 334.52, 'parna�bano', 435.57);
INSERT INTO tb_cidades VALUES (3122, 'Patos Do Piau�', 220777, 17, 6105, 8.12, 'patoense', 751.594);
INSERT INTO tb_cidades VALUES (3124, 'Paulistana', 220780, 17, 19785, 10.04, 'paulistanense', 1969.946);
INSERT INTO tb_cidades VALUES (3127, 'Pedro Laurentino', 220793, 17, 2407, 2.77, 'pedro laurentinense', 870.334);
INSERT INTO tb_cidades VALUES (3129, 'Pimenteiras', 220810, 17, 11733, 2.57, 'pimenteirense', 4563.103);
INSERT INTO tb_cidades VALUES (3131, 'Piracuruca', 220830, 17, 27553, 11.57, 'piracuruquense', 2380.401);
INSERT INTO tb_cidades VALUES (3134, 'Porto Alegre Do Piau�', 220855, 17, 2559, 2.19, 'porto  alegrense', 1169.439);
INSERT INTO tb_cidades VALUES (3136, 'Queimada Nova', 220865, 17, 8553, 6.32, 'queimadanovense', 1352.392);
INSERT INTO tb_cidades VALUES (3138, 'Regenera��o', 220880, 17, 17556, 14.03, 'regenerense', 1251.029);
INSERT INTO tb_cidades VALUES (3141, 'Ribeiro Gon�alves', 220890, 17, 6845, 1.72, 'ribeiro-gon�alvino', 3978.946);
INSERT INTO tb_cidades VALUES (3143, 'Santa Cruz Do Piau�', 220910, 17, 6027, 9.85, 'santa-cruzense', 611.614);
INSERT INTO tb_cidades VALUES (3146, 'Santa Luz', 220930, 17, 5513, 4.65, 'santa-luzense', 1186.839);
INSERT INTO tb_cidades VALUES (3148, 'Santana Do Piau�', 220935, 17, 4917, 34.84, 'santanense', 141.117);
INSERT INTO tb_cidades VALUES (3150, 'Santo Ant�nio Dos Milagres', 220945, 17, 2059, 62.12, 'santoantonhense', 33.147);
INSERT INTO tb_cidades VALUES (3151, 'Santo In�cio Do Piau�', 220950, 17, 3648, 4.28, 'santinacense', 852.876);
INSERT INTO tb_cidades VALUES (3153, 'S�o F�lix Do Piau�', 220960, 17, 3069, 4.67, 's�o-felicense', 657.241);
INSERT INTO tb_cidades VALUES (3155, 'S�o Francisco Do Piau�', 220970, 17, 6298, 4.7, 's�o-franciscano', 1340.659);
INSERT INTO tb_cidades VALUES (3157, 'S�o Gon�alo Do Piau�', 220980, 17, 4754, 31.65, 's�o-gon�alense', 150.215);
INSERT INTO tb_cidades VALUES (3160, 'S�o Jo�o Da Serra', 220990, 17, 6157, 6.12, 'serra-jonense', 1006.495);
INSERT INTO tb_cidades VALUES (3162, 'S�o Jo�o Do Arraial', 220997, 17, 7336, 34.38, 's�o j�oense', 213.354);
INSERT INTO tb_cidades VALUES (3165, 'S�o Jos� Do Peixe', 221010, 17, 3700, 2.87, 's�o-joseense', 1287.168);
INSERT INTO tb_cidades VALUES (3168, 'S�o Louren�o Do Piau�', 221035, 17, 4427, 6.58, 'lourenciano', 672.706);
INSERT INTO tb_cidades VALUES (3170, 'S�o Miguel Da Baixa Grande', 221038, 17, 2110, 5.49, 's�omiquelense', 384.19);
INSERT INTO tb_cidades VALUES (3173, 'S�o Pedro Do Piau�', 221050, 17, 13639, 26.32, 's�o-pedrense', 518.285);
INSERT INTO tb_cidades VALUES (3175, 'Sebasti�o Barros', 221062, 17, 3560, 3.98, 'sebasti�o barrense', 893.712);
INSERT INTO tb_cidades VALUES (3178, 'Sim�es', 221070, 17, 14180, 13.23, 'simonense', 1071.532);
INSERT INTO tb_cidades VALUES (3180, 'Socorro Do Piau�', 221090, 17, 4522, 5.94, 'socorrense', 761.85);
INSERT INTO tb_cidades VALUES (3182, 'Tamboril Do Piau�', 221095, 17, 2753, 1.73, 'tamborilense', 1587.29);
INSERT INTO tb_cidades VALUES (3185, 'Uni�o', 221110, 17, 42654, 36.35, 'unionense', 1173.441);
INSERT INTO tb_cidades VALUES (3187, 'Valen�a Do Piau�', 221130, 17, 20326, 15.23, 'valenciano', 1334.623);
INSERT INTO tb_cidades VALUES (3189, 'V�rzea Grande', 221140, 17, 4336, 18.29, 'v�rzea-grandense', 237.012);
INSERT INTO tb_cidades VALUES (3192, 'Wall Ferraz', 221170, 17, 4280, 15.85, 'wal farrazense', 269.986);
INSERT INTO tb_cidades VALUES (3194, 'Adrian�polis', 410020, 18, 6376, 4.73, 'adrianopolitano ', 1349.335);
INSERT INTO tb_cidades VALUES (3196, 'Almirante Tamandar�', 410040, 18, 103204, 529.94, 'tamandareense', 194.746);
INSERT INTO tb_cidades VALUES (3199, 'Alto Paran�', 410060, 18, 13663, 33.51, 'alto-paranaense', 407.72);
INSERT INTO tb_cidades VALUES (3202, 'Alvorada Do Sul', 410080, 18, 10283, 24.24, 'alvoradense-do-sul', 424.25);
INSERT INTO tb_cidades VALUES (3204, 'Amp�re', 410100, 18, 17308, 58.01, 'amperense', 298.35);
INSERT INTO tb_cidades VALUES (3206, 'Andir�', 410110, 18, 20610, 87.3, 'andiraense', 236.075);
INSERT INTO tb_cidades VALUES (3209, 'Ant�nio Olinto', 410130, 18, 7351, 15.65, 'antoniolintense ', 469.759);
INSERT INTO tb_cidades VALUES (3211, 'Arapongas', 410150, 18, 104150, 273.3, 'araponguense', 381.081);
INSERT INTO tb_cidades VALUES (3213, 'Arapu�', 410165, 18, 3561, 16.34, 'arapu�ense', 217.974);
INSERT INTO tb_cidades VALUES (3216, 'Ariranha Do Iva�', 410185, 18, 2453, 10.24, 'ariranhense do iva�', 239.563);
INSERT INTO tb_cidades VALUES (3218, 'Assis Chateaubriand', 410200, 18, 33025, 34.06, 'assis-chateaubriense ', 969.589);
INSERT INTO tb_cidades VALUES (3220, 'Atalaia', 410220, 18, 3913, 28.42, 'atalaiense', 137.664);
INSERT INTO tb_cidades VALUES (3223, 'Barbosa Ferraz', 410250, 18, 12656, 23.5, 'barbosense', 538.637);
INSERT INTO tb_cidades VALUES (3225, 'Barrac�o', 410260, 18, 9735, 56.67, 'barraconense', 171.77);
INSERT INTO tb_cidades VALUES (3227, 'Bela Vista Do Para�so', 410280, 18, 15079, 62.13, 'bela-vistense', 242.69);
INSERT INTO tb_cidades VALUES (3230, 'Boa Esperan�a Do Igua�u', 410302, 18, 2764, 18.21, 'boaesperencense', 151.798);
INSERT INTO tb_cidades VALUES (3232, 'Boa Vista Da Aparecida', 410305, 18, 7911, 30.87, 'boa-vistense', 256.298);
INSERT INTO tb_cidades VALUES (3235, 'Bom Sucesso', 410320, 18, 6561, 20.33, 'bom-sucessense', 322.756);
INSERT INTO tb_cidades VALUES (3237, 'Borraz�polis', 410330, 18, 7878, 23.56, 'borrazopolitano', 334.378);
INSERT INTO tb_cidades VALUES (3240, 'Cafeara', 410340, 18, 2695, 14.5, 'cafearense', 185.8);
INSERT INTO tb_cidades VALUES (3242, 'Cafezal Do Sul', 410347, 18, 4290, 12.79, 'cafezalense', 335.393);
INSERT INTO tb_cidades VALUES (3244, 'Cambar�', 410360, 18, 23886, 65.23, 'cambaraense', 366.175);
INSERT INTO tb_cidades VALUES (3247, 'Campina Da Lagoa', 410390, 18, 15394, 19.32, 'campinense-da-lagoa', 796.616);
INSERT INTO tb_cidades VALUES (3249, 'Campina Grande Do Sul', 410400, 18, 38769, 71.93, 'campinense-do-sul', 538.974);
INSERT INTO tb_cidades VALUES (3251, 'Campo Do Tenente', 410410, 18, 7125, 23.4, 'tenentiano ', 304.489);
INSERT INTO tb_cidades VALUES (3254, 'Campo Mour�o', 410430, 18, 87194, 115.05, 'campo-mourense', 757.876);
INSERT INTO tb_cidades VALUES (3256, 'Cand�i', 410442, 18, 14983, 9.9, 'candoianos', 1512.79);
INSERT INTO tb_cidades VALUES (3259, 'Capit�o Le�nidas Marques', 410460, 18, 14970, 54.29, 'le�nidas-marquesiense ', 275.748);
INSERT INTO tb_cidades VALUES (3261, 'Carl�polis', 410470, 18, 13706, 30.36, 'carlopolitano ', 451.418);
INSERT INTO tb_cidades VALUES (3264, 'Catanduvas', 410500, 18, 10202, 17.54, 'catanduvense', 581.757);
INSERT INTO tb_cidades VALUES (3266, 'Cerro Azul', 410520, 18, 16938, 12.63, 'cerro-azulense', 1341.192);
INSERT INTO tb_cidades VALUES (3268, 'Chopinzinho', 410540, 18, 19679, 20.51, 'chopinzinhense', 959.695);
INSERT INTO tb_cidades VALUES (3270, 'Cidade Ga�cha', 410560, 18, 11062, 27.45, 'cidade-gauchense ', 403.046);
INSERT INTO tb_cidades VALUES (3274, 'Congonhinhas', 410600, 18, 8279, 15.45, 'congonhinhense', 535.964);
INSERT INTO tb_cidades VALUES (3275, 'Conselheiro Mairinck', 410610, 18, 3636, 17.76, 'mairinquense', 204.706);
INSERT INTO tb_cidades VALUES (3277, 'Corb�lia', 410630, 18, 16312, 30.81, 'corbeliano ', 529.386);
INSERT INTO tb_cidades VALUES (3279, 'Coronel Domingos Soares', 410645, 18, 7238, 4.59, 'dominguense', 1576.225);
INSERT INTO tb_cidades VALUES (3282, 'Cruz Machado', 410680, 18, 18040, 12.2, 'cruz-machadense', 1478.354);
INSERT INTO tb_cidades VALUES (3284, 'Cruzeiro Do Oeste', 410660, 18, 20416, 26.2, 'cruzeirense ', 779.226);
INSERT INTO tb_cidades VALUES (3287, 'Curitiba', 410690, 18, 1751907, 4.024, 'curitibano', 435.274);
INSERT INTO tb_cidades VALUES (3289, 'Diamante D`Oeste', 410715, 18, 5027, 16.26, 'sul-diamantino ', 309.111);
INSERT INTO tb_cidades VALUES (3291, 'Diamante Do Sul', 410712, 18, 3510, 9.75, 'diamantense ', 359.947);
INSERT INTO tb_cidades VALUES (3294, 'Doutor Camargo', 410730, 18, 5828, 49.27, 'camarguense', 118.279);
INSERT INTO tb_cidades VALUES (3296, 'En�as Marques', 410740, 18, 6103, 31.75, 'en�as-marquense', 192.204);
INSERT INTO tb_cidades VALUES (3299, 'Esperan�a Nova', 410752, 18, 1970, 14.22, 'esperan�anovense', 138.561);
INSERT INTO tb_cidades VALUES (3301, 'Farol', 410755, 18, 3472, 12, 'farolense', 289.233);
INSERT INTO tb_cidades VALUES (3303, 'Fazenda Rio Grande', 410765, 18, 81675, 700.02, 'fazendense', 116.676);
INSERT INTO tb_cidades VALUES (3306, 'Figueira', 410775, 18, 8293, 63.91, 'figueirense', 129.77);
INSERT INTO tb_cidades VALUES (3308, 'Flora�', 410780, 18, 5050, 26.42, 'floraiense', 191.134);
INSERT INTO tb_cidades VALUES (3310, 'Florest�polis', 410800, 18, 11222, 45.56, 'florestopolitano', 246.331);
INSERT INTO tb_cidades VALUES (3312, 'Formosa Do Oeste', 410820, 18, 7541, 27.35, 'formosense-do-oeste ', 275.712);
INSERT INTO tb_cidades VALUES (3315, 'Francisco Alves', 410832, 18, 6418, 19.94, 'alvense', 321.899);
INSERT INTO tb_cidades VALUES (3317, 'General Carneiro', 410850, 18, 13669, 12.77, 'carneirense', 1070.256);
INSERT INTO tb_cidades VALUES (3320, 'Goioxim', 410865, 18, 7503, 10.68, 'goioxinhense', 702.472);
INSERT INTO tb_cidades VALUES (3322, 'Gua�ra', 410880, 18, 30704, 54.78, 'guairense', 560.487);
INSERT INTO tb_cidades VALUES (3324, 'Guamiranga', 410895, 18, 7900, 32.27, 'guamiranguense', 244.795);
INSERT INTO tb_cidades VALUES (3327, 'Guaraci', 410920, 18, 5227, 24.69, 'guaraciense', 211.719);
INSERT INTO tb_cidades VALUES (3329, 'Guarapuava', 410940, 18, 167328, 53.69, 'guarapuavano', 3116.313);
INSERT INTO tb_cidades VALUES (3331, 'Guaratuba', 410960, 18, 32095, 24.21, 'guaratubense ', 1325.909);
INSERT INTO tb_cidades VALUES (3333, 'Ibaiti', 410970, 18, 28751, 32.03, 'ibaitiense', 897.737);
INSERT INTO tb_cidades VALUES (3336, 'Icara�ma', 410990, 18, 8839, 13.09, 'icaraimense', 675.242);
INSERT INTO tb_cidades VALUES (3338, 'Iguatu', 411005, 18, 2234, 20.89, 'iguatuense', 106.938);
INSERT INTO tb_cidades VALUES (3340, 'Imbituva', 411010, 18, 28455, 37.61, 'imbituvense', 756.536);
INSERT INTO tb_cidades VALUES (3342, 'Inaj�', 411030, 18, 2988, 15.35, 'inajaense', 194.705);
INSERT INTO tb_cidades VALUES (3345, 'Ipor�', 411060, 18, 14981, 23.12, 'ipor�nense', 647.896);
INSERT INTO tb_cidades VALUES (3347, 'Irati', 411070, 18, 56207, 56.23, 'iratiense', 999.519);
INSERT INTO tb_cidades VALUES (3349, 'Itaguaj�', 411090, 18, 4568, 24, 'itaguajeense', 190.371);
INSERT INTO tb_cidades VALUES (3351, 'Itambarac�', 411100, 18, 6759, 32.6, 'itambaracaense', 207.343);
INSERT INTO tb_cidades VALUES (3353, 'Itapejara D`Oeste', 411120, 18, 10531, 41.46, 'itapejarense', 254.015);
INSERT INTO tb_cidades VALUES (3356, 'Iva�', 411140, 18, 12815, 21.08, 'ivaiense', 607.849);
INSERT INTO tb_cidades VALUES (3358, 'Ivat�', 411155, 18, 7514, 18.29, 'ivateense', 410.908);
INSERT INTO tb_cidades VALUES (3361, 'Jacarezinho', 411180, 18, 39121, 64.93, 'jacarezinhense', 602.529);
INSERT INTO tb_cidades VALUES (3363, 'Jaguaria�va', 411200, 18, 32606, 22.44, 'jaguariaivense', 1453.069);
INSERT INTO tb_cidades VALUES (3365, 'Jani�polis', 411220, 18, 6532, 19.46, 'janiopolitano', 335.651);
INSERT INTO tb_cidades VALUES (3367, 'Japur�', 411240, 18, 8549, 51.75, 'japuraense', 165.185);
INSERT INTO tb_cidades VALUES (3369, 'Jardim Olinda', 411260, 18, 1409, 10.96, 'jardinolindense', 128.515);
INSERT INTO tb_cidades VALUES (3372, 'Joaquim T�vora', 411280, 18, 10736, 37.13, 'tavorense', 289.173);
INSERT INTO tb_cidades VALUES (3374, 'Juranda', 411295, 18, 7641, 21.85, 'jurandense', 349.723);
INSERT INTO tb_cidades VALUES (3377, 'Lapa', 411320, 18, 44932, 21.46, 'lapeano', 2093.832);
INSERT INTO tb_cidades VALUES (3379, 'Laranjeiras Do Sul', 411330, 18, 30777, 45.79, 'laranjeirense-do-sul', 672.086);
INSERT INTO tb_cidades VALUES (3381, 'Lidian�polis', 411342, 18, 3973, 25.02, 'lidianopolitano', 158.806);
INSERT INTO tb_cidades VALUES (3384, 'Lobato', 411360, 18, 4401, 18.27, 'lobatense', 240.905);
INSERT INTO tb_cidades VALUES (3386, 'Luiziana', 411373, 18, 7315, 8.05, 'luizianense', 908.603);
INSERT INTO tb_cidades VALUES (3388, 'Lupion�polis', 411380, 18, 4592, 37.93, 'lupionopolense ', 121.066);
INSERT INTO tb_cidades VALUES (3391, 'Mandagua�u', 411410, 18, 19781, 67.28, 'mandagua�uense', 294.02);
INSERT INTO tb_cidades VALUES (3393, 'Mandirituba', 411430, 18, 22220, 58.6, 'mandiritubano ', 379.179);
INSERT INTO tb_cidades VALUES (3395, 'Mangueirinha', 411440, 18, 17048, 16.15, 'mangueirinhense', 1055.461);
INSERT INTO tb_cidades VALUES (3397, 'Marechal C�ndido Rondon', 411460, 18, 46819, 62.59, 'rondonense', 748.004);
INSERT INTO tb_cidades VALUES (3400, 'Maril�ndia Do Sul', 411490, 18, 8863, 23.06, 'marilandense', 384.425);
INSERT INTO tb_cidades VALUES (3402, 'Mariluz', 411510, 18, 10224, 23.6, 'mariluzense', 433.171);
INSERT INTO tb_cidades VALUES (3403, 'Maring�', 411520, 18, 357077, 732.12, 'maringaense', 487.73);
INSERT INTO tb_cidades VALUES (3405, 'Marip�', 411535, 18, 5684, 20.03, 'maripaense', 283.794);
INSERT INTO tb_cidades VALUES (3407, 'Marquinho', 411545, 18, 4981, 9.74, 'marquinhense', 511.149);
INSERT INTO tb_cidades VALUES (3410, 'Matinhos', 411570, 18, 29428, 249.93, 'matinhense', 117.743);
INSERT INTO tb_cidades VALUES (3412, 'Mau� Da Serra', 411575, 18, 8555, 78.98, 'mauaense da serra', 108.325);
INSERT INTO tb_cidades VALUES (3414, 'Mercedes', 411585, 18, 5046, 25.12, 'mercedense', 200.865);
INSERT INTO tb_cidades VALUES (3417, 'Missal', 411605, 18, 10474, 32.29, 'missalense', 324.398);
INSERT INTO tb_cidades VALUES (3419, 'Morretes', 411620, 18, 15718, 22.96, 'morretense ', 684.582);
INSERT INTO tb_cidades VALUES (3421, 'Nossa Senhora Das Gra�as', 411640, 18, 3836, 20.65, 'gracense', 185.731);
INSERT INTO tb_cidades VALUES (3423, 'Nova Am�rica Da Colina', 411660, 18, 3478, 26.86, 'nova-americanense', 129.476);
INSERT INTO tb_cidades VALUES (3426, 'Nova Esperan�a', 411690, 18, 26615, 66.27, 'nova-esperancense', 401.588);
INSERT INTO tb_cidades VALUES (3428, 'Nova F�tima', 411700, 18, 8147, 28.75, 'fatimense', 283.423);
INSERT INTO tb_cidades VALUES (3430, 'Nova Londrina', 411710, 18, 13067, 48.51, 'nova-londrinense', 269.389);
INSERT INTO tb_cidades VALUES (3433, 'Nova Santa B�rbara', 411721, 18, 3908, 54.46, 'b�rbaraense', 71.764);
INSERT INTO tb_cidades VALUES (3436, 'Novo Itacolomi', 411729, 18, 2827, 17.51, 'itacolomiense', 161.411);
INSERT INTO tb_cidades VALUES (3438, 'Ourizona', 411740, 18, 3380, 19.15, 'ourizonense', 176.457);
INSERT INTO tb_cidades VALUES (3440, 'Pai�andu', 411750, 18, 35936, 210.35, 'pai�anduense', 170.838);
INSERT INTO tb_cidades VALUES (3443, 'Palmital', 411780, 18, 14865, 18.18, 'palmitalense', 817.649);
INSERT INTO tb_cidades VALUES (3445, 'Para�so Do Norte', 411800, 18, 11772, 57.55, 'paraisense-do-norte ', 204.564);
INSERT INTO tb_cidades VALUES (3447, 'Paranagu�', 411820, 18, 140469, 169.92, 'parnanguara', 826.676);
INSERT INTO tb_cidades VALUES (3450, 'Pato Bragado', 411845, 18, 4822, 35.64, 'pato bragadense', 135.286);
INSERT INTO tb_cidades VALUES (3452, 'Paula Freitas', 411860, 18, 5434, 12.93, 'paula-freitense ', 420.327);
INSERT INTO tb_cidades VALUES (3454, 'Peabiru', 411880, 18, 13624, 29.07, 'peabiruense', 468.596);
INSERT INTO tb_cidades VALUES (3457, 'P�rola D`Oeste', 411900, 18, 6761, 32.81, 'p�rola-oestense ', 206.048);
INSERT INTO tb_cidades VALUES (3459, 'Pinhais', 411915, 18, 117008, 1.926, 'pinhaense', 60.749);
INSERT INTO tb_cidades VALUES (3461, 'Pinhal�o', 411920, 18, 6215, 28.17, 'pinhalense ou pinhal�oense', 220.626);
INSERT INTO tb_cidades VALUES (3464, 'Piraquara', 411950, 18, 93207, 410.54, 'piraquarense', 227.033);
INSERT INTO tb_cidades VALUES (3466, 'Pitangueiras', 411965, 18, 2814, 22.84, 'pitangueirense', 123.23);
INSERT INTO tb_cidades VALUES (3468, 'Planalto', 411980, 18, 13654, 39.49, 'planaltense ', 345.74);
INSERT INTO tb_cidades VALUES (3471, 'Porecatu', 412000, 18, 14189, 48.65, 'porecatuense', 291.665);
INSERT INTO tb_cidades VALUES (3473, 'Porto Barreiro', 412015, 18, 3663, 10.15, 'porto barreirense', 361.021);
INSERT INTO tb_cidades VALUES (3475, 'Porto Vit�ria', 412030, 18, 4020, 18.93, 'porto-vitoriense', 212.388);
INSERT INTO tb_cidades VALUES (3478, 'Presidente Castelo Branco', 412040, 18, 4784, 30.72, 'castelo-branquense ', 155.734);
INSERT INTO tb_cidades VALUES (3480, 'Prudent�polis', 412060, 18, 48792, 21.14, 'prudentopolitano', 2308.505);
INSERT INTO tb_cidades VALUES (3482, 'Quatigu�', 412070, 18, 7045, 62.52, 'quatiguaense', 112.689);
INSERT INTO tb_cidades VALUES (3484, 'Quatro Pontes', 412085, 18, 3803, 33.25, 'quatro pontense', 114.393);
INSERT INTO tb_cidades VALUES (3487, 'Quinta Do Sol', 412110, 18, 5088, 15.6, 'quinta-solense ', 326.178);
INSERT INTO tb_cidades VALUES (3489, 'Ramil�ndia', 412125, 18, 4134, 17.43, 'ramilandiense', 237.196);
INSERT INTO tb_cidades VALUES (3491, 'Rancho Alegre D`Oeste', 412135, 18, 2847, 11.79, 'rancho alegrense', 241.387);
INSERT INTO tb_cidades VALUES (3494, 'Renascen�a', 412160, 18, 6812, 16.03, 'renascenseano ', 425.085);
INSERT INTO tb_cidades VALUES (3496, 'Reserva Do Igua�u', 412175, 18, 7307, 8.76, 'reservense do igu��', 834.234);
INSERT INTO tb_cidades VALUES (3498, 'Ribeir�o Do Pinhal', 412190, 18, 13524, 36.09, 'ribeiro-pinhalense', 374.733);
INSERT INTO tb_cidades VALUES (3501, 'Rio Bonito Do Igua�u', 412215, 18, 13661, 18.31, 'rio bonitense', 746.123);
INSERT INTO tb_cidades VALUES (3504, 'Rio Negro', 412230, 18, 31274, 51.84, 'rio-negrense', 603.248);
INSERT INTO tb_cidades VALUES (3506, 'Roncador', 412250, 18, 11537, 15.55, 'roncadorense ', 742.123);
INSERT INTO tb_cidades VALUES (3508, 'Ros�rio Do Iva�', 412265, 18, 5588, 15.05, 'rosariense', 371.251);
INSERT INTO tb_cidades VALUES (3511, 'Salto Do Itarar�', 412290, 18, 5178, 25.82, 'saltense-do-itarar� ', 200.519);
INSERT INTO tb_cidades VALUES (3513, 'Santa Am�lia', 412310, 18, 3803, 48.73, 'ameliense', 78.045);
INSERT INTO tb_cidades VALUES (3515, 'Santa Cruz De Monte Castelo', 412330, 18, 8092, 18.31, 'monte-castelense', 442.014);
INSERT INTO tb_cidades VALUES (3518, 'Santa In�s', 412360, 18, 1818, 13.13, 'santa-ineense', 138.481);
INSERT INTO tb_cidades VALUES (3520, 'Santa Izabel Do Oeste', 412380, 18, 13132, 40.89, 'santa-izabelense ', 321.183);
INSERT INTO tb_cidades VALUES (3523, 'Santa Mariana', 412390, 18, 12435, 29.11, 'santa-marianense', 427.194);
INSERT INTO tb_cidades VALUES (3525, 'Santa Tereza Do Oeste', 412402, 18, 10332, 31.67, 'santa-terezense ', 326.191);
INSERT INTO tb_cidades VALUES (3527, 'Santana Do Itarar�', 412400, 18, 5249, 20.89, 'santanense', 251.267);
INSERT INTO tb_cidades VALUES (3528, 'Santo Ant�nio Da Platina', 412410, 18, 42707, 59.19, 'platinense', 721.473);
INSERT INTO tb_cidades VALUES (3531, 'Santo Ant�nio Do Sudoeste', 412440, 18, 18893, 58, 'santo-antoniense', 325.744);
INSERT INTO tb_cidades VALUES (3533, 'S�o Carlos Do Iva�', 412460, 18, 6354, 28.23, 's�o-carlense', 225.078);
INSERT INTO tb_cidades VALUES (3536, 'S�o Jo�o Do Caiu�', 412490, 18, 5911, 19.42, 'caiuense ', 304.414);
INSERT INTO tb_cidades VALUES (3539, 'S�o Jorge D`Oeste', 412520, 18, 9085, 23.94, 's�o-jorgense ou jorgense', 379.546);
INSERT INTO tb_cidades VALUES (3541, 'S�o Jorge Do Patroc�nio', 412535, 18, 6041, 14.93, 'patrocinense', 404.691);
INSERT INTO tb_cidades VALUES (3544, 'S�o Jos� Dos Pinhais', 412550, 18, 264210, 279.16, 's�o-joseense', 946.443);
INSERT INTO tb_cidades VALUES (3547, 'S�o Miguel Do Igua�u', 412570, 18, 25769, 30.27, 's�o-miguelense', 851.304);
INSERT INTO tb_cidades VALUES (3549, 'S�o Pedro Do Iva�', 412580, 18, 10167, 31.51, 'ivaiense ', 322.693);
INSERT INTO tb_cidades VALUES (3551, 'S�o Sebasti�o Da Amoreira', 412600, 18, 8626, 37.84, 'amoreirense', 227.982);
INSERT INTO tb_cidades VALUES (3554, 'Sarandi', 412625, 18, 82847, 801.79, 'sarandiense', 103.327);
INSERT INTO tb_cidades VALUES (3557, 'Serran�polis Do Igua�u', 412635, 18, 4568, 9.44, 'serranopolitano', 483.659);
INSERT INTO tb_cidades VALUES (3559, 'Sertan�polis', 412650, 18, 15638, 30.93, 'sertanopolense', 505.533);
INSERT INTO tb_cidades VALUES (3562, 'Tamarana', 412667, 18, 12262, 25.97, 'tamaraense', 472.156);
INSERT INTO tb_cidades VALUES (3564, 'Tapejara', 412680, 18, 14598, 24.68, 'tapejarense', 591.4);
INSERT INTO tb_cidades VALUES (3566, 'Teixeira Soares', 412700, 18, 10283, 11.39, 'teixeira-soarense', 902.795);
INSERT INTO tb_cidades VALUES (3569, 'Terra Rica', 412730, 18, 15221, 21.73, 'terra-riquense', 700.588);
INSERT INTO tb_cidades VALUES (3571, 'Tibagi', 412750, 18, 19344, 6.55, 'tibagiense', 2951.573);
INSERT INTO tb_cidades VALUES (3573, 'Toledo', 412770, 18, 119313, 99.68, 'toledense', 1197.002);
INSERT INTO tb_cidades VALUES (3575, 'Tr�s Barras Do Paran�', 412785, 18, 11824, 23.45, 'tribarrense', 504.172);
INSERT INTO tb_cidades VALUES (3578, 'Tup�ssi', 412795, 18, 7997, 25.72, 'tup�ciense', 310.91);
INSERT INTO tb_cidades VALUES (3580, 'Ubirat�', 412800, 18, 21558, 33.03, 'ubirat�ense', 652.583);
INSERT INTO tb_cidades VALUES (3582, 'Uni�o Da Vit�ria', 412820, 18, 52735, 73.22, 'uni�o-vitoriense', 720.207);
INSERT INTO tb_cidades VALUES (3585, 'Ventania', 412853, 18, 9957, 13.11, 'ventaniense', 759.368);
INSERT INTO tb_cidades VALUES (3587, 'Ver�', 412860, 18, 7878, 25.27, 'vereense', 311.802);
INSERT INTO tb_cidades VALUES (3590, 'Wenceslau Braz', 412850, 18, 19298, 48.5, 'brazense ', 397.917);
INSERT INTO tb_cidades VALUES (3592, 'Angra Dos Reis', 330010, 19, 169511, 205.45, 'angrense', 825.088);
INSERT INTO tb_cidades VALUES (3595, 'Areal', 330022, 19, 11423, 102.99, 'arealense', 110.919);
INSERT INTO tb_cidades VALUES (3597, 'Arraial Do Cabo', 330025, 19, 27715, 172.91, 'cabista', 160.286);
INSERT INTO tb_cidades VALUES (3599, 'Barra Mansa', 330040, 19, 177813, 324.94, 'barra-mansense', 547.226);
INSERT INTO tb_cidades VALUES (3602, 'Bom Jesus Do Itabapoana', 330060, 19, 35411, 59.13, 'bom-jesuense', 598.824);
INSERT INTO tb_cidades VALUES (3604, 'Cachoeiras De Macacu', 330080, 19, 54273, 56.9, 'cachoeirense', 953.801);
INSERT INTO tb_cidades VALUES (3607, 'Cantagalo', 330110, 19, 19830, 26.47, 'cantagalense', 749.278);
INSERT INTO tb_cidades VALUES (3609, 'Cardoso Moreira', 330115, 19, 12600, 24.02, 'cardosense', 524.633);
INSERT INTO tb_cidades VALUES (3612, 'Comendador Levy Gasparian', 330095, 19, 8180, 76.53, 'gaspariense', 106.888);
INSERT INTO tb_cidades VALUES (3614, 'Cordeiro', 330150, 19, 20430, 175.59, 'cordeirense', 116.349);
INSERT INTO tb_cidades VALUES (3616, 'Duque De Caxias', 330170, 19, 855048, 1.828, 'caxiense', 467.619);
INSERT INTO tb_cidades VALUES (3619, 'Iguaba Grande', 330187, 19, 22851, 439.91, 'iguabense', 51.945);
INSERT INTO tb_cidades VALUES (3622, 'Italva', 330205, 19, 14063, 47.86, 'italvense', 293.82);
INSERT INTO tb_cidades VALUES (3624, 'Itaperuna', 330220, 19, 95841, 86.71, 'itaperunense', 1105.341);
INSERT INTO tb_cidades VALUES (3626, 'Japeri', 330227, 19, 95492, 1.166, 'japeriense', 81.871);
INSERT INTO tb_cidades VALUES (3629, 'Macuco', 330245, 19, 5269, 67.8, 'macuquense', 77.719);
INSERT INTO tb_cidades VALUES (3631, 'Mangaratiba', 330260, 19, 36456, 103.25, 'mangaratibano', 353.083);
INSERT INTO tb_cidades VALUES (3633, 'Mendes', 330280, 19, 17935, 184.83, 'mendense', 97.035);
INSERT INTO tb_cidades VALUES (3635, 'Miguel Pereira', 330290, 19, 24642, 85.21, 'miguelense', 289.183);
INSERT INTO tb_cidades VALUES (3638, 'Nil�polis', 330320, 19, 157425, 8.117, 'nilopolitano', 19.393);
INSERT INTO tb_cidades VALUES (3640, 'Nova Friburgo', 330340, 19, 182082, 195.07, 'friburguense', 933.414);
INSERT INTO tb_cidades VALUES (3643, 'Para�ba Do Sul', 330370, 19, 41084, 70.77, 'sul-paraibano ', 580.525);
INSERT INTO tb_cidades VALUES (3645, 'Paty Do Alferes', 330385, 19, 26359, 82.68, 'patiense', 318.801);
INSERT INTO tb_cidades VALUES (3647, 'Pinheiral', 330395, 19, 22719, 296.86, 'pinheiralense', 76.53);
INSERT INTO tb_cidades VALUES (3650, 'Porto Real', 330411, 19, 16592, 326.95, 'porto realense', 50.748);
INSERT INTO tb_cidades VALUES (3651, 'Quatis', 330412, 19, 12793, 44.72, 'quatiense', 286.093);
INSERT INTO tb_cidades VALUES (3652, 'Queimados', 330414, 19, 137962, 1.822, 'queimadense', 75.695);
INSERT INTO tb_cidades VALUES (3654, 'Resende', 330420, 19, 119769, 109.35, 'resendense', 1095.254);
INSERT INTO tb_cidades VALUES (3656, 'Rio Claro', 330440, 19, 17425, 20.73, 'rio-clarense', 840.59);
INSERT INTO tb_cidades VALUES (3658, 'Rio Das Ostras', 330452, 19, 105676, 461.38, 'rio ostrense', 229.043);
INSERT INTO tb_cidades VALUES (3661, 'Santo Ant�nio De P�dua', 330470, 19, 40589, 67.27, 'paduano', 603.355);
INSERT INTO tb_cidades VALUES (3663, 'S�o Francisco De Itabapoana', 330475, 19, 41354, 36.84, 's�o franciscano', 1122.437);
INSERT INTO tb_cidades VALUES (3666, 'S�o Jo�o De Meriti', 330510, 19, 458673, 13.024, 'meritiense', 35.216);
INSERT INTO tb_cidades VALUES (3669, 'S�o Pedro Da Aldeia', 330520, 19, 87875, 264.05, 'aldeiense', 332.792);
INSERT INTO tb_cidades VALUES (3672, 'Saquarema', 330550, 19, 74234, 209.96, 'saquaremense', 353.566);
INSERT INTO tb_cidades VALUES (3674, 'Silva Jardim', 330560, 19, 21349, 22.77, 'silva-jardinense', 937.547);
INSERT INTO tb_cidades VALUES (3677, 'Teres�polis', 330580, 19, 163746, 212.49, 'teresopolitano', 770.601);
INSERT INTO tb_cidades VALUES (3679, 'Tr�s Rios', 330600, 19, 77432, 237.42, 'trirriense', 326.135);
INSERT INTO tb_cidades VALUES (3682, 'Vassouras', 330620, 19, 34410, 63.94, 'vassourense', 538.134);
INSERT INTO tb_cidades VALUES (3683, 'Volta Redonda', 330630, 19, 257803, 1.412, 'volta-redondense', 182.483);
INSERT INTO tb_cidades VALUES (3686, 'Afonso Bezerra', 240030, 20, 10844, 18.82, 'afonso-bezerrense', 576.183);
INSERT INTO tb_cidades VALUES (3689, 'Almino Afonso', 240060, 20, 4871, 38.04, 'almino-afonsense', 128.037);
INSERT INTO tb_cidades VALUES (3691, 'Angicos', 240080, 20, 11549, 15.57, 'angicano', 741.574);
INSERT INTO tb_cidades VALUES (3693, 'Apodi', 240100, 20, 34763, 21.69, 'apodiense', 1602.471);
INSERT INTO tb_cidades VALUES (3695, 'Ar�s', 240120, 20, 12924, 111.89, 'aresense', 115.504);
INSERT INTO tb_cidades VALUES (3697, 'Ba�a Formosa', 240140, 20, 8573, 34.9, 'ba�a-formosense', 245.66);
INSERT INTO tb_cidades VALUES (3700, 'Bento Fernandes', 240160, 20, 5113, 16.98, 'bento-fernandense', 301.068);
INSERT INTO tb_cidades VALUES (3702, 'Bom Jesus', 240170, 20, 9440, 77.35, 'bom-jesuense', 122.037);
INSERT INTO tb_cidades VALUES (3704, 'Cai�ara Do Norte', 240185, 20, 6016, 31.74, 'cai�arense do norte', 189.548);
INSERT INTO tb_cidades VALUES (3707, 'Campo Redondo', 240210, 20, 10266, 48.03, 'campo-redondense', 213.724);
INSERT INTO tb_cidades VALUES (3709, 'Cara�bas', 240230, 20, 19576, 17.88, 'caraubense', 1095);
INSERT INTO tb_cidades VALUES (3711, 'Carnaubais', 240250, 20, 9762, 17.99, 'carnaubaense', 542.527);
INSERT INTO tb_cidades VALUES (3714, 'Coronel Ezequiel', 240280, 20, 5405, 29.1, 'coronel-ezequielense', 185.747);
INSERT INTO tb_cidades VALUES (3716, 'Cruzeta', 240300, 20, 7967, 26.93, 'cruzetense', 295.829);
INSERT INTO tb_cidades VALUES (3718, 'Doutor Severiano', 240320, 20, 6492, 59.96, 'severianense', 108.278);
INSERT INTO tb_cidades VALUES (3721, 'Esp�rito Santo', 240350, 20, 10475, 77.11, 'esp�rito-santense', 135.837);
INSERT INTO tb_cidades VALUES (3723, 'Felipe Guerra', 240370, 20, 5734, 21.35, 'felipe-guerrense ', 268.587);
INSERT INTO tb_cidades VALUES (3725, 'Flor�nia', 240380, 20, 8959, 17.74, 'floraniense', 504.927);
INSERT INTO tb_cidades VALUES (3727, 'Frutuoso Gomes', 240400, 20, 4233, 66.89, 'frutuoso-gomense', 63.279);
INSERT INTO tb_cidades VALUES (3730, 'Governador Dix Sept Rosado', 240430, 20, 12374, 10.96, 'dix-septiense', 1129.336);
INSERT INTO tb_cidades VALUES (3733, 'Ielmo Marinho', 240460, 20, 12171, 39.01, 'ielmo-marinhense', 312.027);
INSERT INTO tb_cidades VALUES (3735, 'Ipueira', 240480, 20, 2077, 16.31, 'ipueirense', 127.347);
INSERT INTO tb_cidades VALUES (3737, 'Ita�', 240490, 20, 5564, 41.83, 'itauense', 133.029);
INSERT INTO tb_cidades VALUES (3740, 'Jandu�s', 240520, 20, 5345, 17.53, 'janduiense', 304.899);
INSERT INTO tb_cidades VALUES (3742, 'Japi', 240540, 20, 5522, 29.22, 'japiense', 188.989);
INSERT INTO tb_cidades VALUES (3744, 'Jardim De Piranhas', 240560, 20, 13506, 40.86, 'piranhense ', 330.53);
INSERT INTO tb_cidades VALUES (3746, 'Jo�o C�mara', 240580, 20, 32227, 45.08, 'camarense', 714.954);
INSERT INTO tb_cidades VALUES (3749, 'Jucurutu', 240610, 20, 17692, 18.95, 'jucurutuense', 933.723);
INSERT INTO tb_cidades VALUES (3751, 'Lagoa D`Anta', 240620, 20, 6227, 58.94, 'lagoa-velhense', 105.651);
INSERT INTO tb_cidades VALUES (3754, 'Lagoa Nova', 240650, 20, 13983, 79.31, 'lagoa-novense', 176.3);
INSERT INTO tb_cidades VALUES (3756, 'Lajes', 240670, 20, 10381, 15.34, 'lajense', 676.619);
INSERT INTO tb_cidades VALUES (3758, 'Lucr�cia', 240690, 20, 3633, 117.45, 'lucreciano', 30.931);
INSERT INTO tb_cidades VALUES (3760, 'Maca�ba', 240710, 20, 69467, 136.01, 'macaibense', 510.753);
INSERT INTO tb_cidades VALUES (3763, 'Marcelino Vieira', 240730, 20, 8265, 23.91, 'marcelinense ', 345.709);
INSERT INTO tb_cidades VALUES (3765, 'Maxaranguape', 240750, 20, 10441, 79.51, 'maxaranguapense', 131.315);
INSERT INTO tb_cidades VALUES (3767, 'Montanhas', 240770, 20, 11413, 138.82, 'montanhense', 82.213);
INSERT INTO tb_cidades VALUES (3769, 'Monte Das Gameleiras', 240790, 20, 2261, 31.43, 'monte-gameleirense', 71.946);
INSERT INTO tb_cidades VALUES (3772, 'N�sia Floresta', 240820, 20, 23784, 77.26, 'n�sia-florestense', 307.839);
INSERT INTO tb_cidades VALUES (3774, 'Olho D`�gua Do Borges', 240840, 20, 4295, 30.42, 'olho-d''�gua-borgense', 141.17);
INSERT INTO tb_cidades VALUES (3777, 'Para�', 240870, 20, 3859, 10.07, 'parauense', 383.212);
INSERT INTO tb_cidades VALUES (3778, 'Parazinho', 240880, 20, 4845, 17.64, 'parazinhense', 274.67);
INSERT INTO tb_cidades VALUES (3780, 'Parnamirim', 240325, 20, 202456, 1.638, 'parnamirinense', 123.589);
INSERT INTO tb_cidades VALUES (3782, 'Passagem', 240920, 20, 2895, 70.24, 'passagense', 41.215);
INSERT INTO tb_cidades VALUES (3784, 'Pau Dos Ferros', 240940, 20, 27745, 106.73, 'pau-ferrense', 259.958);
INSERT INTO tb_cidades VALUES (3787, 'Pedro Avelino', 240970, 20, 7171, 7.53, 'pedro-avelinense', 952.752);
INSERT INTO tb_cidades VALUES (3790, 'Pil�es', 241000, 20, 3453, 41.76, 'pilonense', 82.688);
INSERT INTO tb_cidades VALUES (3791, 'Po�o Branco', 241010, 20, 13949, 60.54, 'po�o-branquense', 230.399);
INSERT INTO tb_cidades VALUES (3794, 'Presidente Juscelino', 241030, 20, 8768, 52.4, 'juscelinense', 167.344);
INSERT INTO tb_cidades VALUES (3797, 'Rafael Godeiro', 241060, 20, 3063, 30.61, 'rafael-godeirense', 100.072);
INSERT INTO tb_cidades VALUES (3799, 'Riacho De Santana', 241080, 20, 4156, 32.44, 'riacho-santanense', 128.105);
INSERT INTO tb_cidades VALUES (3802, 'Rodolfo Fernandes', 241100, 20, 4418, 28.53, 'rodolfo-fernandense ', 154.839);
INSERT INTO tb_cidades VALUES (3804, 'Santa Cruz', 241120, 20, 35797, 57.33, 'santa-cruzense', 624.352);
INSERT INTO tb_cidades VALUES (3806, 'Santana Do Matos', 241140, 20, 13809, 9.73, 'santanense', 1419.401);
INSERT INTO tb_cidades VALUES (3808, 'Santo Ant�nio', 241150, 20, 22216, 73.79, 'santo-antoniense', 301.08);
INSERT INTO tb_cidades VALUES (3811, 'S�o Fernando', 241180, 20, 3401, 8.41, 's�o-fernandense', 404.425);
INSERT INTO tb_cidades VALUES (3813, 'S�o Gon�alo Do Amarante', 241200, 20, 87668, 351.91, 'gon�alense', 249.122);
INSERT INTO tb_cidades VALUES (3816, 'S�o Jos� Do Campestre', 241230, 20, 12356, 36.22, 'campestrense', 341.113);
INSERT INTO tb_cidades VALUES (3818, 'S�o Miguel', 241250, 20, 22157, 129.05, 's�o-miguelense ', 171.69);
INSERT INTO tb_cidades VALUES (3820, 'S�o Paulo Do Potengi', 241260, 20, 15843, 65.9, 'potengiense', 240.424);
INSERT INTO tb_cidades VALUES (3823, 'S�o Tom�', 241290, 20, 10827, 12.55, 's�o-tomeense', 862.578);
INSERT INTO tb_cidades VALUES (3825, 'Senador El�i De Souza', 241310, 20, 5637, 33.63, 'el�i-de-souzense', 167.604);
INSERT INTO tb_cidades VALUES (3828, 'Serra Do Mel', 241335, 20, 10287, 16.69, 'serrano', 616.51);
INSERT INTO tb_cidades VALUES (3830, 'Serrinha', 241350, 20, 6581, 34.04, 'serrinhense', 193.35);
INSERT INTO tb_cidades VALUES (3832, 'Severiano Melo', 241360, 20, 5752, 36.44, 'severianense', 157.85);
INSERT INTO tb_cidades VALUES (3835, 'Taipu', 241390, 20, 11836, 33.55, 'taipuense', 352.816);
INSERT INTO tb_cidades VALUES (3837, 'Tenente Ananias', 241410, 20, 9883, 44.19, 'tenente-ananiense', 223.67);
INSERT INTO tb_cidades VALUES (3839, 'Tibau', 241105, 20, 3687, 21.79, 'tibauense', 169.21);
INSERT INTO tb_cidades VALUES (3841, 'Timba�ba Dos Batistas', 241430, 20, 2295, 16.94, 'timbaubense', 135.453);
INSERT INTO tb_cidades VALUES (3844, 'Umarizal', 241450, 20, 10659, 49.91, 'umarizalense ', 213.582);
INSERT INTO tb_cidades VALUES (3846, 'V�rzea', 241470, 20, 5236, 72.04, 'varzeano', 72.683);
INSERT INTO tb_cidades VALUES (3849, 'Vi�osa', 241490, 20, 1618, 42.69, 'vi�osense', 37.904);
INSERT INTO tb_cidades VALUES (3851, 'Alta Floresta D`Oeste', 110001, 21, 24392, 3.45, 'alta-florense', 7067.036);
INSERT INTO tb_cidades VALUES (3853, 'Alto Para�so', 110040, 21, 17135, 6.46, 'alto-paraisense', 2651.811);
INSERT INTO tb_cidades VALUES (3856, 'Buritis', 110045, 21, 32383, 9.92, 'buritisense', 3265.814);
INSERT INTO tb_cidades VALUES (3858, 'Cacaul�ndia', 110060, 21, 5736, 2.92, 'cacaulandense', 1961.781);
INSERT INTO tb_cidades VALUES (3860, 'Campo Novo De Rond�nia', 110070, 21, 12665, 3.68, 'campo-novense', 3442.01);
INSERT INTO tb_cidades VALUES (3863, 'Cerejeiras', 110005, 21, 17029, 6.12, 'cerejeirense', 2783.304);
INSERT INTO tb_cidades VALUES (3865, 'Colorado Do Oeste', 110006, 21, 18591, 12.81, 'coloradense', 1451.063);
INSERT INTO tb_cidades VALUES (3868, 'Cujubim', 110094, 21, 15854, 4.1, 'cujubiense', 3863.946);
INSERT INTO tb_cidades VALUES (3870, 'Governador Jorge Teixeira', 110100, 21, 10512, 2.07, 'jorge-teixeirense', 5067.391);
INSERT INTO tb_cidades VALUES (3873, 'Jaru', 110011, 21, 52005, 17.66, 'jaruense', 2944.131);
INSERT INTO tb_cidades VALUES (3875, 'Machadinho D`Oeste', 110013, 21, 31135, 3.66, 'machadinhense', 8509.32);
INSERT INTO tb_cidades VALUES (3877, 'Mirante Da Serra', 110130, 21, 11878, 9.97, 'mirantense', 1191.877);
INSERT INTO tb_cidades VALUES (3880, 'Nova Mamor�', 110033, 21, 22546, 2.24, 'nova-mamorense', 10071.66);
INSERT INTO tb_cidades VALUES (3882, 'Novo Horizonte Do Oeste', 110050, 21, 10240, 12.14, 'novo-horizontino', 843.447);
INSERT INTO tb_cidades VALUES (3885, 'Pimenta Bueno', 110018, 21, 33822, 5.42, 'pimenta-buenense', 6240.938);
INSERT INTO tb_cidades VALUES (3887, 'Porto Velho', 110020, 21, 428527, 12.57, 'porto-velhense', 34096.429);
INSERT INTO tb_cidades VALUES (3889, 'Primavera De Rond�nia', 110147, 21, 3524, 5.82, 'primaverense', 605.693);
INSERT INTO tb_cidades VALUES (3892, 'Santa Luzia D`Oeste', 110029, 21, 8886, 7.42, 'santa-luziense', 1197.797);
INSERT INTO tb_cidades VALUES (3894, 'S�o Francisco Do Guapor�', 110149, 21, 16035, 1.46, 's�o-francisquense', 10959.786);
INSERT INTO tb_cidades VALUES (3897, 'Teixeir�polis', 110155, 21, 4888, 10.63, 'teixeirense', 459.979);
INSERT INTO tb_cidades VALUES (3900, 'Vale Do Anari', 110175, 21, 9384, 2.99, 'anariense', 3135.146);
INSERT INTO tb_cidades VALUES (3901, 'Vale Do Para�so', 110180, 21, 8210, 8.5, 'vale-paraisense', 965.677);
INSERT INTO tb_cidades VALUES (3904, 'Amajari', 140002, 22, 9327, 0.33, 'amajariense', 28472.265);
INSERT INTO tb_cidades VALUES (3906, 'Bonfim', 140015, 22, 10943, 1.35, 'bonfinense', 8095.399);
INSERT INTO tb_cidades VALUES (3908, 'Caracara�', 140020, 22, 18398, 0.39, 'caracaraiense', 47410.947);
INSERT INTO tb_cidades VALUES (3910, 'Iracema', 140028, 22, 8696, 0.6, 'iracemense', 14409.55);
INSERT INTO tb_cidades VALUES (3913, 'Pacaraima', 140045, 22, 10433, 1.3, 'pacaraimense', 8028.463);
INSERT INTO tb_cidades VALUES (3915, 'S�o Jo�o Da Baliza', 140050, 22, 6769, 1.58, 'baliziense', 4285.038);
INSERT INTO tb_cidades VALUES (3918, 'Acegu�', 430003, 23, 4394, 2.84, 'aceguaense', 1549.391);
INSERT INTO tb_cidades VALUES (3920, 'Agudo', 430010, 23, 16722, 31.19, 'agudense', 536.117);
INSERT INTO tb_cidades VALUES (3922, 'Alecrim', 430030, 23, 7045, 22.38, 'alecrinense', 314.744);
INSERT INTO tb_cidades VALUES (3924, 'Alegria', 430045, 23, 4301, 24.91, 'alegriense', 172.688);
INSERT INTO tb_cidades VALUES (3926, 'Alpestre', 430050, 23, 8027, 24.42, 'alpestrense', 328.751);
INSERT INTO tb_cidades VALUES (3928, 'Alto Feliz', 430057, 23, 2917, 36.84, 'alto-felizense', 79.173);
INSERT INTO tb_cidades VALUES (4109, 'Herveiras', 430957, 23, 2954, 24.97, 'herveirense', 118.281);
INSERT INTO tb_cidades VALUES (3931, 'Ametista Do Sul', 430064, 23, 7323, 78.33, 'ametistense', 93.49);
INSERT INTO tb_cidades VALUES (3933, 'Anta Gorda', 430070, 23, 6073, 25, 'anta-gordense', 242.965);
INSERT INTO tb_cidades VALUES (3935, 'Arambar�', 430085, 23, 3693, 7.11, 'arambarense', 519.126);
INSERT INTO tb_cidades VALUES (3938, 'Arroio Do Meio', 430100, 23, 18783, 118.91, 'arroio-meense', 157.957);
INSERT INTO tb_cidades VALUES (3940, 'Arroio Do Sal', 430105, 23, 7740, 64.01, 'arroio-salense', 120.912);
INSERT INTO tb_cidades VALUES (3943, 'Arroio Grande', 430130, 23, 18470, 7.35, 'arroio-grandense', 2513.609);
INSERT INTO tb_cidades VALUES (3945, 'Augusto Pestana', 430150, 23, 7096, 20.42, 'augusto-pestanense', 347.44);
INSERT INTO tb_cidades VALUES (3948, 'Balne�rio Pinhal', 430163, 23, 10856, 104.63, 'pinhalense', 103.758);
INSERT INTO tb_cidades VALUES (3950, 'Bar�o De Cotegipe', 430170, 23, 6529, 25.1, 'cotegipense', 260.131);
INSERT INTO tb_cidades VALUES (3952, 'Barra Do Guarita', 430185, 23, 3089, 47.82, 'barra-guaritense', 64.591);
INSERT INTO tb_cidades VALUES (3955, 'Barra Do Rio Azul', 430192, 23, 2003, 13.62, 'barra-azulense', 147.029);
INSERT INTO tb_cidades VALUES (3958, 'Barros Cassal', 430200, 23, 11133, 17.16, 'barros-cassalense', 648.898);
INSERT INTO tb_cidades VALUES (3960, 'Bento Gon�alves', 430210, 23, 107278, 280.86, 'bento-gon�alvense', 381.96);
INSERT INTO tb_cidades VALUES (3962, 'Boa Vista Do Buric�', 430220, 23, 6574, 60.46, 'boa-vistense', 108.733);
INSERT INTO tb_cidades VALUES (3965, 'Boa Vista Do Sul', 430225, 23, 2776, 29.42, 'boavistense', 94.349);
INSERT INTO tb_cidades VALUES (3967, 'Bom Princ�pio', 430235, 23, 11789, 133.2, 'bom-principiense', 88.504);
INSERT INTO tb_cidades VALUES (3970, 'Boqueir�o Do Le�o', 430245, 23, 7673, 28.91, 'l�o-boqueirense', 265.428);
INSERT INTO tb_cidades VALUES (3972, 'Bozano', 430258, 23, 2200, 10.94, 'bozanense', 201.04);
INSERT INTO tb_cidades VALUES (3975, 'Buti�', 430270, 23, 20406, 27.13, 'butiaense', 752.25);
INSERT INTO tb_cidades VALUES (3977, 'Cacequi', 430290, 23, 13676, 5.77, 'cacequiense', 2369.96);
INSERT INTO tb_cidades VALUES (3979, 'Cachoeirinha', 430310, 23, 118278, 2.687, 'cachoeirinhense', 44.018);
INSERT INTO tb_cidades VALUES (3982, 'Cai�ara', 430340, 23, 5071, 26.8, 'cai�arense', 189.238);
INSERT INTO tb_cidades VALUES (3984, 'Camargo', 430355, 23, 2592, 18.77, 'camarguense', 138.069);
INSERT INTO tb_cidades VALUES (3986, 'Campestre Da Serra', 430367, 23, 3247, 6.04, 'campestrense', 538.002);
INSERT INTO tb_cidades VALUES (3988, 'Campinas Do Sul', 430380, 23, 5506, 19.94, 'campinense', 276.163);
INSERT INTO tb_cidades VALUES (3991, 'Campos Borges', 430410, 23, 3494, 15.42, 'campos-borgense', 226.579);
INSERT INTO tb_cidades VALUES (3993, 'C�ndido God�i', 430430, 23, 6535, 26.54, 'godoiense', 246.277);
INSERT INTO tb_cidades VALUES (3996, 'Cangu�u', 430450, 23, 53259, 15.11, 'cangu�uense', 3525.309);
INSERT INTO tb_cidades VALUES (3998, 'Canudos Do Vale', 430461, 23, 1807, 22.06, 'canudense do vale', 81.913);
INSERT INTO tb_cidades VALUES (4000, 'Cap�o Da Canoa', 430463, 23, 42040, 432.96, 'caponense', 97.1);
INSERT INTO tb_cidades VALUES (4003, 'Capela De Santana', 430468, 23, 11612, 63.19, 'capelense', 183.757);
INSERT INTO tb_cidades VALUES (4005, 'Capivari Do Sul', 430467, 23, 3890, 9.42, 'capivariense', 412.793);
INSERT INTO tb_cidades VALUES (4008, 'Carlos Barbosa', 430480, 23, 25192, 110.17, 'barbosense', 228.67);
INSERT INTO tb_cidades VALUES (4010, 'Casca', 430490, 23, 8651, 31.83, 'casquense', 271.747);
INSERT INTO tb_cidades VALUES (4013, 'Caxias Do Sul', 430510, 23, 435564, 264.89, 'caxiense', 1644.302);
INSERT INTO tb_cidades VALUES (4015, 'Cerrito', 430512, 23, 6402, 14.17, 'cerritense', 451.701);
INSERT INTO tb_cidades VALUES (4017, 'Cerro Grande', 430515, 23, 2417, 32.91, 'cerro-grandense', 73.438);
INSERT INTO tb_cidades VALUES (4019, 'Cerro Largo', 430520, 23, 13289, 74.79, 'cerro-larguense', 177.676);
INSERT INTO tb_cidades VALUES (4022, 'Charrua', 430537, 23, 3471, 17.52, 'charruense', 198.125);
INSERT INTO tb_cidades VALUES (4024, 'Chu�', 430543, 23, 5917, 29.21, 'chuiense', 202.553);
INSERT INTO tb_cidades VALUES (4026, 'Cidreira', 430545, 23, 12668, 51.52, 'cidreirense', 245.885);
INSERT INTO tb_cidades VALUES (4027, 'Cir�aco', 430550, 23, 4922, 17.97, 'ciriaquense', 273.874);
INSERT INTO tb_cidades VALUES (4029, 'Colorado', 430560, 23, 3550, 12.44, 'coloradense', 285.263);
INSERT INTO tb_cidades VALUES (4031, 'Constantina', 430580, 23, 9752, 48.04, 'constantinense', 203);
INSERT INTO tb_cidades VALUES (4033, 'Coqueiros Do Sul', 430585, 23, 2457, 8.92, 'coqueirense', 275.55);
INSERT INTO tb_cidades VALUES (4035, 'Coronel Bicaco', 430590, 23, 7748, 15.74, 'bicaquense', 492.126);
INSERT INTO tb_cidades VALUES (4038, 'Coxilha', 430597, 23, 2826, 6.68, 'coxilhense', 422.79);
INSERT INTO tb_cidades VALUES (4040, 'Cristal', 430605, 23, 7280, 10.68, 'cristalense', 681.628);
INSERT INTO tb_cidades VALUES (4042, 'Cruz Alta', 430610, 23, 62821, 46.18, 'cruzaltense', 1360.376);
INSERT INTO tb_cidades VALUES (4044, 'Cruzeiro Do Sul', 430620, 23, 12320, 79.2, 'cruzeirense', 155.552);
INSERT INTO tb_cidades VALUES (4047, 'Dezesseis De Novembro', 430635, 23, 2866, 13.22, 'dezesseis-novembrense', 216.849);
INSERT INTO tb_cidades VALUES (4049, 'Dois Irm�os', 430640, 23, 27572, 423.17, 'dois-irm�osense', 65.156);
INSERT INTO tb_cidades VALUES (4052, 'Dom Feliciano', 430650, 23, 14380, 10.6, 'felicianense', 1356.176);
INSERT INTO tb_cidades VALUES (4054, 'Dom Pedro De Alc�ntara', 430655, 23, 2550, 32.63, 'dom-pedro-alcantarense', 78.158);
INSERT INTO tb_cidades VALUES (4057, 'Doutor Ricardo', 430675, 23, 2030, 18.72, 'ricardense', 108.434);
INSERT INTO tb_cidades VALUES (4060, 'Encruzilhada Do Sul', 430690, 23, 24534, 7.33, 'encruzilhadense', 3348.333);
INSERT INTO tb_cidades VALUES (4062, 'Entre Rios Do Sul', 430695, 23, 3080, 25.65, 'entre-rio-sulense', 120.068);
INSERT INTO tb_cidades VALUES (4064, 'Erebango', 430697, 23, 2970, 19.4, 'erebanguense', 153.123);
INSERT INTO tb_cidades VALUES (4067, 'Erval Grande', 430720, 23, 5163, 18.06, 'erval-grandense', 285.915);
INSERT INTO tb_cidades VALUES (4069, 'Esmeralda', 430740, 23, 3168, 3.82, 'esmeraldense', 829.938);
INSERT INTO tb_cidades VALUES (4071, 'Espumoso', 430750, 23, 15240, 19.46, 'espumosense', 783.069);
INSERT INTO tb_cidades VALUES (4073, 'Est�ncia Velha', 430760, 23, 42574, 816.42, 'estanciense', 52.147);
INSERT INTO tb_cidades VALUES (4076, 'Estrela Velha', 430781, 23, 3628, 12.88, 'estrelavelhense', 281.668);
INSERT INTO tb_cidades VALUES (4078, 'Fagundes Varela', 430786, 23, 2579, 19.2, 'fagundense', 134.296);
INSERT INTO tb_cidades VALUES (4081, 'Faxinalzinho', 430805, 23, 2567, 17.9, 'faxinalzinhense', 143.382);
INSERT INTO tb_cidades VALUES (4083, 'Feliz', 430810, 23, 12359, 129.59, 'felizense', 95.372);
INSERT INTO tb_cidades VALUES (4085, 'Floriano Peixoto', 430825, 23, 2018, 11.98, 'florianense', 168.428);
INSERT INTO tb_cidades VALUES (4088, 'Forquetinha', 430843, 23, 2479, 26.49, 'forquetinhense', 93.57);
INSERT INTO tb_cidades VALUES (4090, 'Frederico Westphalen', 430850, 23, 28843, 108.85, 'westphalense', 264.976);
INSERT INTO tb_cidades VALUES (4093, 'Gaurama', 430870, 23, 5862, 28.7, 'gauramense', 204.262);
INSERT INTO tb_cidades VALUES (4095, 'Gentil', 430885, 23, 1677, 9.11, 'gentilense', 184.015);
INSERT INTO tb_cidades VALUES (4097, 'Giru�', 430900, 23, 17075, 19.95, 'giruaense', 855.924);
INSERT INTO tb_cidades VALUES (4100, 'Gramado Dos Loureiros', 430912, 23, 2269, 17.27, 'loureirense', 131.396);
INSERT INTO tb_cidades VALUES (4102, 'Gravata�', 430920, 23, 255660, 551.58, 'gravataiense', 463.501);
INSERT INTO tb_cidades VALUES (4104, 'Gua�ba', 430930, 23, 95204, 252.57, 'guaibense', 376.948);
INSERT INTO tb_cidades VALUES (4106, 'Guarani Das Miss�es', 430950, 23, 8115, 27.93, 'guaraniense', 290.497);
INSERT INTO tb_cidades VALUES (4112, 'Humait�', 430970, 23, 4919, 36.57, 'humaitaense', 134.514);
INSERT INTO tb_cidades VALUES (4114, 'Ibia��', 430980, 23, 4710, 13.5, 'ibia�aense', 348.818);
INSERT INTO tb_cidades VALUES (4116, 'Ibirapuit�', 430995, 23, 4061, 13.23, 'ibirapuitanense', 307.03);
INSERT INTO tb_cidades VALUES (4118, 'Igrejinha', 431010, 23, 31660, 233.03, 'igrejinhense', 135.862);
INSERT INTO tb_cidades VALUES (4121, 'Imb�', 431033, 23, 17670, 448.53, 'Imbeense', 39.395);
INSERT INTO tb_cidades VALUES (4123, 'Independ�ncia', 431040, 23, 6618, 18.51, 'independenciense', 357.44);
INSERT INTO tb_cidades VALUES (4126, 'Ipiranga Do Sul', 431046, 23, 1944, 12.31, 'ipiranguense', 157.883);
INSERT INTO tb_cidades VALUES (4128, 'Itaara', 431053, 23, 5010, 28.96, 'itaarense', 172.99);
INSERT INTO tb_cidades VALUES (4130, 'Itapuca', 431057, 23, 2344, 12.72, 'itapuquense', 184.25);
INSERT INTO tb_cidades VALUES (4133, 'Itatiba Do Sul', 431070, 23, 4171, 19.66, 'itatibense', 212.194);
INSERT INTO tb_cidades VALUES (4135, 'Ivoti', 431080, 23, 19874, 314.71, 'ivotiense', 63.151);
INSERT INTO tb_cidades VALUES (4137, 'Jacuizinho', 431087, 23, 2507, 7.41, 'jacuizinhense', 338.535);
INSERT INTO tb_cidades VALUES (4140, 'Jaguari', 431110, 23, 11473, 17.04, 'jaguariense', 673.404);
INSERT INTO tb_cidades VALUES (4142, 'Jari', 431113, 23, 3575, 4.17, 'jariense', 856.46);
INSERT INTO tb_cidades VALUES (4144, 'J�lio De Castilhos', 431120, 23, 19579, 10.15, 'castilhense', 1929.389);
INSERT INTO tb_cidades VALUES (4146, 'Lagoa Dos Tr�s Cantos', 431127, 23, 1598, 11.53, 'tr�s-cantense', 138.636);
INSERT INTO tb_cidades VALUES (4149, 'Lajeado', 431140, 23, 71445, 793.06, 'lajeadense', 90.088);
INSERT INTO tb_cidades VALUES (4151, 'Lavras Do Sul', 431150, 23, 7679, 2.95, 'lavrense', 2600.611);
INSERT INTO tb_cidades VALUES (4154, 'Linha Nova', 431164, 23, 1624, 25.48, 'linha-novense', 63.733);
INSERT INTO tb_cidades VALUES (4155, 'Ma�ambara', 431171, 23, 4738, 2.82, 'ma�ambarense', 1682.828);
INSERT INTO tb_cidades VALUES (4157, 'Mampituba', 431173, 23, 3003, 19, 'mampitubense', 158.03);
INSERT INTO tb_cidades VALUES (4159, 'Maquin�', 431177, 23, 6905, 11.11, 'maquinense', 621.696);
INSERT INTO tb_cidades VALUES (4162, 'Marcelino Ramos', 431190, 23, 5134, 22.36, 'marcelinense', 229.619);
INSERT INTO tb_cidades VALUES (4164, 'Mariano Moro', 431200, 23, 2210, 22.3, 'marianense', 99.111);
INSERT INTO tb_cidades VALUES (4167, 'Mato Castelhano', 431213, 23, 2470, 10.36, 'mato-castelhanense', 238.365);
INSERT INTO tb_cidades VALUES (4169, 'Mato Queimado', 431217, 23, 1799, 15.69, 'matoqueimadense', 114.641);
INSERT INTO tb_cidades VALUES (4172, 'Miragua�', 431230, 23, 4855, 37.24, 'miraguaiense', 130.386);
INSERT INTO tb_cidades VALUES (4174, 'Monte Alegre Dos Campos', 431237, 23, 3102, 5.64, 'montealegrense', 549.742);
INSERT INTO tb_cidades VALUES (4177, 'Morma�o', 431242, 23, 2749, 18.81, 'mormacense', 146.109);
INSERT INTO tb_cidades VALUES (4179, 'Morro Redondo', 431245, 23, 6227, 25.45, 'morro-redondense', 244.646);
INSERT INTO tb_cidades VALUES (4181, 'Mostardas', 431250, 23, 12124, 6.11, 'mostardense', 1983);
INSERT INTO tb_cidades VALUES (4183, 'Muitos Cap�es', 431261, 23, 2988, 2.49, 'caponense', 1197.935);
INSERT INTO tb_cidades VALUES (4186, 'Nicolau Vergueiro', 431267, 23, 1721, 11.04, 'nicolau-vergueirense', 155.82);
INSERT INTO tb_cidades VALUES (4188, 'Nova Alvorada', 431275, 23, 3182, 21.3, 'nova-alvoradense', 149.362);
INSERT INTO tb_cidades VALUES (4191, 'Nova Boa Vista', 431295, 23, 1960, 20.8, 'boa-vistense', 94.238);
INSERT INTO tb_cidades VALUES (4193, 'Nova Candel�ria', 431301, 23, 2751, 28.12, 'nova-candelariense', 97.833);
INSERT INTO tb_cidades VALUES (4196, 'Nova P�dua', 431308, 23, 2450, 23.73, 'paduense', 103.238);
INSERT INTO tb_cidades VALUES (4198, 'Nova Petr�polis', 431320, 23, 19045, 65.38, 'nova-petropolitano', 291.301);
INSERT INTO tb_cidades VALUES (4200, 'Nova Ramada', 431333, 23, 2437, 9.57, 'morador de nova rama', 254.756);
INSERT INTO tb_cidades VALUES (4202, 'Nova Santa Rita', 431337, 23, 22716, 104.26, 'nova-santaritense', 217.871);
INSERT INTO tb_cidades VALUES (4205, 'Novo Hamburgo', 431340, 23, 238940, 1.067, 'novo-hamburguense', 223.822);
INSERT INTO tb_cidades VALUES (4207, 'Novo Tiradentes', 431344, 23, 2277, 30.2, 'tiradentense', 75.396);
INSERT INTO tb_cidades VALUES (4210, 'Paim Filho', 431360, 23, 4243, 23.29, 'paim-filhense', 182.18);
INSERT INTO tb_cidades VALUES (4212, 'Palmeira Das Miss�es', 431370, 23, 34328, 24.18, 'palmeirense', 1419.435);
INSERT INTO tb_cidades VALUES (4215, 'Pantano Grande', 431395, 23, 9895, 11.76, 'pantanense', 841.229);
INSERT INTO tb_cidades VALUES (4217, 'Para�so Do Sul', 431402, 23, 7336, 21.71, 'paraisense', 337.843);
INSERT INTO tb_cidades VALUES (4220, 'Passa Sete', 431406, 23, 5154, 16.92, 'passasetense', 304.54);
INSERT INTO tb_cidades VALUES (4221, 'Passo Do Sobrado', 431407, 23, 6011, 22.67, 'passo-sobradense', 265.109);
INSERT INTO tb_cidades VALUES (4224, 'Paverama', 431415, 23, 8044, 46.8, 'paveramense', 171.864);
INSERT INTO tb_cidades VALUES (4226, 'Pedro Os�rio', 431420, 23, 7811, 12.83, 'pedro-osoriense', 608.792);
INSERT INTO tb_cidades VALUES (4229, 'Picada Caf�', 431442, 23, 5182, 60.86, 'picadense', 85.146);
INSERT INTO tb_cidades VALUES (4231, 'Pinhal Da Serra', 431446, 23, 2130, 4.87, 'pinhalense', 437.352);
INSERT INTO tb_cidades VALUES (4234, 'Pinheiro Machado', 431450, 23, 12780, 5.68, 'pinheirense', 2249.566);
INSERT INTO tb_cidades VALUES (4236, 'Piratini', 431460, 23, 19841, 5.61, 'piratinense', 3539.704);
INSERT INTO tb_cidades VALUES (4238, 'Po�o Das Antas', 431475, 23, 2017, 31, 'po�andense', 65.065);
INSERT INTO tb_cidades VALUES (4241, 'Port�o', 431480, 23, 30920, 193.38, 'portanense', 159.895);
INSERT INTO tb_cidades VALUES (4243, 'Porto Lucena', 431500, 23, 5413, 21.65, 'porto-lucenense', 250.079);
INSERT INTO tb_cidades VALUES (4245, 'Porto Vera Cruz', 431507, 23, 1852, 16.3, 'porto-vera-cruzense', 113.647);
INSERT INTO tb_cidades VALUES (4248, 'Presidente Lucena', 431514, 23, 2484, 50.26, 'lucinense', 49.426);
INSERT INTO tb_cidades VALUES (4250, 'Prot�sio Alves', 431517, 23, 2000, 11.57, 'prot�sio-alvense', 172.816);
INSERT INTO tb_cidades VALUES (4253, 'Quatro Irm�os', 431531, 23, 1775, 6.62, 'quatroirmanense', 267.987);
INSERT INTO tb_cidades VALUES (4255, 'Quinze De Novembro', 431535, 23, 3653, 16.33, 'quinze-novembrense', 223.639);
INSERT INTO tb_cidades VALUES (4258, 'Restinga Seca', 431550, 23, 15849, 16.58, 'restinguense', 956.053);
INSERT INTO tb_cidades VALUES (4260, 'Rio Grande', 431560, 23, 197228, 72.79, 'rio-grandino', 2709.534);
INSERT INTO tb_cidades VALUES (4262, 'Riozinho', 431575, 23, 4330, 18.07, 'riozinhense', 239.56);
INSERT INTO tb_cidades VALUES (4265, 'Rolador', 431595, 23, 2546, 8.63, 'roladorense', 295.006);
INSERT INTO tb_cidades VALUES (4267, 'Ronda Alta', 431610, 23, 10221, 24.37, 'ronda-altense', 419.346);
INSERT INTO tb_cidades VALUES (4269, 'Roque Gonzales', 431630, 23, 7203, 20.78, 'roque-gonzalense', 346.623);
INSERT INTO tb_cidades VALUES (4272, 'Saldanha Marinho', 431643, 23, 2869, 12.95, 'saldanhense', 221.605);
INSERT INTO tb_cidades VALUES (4274, 'Salvador Das Miss�es', 431647, 23, 2669, 28.38, 'salvadorense', 94.042);
INSERT INTO tb_cidades VALUES (4277, 'Santa B�rbara Do Sul', 431670, 23, 8829, 9.05, 'santa-barbarense', 975.51);
INSERT INTO tb_cidades VALUES (4279, 'Santa Clara Do Sul', 431675, 23, 5697, 65.75, 'santa-clarense', 86.644);
INSERT INTO tb_cidades VALUES (4280, 'Santa Cruz Do Sul', 431680, 23, 118374, 161.4, 'santa-cruzense', 733.412);
INSERT INTO tb_cidades VALUES (4281, 'Santa Margarida Do Sul', 431697, 23, 2352, 2.46, 'margaridense ', 955.303);
INSERT INTO tb_cidades VALUES (4283, 'Santa Maria Do Herval', 431695, 23, 6053, 43.36, 'hervalense', 139.599);
INSERT INTO tb_cidades VALUES (4286, 'Santa Vit�ria Do Palmar', 431730, 23, 30990, 5.91, 'vitoriense', 5244.379);
INSERT INTO tb_cidades VALUES (4288, 'Santana Do Livramento', 431710, 23, 82464, 11.86, 'santanense', 6950.388);
INSERT INTO tb_cidades VALUES (4291, 'Santo Ant�nio Da Patrulha', 431760, 23, 39685, 37.8, 'patrulhense', 1049.81);
INSERT INTO tb_cidades VALUES (4293, 'Santo Ant�nio Do Palma', 431755, 23, 2139, 16.96, 'palmense', 126.095);
INSERT INTO tb_cidades VALUES (4295, 'Santo Augusto', 431780, 23, 13968, 29.84, 'santo-augustense', 468.105);
INSERT INTO tb_cidades VALUES (4298, 'S�o Borja', 431800, 23, 61671, 17.05, 's�o borjense', 3616.035);
INSERT INTO tb_cidades VALUES (4300, 'S�o Francisco De Assis', 431810, 23, 19254, 7.68, 'assisense', 2508.464);
INSERT INTO tb_cidades VALUES (4303, 'S�o Jer�nimo', 431840, 23, 22134, 23.64, 'jeronimense', 936.379);
INSERT INTO tb_cidades VALUES (4305, 'S�o Jo�o Do Pol�sine', 431843, 23, 2635, 30.94, 'polesinense', 85.17);
INSERT INTO tb_cidades VALUES (4308, 'S�o Jos� Do Herval', 431846, 23, 2204, 21.38, 'hervalense', 103.094);
INSERT INTO tb_cidades VALUES (4310, 'S�o Jos� Do Inhacor�', 431849, 23, 2200, 28.28, 'inhacoraense', 77.806);
INSERT INTO tb_cidades VALUES (4313, 'S�o Jos� Do Sul', 431861, 23, 2082, 35.27, 's�o josense do sul', 59.034);
INSERT INTO tb_cidades VALUES (4316, 'S�o Louren�o Do Sul', 431880, 23, 43111, 21.17, 'lourenciano', 2036.134);
INSERT INTO tb_cidades VALUES (4319, 'S�o Martinho', 431910, 23, 5773, 33.63, 's�o-martinhense', 171.662);
INSERT INTO tb_cidades VALUES (4321, 'S�o Miguel Das Miss�es', 431915, 23, 7421, 6.03, 'miguelino', 1229.848);
INSERT INTO tb_cidades VALUES (4528, 'Indaial', 420750, 24, 54854, 127.41, 'indaialense', 430.539);
INSERT INTO tb_cidades VALUES (4323, 'S�o Paulo Das Miss�es', 431930, 23, 6364, 28.43, 'paulista-das-miss�es', 223.887);
INSERT INTO tb_cidades VALUES (4326, 'S�o Pedro Do Buti�', 431937, 23, 2873, 26.69, 's�o-butiaiense', 107.631);
INSERT INTO tb_cidades VALUES (4329, 'S�o Sep�', 431960, 23, 23798, 10.81, 'sepense', 2200.702);
INSERT INTO tb_cidades VALUES (4331, 'S�o Valentim Do Sul', 431971, 23, 2168, 23.5, 's�o-valentinense', 92.24);
INSERT INTO tb_cidades VALUES (4334, 'S�o Vicente Do Sul', 431980, 23, 8440, 7.18, 'vicentino', 1175.233);
INSERT INTO tb_cidades VALUES (4336, 'Sapucaia Do Sul', 432000, 23, 130957, 2.245, 'sapucaiense', 58.309);
INSERT INTO tb_cidades VALUES (4339, 'Sede Nova', 432023, 23, 3011, 25.24, 'sede-novense', 119.297);
INSERT INTO tb_cidades VALUES (4341, 'Selbach', 432030, 23, 4929, 27.75, 'selbaquense', 177.643);
INSERT INTO tb_cidades VALUES (4343, 'Sentinela Do Sul', 432035, 23, 5198, 18.43, 'sentinelense', 281.965);
INSERT INTO tb_cidades VALUES (4346, 'Sert�o', 432050, 23, 6294, 14.32, 'sertanense', 439.473);
INSERT INTO tb_cidades VALUES (4348, 'Sete De Setembro', 432057, 23, 2124, 16.34, 'setembrense', 129.993);
INSERT INTO tb_cidades VALUES (4350, 'Silveira Martins', 432065, 23, 2449, 20.68, 'sillveirense', 118.423);
INSERT INTO tb_cidades VALUES (4353, 'Soledade', 432080, 23, 30044, 24.76, 'soledadense', 1213.414);
INSERT INTO tb_cidades VALUES (4355, 'Tapejara', 432090, 23, 19250, 80.61, 'tapejarense', 238.799);
INSERT INTO tb_cidades VALUES (4358, 'Taquara', 432120, 23, 54643, 119.35, 'taquarense', 457.856);
INSERT INTO tb_cidades VALUES (4360, 'Taquaru�u Do Sul', 432132, 23, 2966, 38.6, 'taquara�usense', 76.849);
INSERT INTO tb_cidades VALUES (4362, 'Tenente Portela', 432140, 23, 13719, 40.58, 'portelense', 338.085);
INSERT INTO tb_cidades VALUES (4365, 'Tio Hugo', 432146, 23, 2724, 23.85, 'tio-huguense', 114.236);
INSERT INTO tb_cidades VALUES (4367, 'Toropi', 432149, 23, 2952, 14.54, 'toropiense', 202.977);
INSERT INTO tb_cidades VALUES (4369, 'Tramanda�', 432160, 23, 41585, 287.97, 'tramandaiense', 144.408);
INSERT INTO tb_cidades VALUES (4371, 'Tr�s Arroios', 432163, 23, 2855, 19.21, 'tr�s-arroiense', 148.583);
INSERT INTO tb_cidades VALUES (4374, 'Tr�s De Maio', 432180, 23, 23726, 56.2, 'tr�s-maiense', 422.2);
INSERT INTO tb_cidades VALUES (4376, 'Tr�s Palmeiras', 432185, 23, 4381, 24.26, 'tr�s-palmeirense', 180.6);
INSERT INTO tb_cidades VALUES (4379, 'Triunfo', 432200, 23, 25793, 31.5, 'triunfense', 818.802);
INSERT INTO tb_cidades VALUES (4381, 'Tunas', 432215, 23, 4395, 20.15, 'tunense', 218.073);
INSERT INTO tb_cidades VALUES (4383, 'Tupanciret�', 432220, 23, 22281, 9.89, 'tupanciretanense', 2251.869);
INSERT INTO tb_cidades VALUES (4386, 'Turu�u', 432232, 23, 3522, 13.89, 'turu�uense', 253.636);
INSERT INTO tb_cidades VALUES (4388, 'Uni�o Da Serra', 432235, 23, 1487, 11.35, 'uni�o-serrense', 130.99);
INSERT INTO tb_cidades VALUES (4390, 'Uruguaiana', 432240, 23, 125435, 21.95, 'uruguaianense', 5715.791);
INSERT INTO tb_cidades VALUES (4393, 'Vale Real', 432254, 23, 5118, 113.52, 'vale-realense', 45.085);
INSERT INTO tb_cidades VALUES (4395, 'Vanini', 432255, 23, 1984, 30.58, 'vaninense', 64.873);
INSERT INTO tb_cidades VALUES (4397, 'Vera Cruz', 432270, 23, 23983, 77.46, 'vera-cruzense', 309.622);
INSERT INTO tb_cidades VALUES (4399, 'Vespasiano Correa', 432285, 23, 1974, 17.33, 'vespasianense', 113.886);
INSERT INTO tb_cidades VALUES (4402, 'Vicente Dutra', 432310, 23, 5285, 27.1, 'dutrense', 195.045);
INSERT INTO tb_cidades VALUES (4403, 'Victor Graeff', 432320, 23, 3036, 12.74, 'victorense', 238.274);
INSERT INTO tb_cidades VALUES (4405, 'Vila L�ngaro', 432335, 23, 2152, 14.14, 'vila-langarense', 152.172);
INSERT INTO tb_cidades VALUES (4407, 'Vila Nova Do Sul', 432345, 23, 4221, 8.31, 'vila-novense', 507.945);
INSERT INTO tb_cidades VALUES (4410, 'Vista Ga�cha', 432370, 23, 2759, 31.1, 'vista-gauchense', 88.719);
INSERT INTO tb_cidades VALUES (4413, 'Xangri L�', 432380, 23, 12434, 204.88, 'xangri-laense', 60.688);
INSERT INTO tb_cidades VALUES (4415, 'Abelardo Luz', 420010, 24, 17100, 17.9, 'abelardo-lusense-', 955.375);
INSERT INTO tb_cidades VALUES (4417, 'Agron�mica', 420030, 24, 4904, 37.73, 'agronomense', 129.993);
INSERT INTO tb_cidades VALUES (4419, '�guas De Chapec�', 420050, 24, 6110, 43.92, 'chapecoense-das-�guas', 139.13);
INSERT INTO tb_cidades VALUES (4422, 'Alfredo Wagner', 420070, 24, 9410, 12.85, 'alfredense', 732.278);
INSERT INTO tb_cidades VALUES (4424, 'Anchieta', 420080, 24, 6380, 27.91, 'anchietense', 228.581);
INSERT INTO tb_cidades VALUES (4426, 'Anita Garibaldi', 420100, 24, 8623, 14.65, 'anita-garibaldense', 588.614);
INSERT INTO tb_cidades VALUES (4429, 'Api�na', 420125, 24, 9600, 19.45, 'apiunense', 493.53);
INSERT INTO tb_cidades VALUES (4431, 'Araquari', 420130, 24, 24810, 64.25, 'araquariense', 386.135);
INSERT INTO tb_cidades VALUES (4434, 'Arroio Trinta', 420160, 24, 3502, 37.12, 'arroio-trintense', 94.334);
INSERT INTO tb_cidades VALUES (4436, 'Ascurra', 420170, 24, 7412, 66.37, 'ascurrense', 111.673);
INSERT INTO tb_cidades VALUES (4438, 'Aurora', 420190, 24, 5549, 26.81, 'aurorense', 206.948);
INSERT INTO tb_cidades VALUES (4440, 'Balne�rio Barra Do Sul', 420205, 24, 8430, 76.28, 'barrassulense', 110.512);
INSERT INTO tb_cidades VALUES (4443, 'Balne�reo Pi�arras', 421280, 24, 17078, 171.82, 'pi�arrense', 99.395);
INSERT INTO tb_cidades VALUES (4446, 'Barra Velha', 420210, 24, 22386, 159.7, 'barra-velhense', 140.177);
INSERT INTO tb_cidades VALUES (4448, 'Belmonte', 420215, 24, 2635, 28.15, 'belmontense', 93.607);
INSERT INTO tb_cidades VALUES (4450, 'Bigua�u', 420230, 24, 58206, 155.44, 'bigua�uense', 374.45);
INSERT INTO tb_cidades VALUES (4452, 'Bocaina Do Sul', 420243, 24, 3290, 6.41, 'bocainense', 513.045);
INSERT INTO tb_cidades VALUES (4455, 'Bom Jesus Do Oeste', 420257, 24, 2132, 31.4, 'bonjesuense', 67.899);
INSERT INTO tb_cidades VALUES (4458, 'Botuver�', 420270, 24, 4468, 14.74, 'botuveraense', 303.024);
INSERT INTO tb_cidades VALUES (4460, 'Bra�o Do Trombudo', 420285, 24, 3457, 38.55, 'bra�o trombudense', 89.681);
INSERT INTO tb_cidades VALUES (4462, 'Brusque', 420290, 24, 105503, 372.22, 'brusquense', 283.446);
INSERT INTO tb_cidades VALUES (4465, 'Calmon', 420315, 24, 3387, 5.3, 'calmonense', 639.532);
INSERT INTO tb_cidades VALUES (4467, 'Campo Alegre', 420330, 24, 11748, 23.68, 'campo-alegrense', 496.149);
INSERT INTO tb_cidades VALUES (4469, 'Campo Er�', 420350, 24, 9370, 19.57, 'campo-erense', 478.734);
INSERT INTO tb_cidades VALUES (4472, 'Canoinhas', 420380, 24, 52765, 46.09, 'canoinhense', 1144.838);
INSERT INTO tb_cidades VALUES (4474, 'Capinzal', 420390, 24, 20769, 85.15, 'capinzalense', 243.9);
INSERT INTO tb_cidades VALUES (4476, 'Catanduvas', 420400, 24, 9555, 48.25, 'catanduvense', 198.034);
INSERT INTO tb_cidades VALUES (4478, 'Celso Ramos', 420415, 24, 2771, 13.36, 'celso-ramense', 207.409);
INSERT INTO tb_cidades VALUES (4480, 'Chapad�o Do Lageado', 420419, 24, 2762, 22.19, 'lageadense', 124.472);
INSERT INTO tb_cidades VALUES (4483, 'Conc�rdia', 420430, 24, 68621, 86.07, 'concordense', 797.264);
INSERT INTO tb_cidades VALUES (4485, 'Coronel Freitas', 420440, 24, 10213, 43.62, 'freitense ou freitano', 234.16);
INSERT INTO tb_cidades VALUES (4487, 'Correia Pinto', 420455, 24, 14785, 22.69, 'correia-pintense', 651.616);
INSERT INTO tb_cidades VALUES (4490, 'Cunha Por�', 420470, 24, 10613, 48.18, 'cunha-porense', 220.293);
INSERT INTO tb_cidades VALUES (4492, 'Curitibanos', 420480, 24, 37748, 39.64, 'curitibanense', 952.285);
INSERT INTO tb_cidades VALUES (4494, 'Dion�sio Cerqueira', 420500, 24, 14811, 39.21, 'cerqueirense', 377.715);
INSERT INTO tb_cidades VALUES (4497, 'Entre Rios', 420517, 24, 3018, 28.7, 'entrerriense', 105.167);
INSERT INTO tb_cidades VALUES (4500, 'Faxinal Dos Guedes', 420530, 24, 10661, 31.39, 'faxinalense', 339.639);
INSERT INTO tb_cidades VALUES (4502, 'Florian�polis', 420540, 24, 421240, 627.24, 'florianopolitano', 671.578);
INSERT INTO tb_cidades VALUES (4504, 'Forquilhinha', 420545, 24, 22548, 123.95, 'forquilhense', 181.915);
INSERT INTO tb_cidades VALUES (4507, 'Galv�o', 420560, 24, 3472, 28.48, 'galv�oense', 121.899);
INSERT INTO tb_cidades VALUES (4509, 'Garuva', 420580, 24, 14761, 29.44, 'garuvense', 501.378);
INSERT INTO tb_cidades VALUES (4511, 'Governador Celso Ramos', 420600, 24, 12999, 111.42, 'gancheiro', 116.668);
INSERT INTO tb_cidades VALUES (4514, 'Guabiruba', 420630, 24, 18430, 106.17, 'guabirubense', 173.591);
INSERT INTO tb_cidades VALUES (4516, 'Guaramirim', 420650, 24, 35172, 131.18, 'guaramirense', 268.12);
INSERT INTO tb_cidades VALUES (4518, 'Guatamb�', 420665, 24, 4679, 22.85, 'guatumbuense', 204.759);
INSERT INTO tb_cidades VALUES (4521, 'Ibicar�', 420680, 24, 3373, 21.61, 'ibicareense', 156.073);
INSERT INTO tb_cidades VALUES (4523, 'I�ara', 420700, 24, 58833, 200.02, 'i�arense', 294.132);
INSERT INTO tb_cidades VALUES (4525, 'Imaru�', 420720, 24, 11672, 21.53, 'imaruense', 542.238);
INSERT INTO tb_cidades VALUES (4530, 'Ipira', 420760, 24, 4752, 30.57, 'ipirense', 155.449);
INSERT INTO tb_cidades VALUES (4531, 'Ipor� Do Oeste', 420765, 24, 8409, 41.55, 'ipor�-oestino', 202.369);
INSERT INTO tb_cidades VALUES (4534, 'Iraceminha', 420775, 24, 4253, 25.87, 'iraceminhense', 164.376);
INSERT INTO tb_cidades VALUES (4536, 'Irati', 420785, 24, 2096, 27.04, 'iratiense', 77.518);
INSERT INTO tb_cidades VALUES (4539, 'Itai�polis', 420810, 24, 20301, 15.67, 'itaiopolense', 1295.321);
INSERT INTO tb_cidades VALUES (4541, 'Itapema', 420830, 24, 45797, 771.5, 'itapemense', 59.361);
INSERT INTO tb_cidades VALUES (4543, 'Itapo�', 420845, 24, 14763, 57.73, 'itapoaense', 255.746);
INSERT INTO tb_cidades VALUES (4546, 'Jacinto Machado', 420870, 24, 10609, 24.74, 'jacinto-machadense', 428.767);
INSERT INTO tb_cidades VALUES (4548, 'Jaragu� Do Sul', 420890, 24, 143123, 268.73, 'jaraguaense', 532.593);
INSERT INTO tb_cidades VALUES (4550, 'Joa�aba', 420900, 24, 27020, 116.29, 'joa�abense', 232.354);
INSERT INTO tb_cidades VALUES (4553, 'Jupi�', 420917, 24, 2148, 23.42, 'jupiaense', 91.71);
INSERT INTO tb_cidades VALUES (4555, 'Lages', 420930, 24, 156727, 59.6, 'lageano', 2629.789);
INSERT INTO tb_cidades VALUES (4557, 'Lajeado Grande', 420945, 24, 1490, 22.6, 'lajeado grandense', 65.928);
INSERT INTO tb_cidades VALUES (4560, 'Lebon R�gis', 420970, 24, 11838, 12.58, 'lebon-regense', 940.659);
INSERT INTO tb_cidades VALUES (4562, 'Lind�ia Do Sul', 420985, 24, 4642, 24.49, 'lindoiense', 189.57);
INSERT INTO tb_cidades VALUES (4565, 'Luzerna', 421003, 24, 5600, 47.93, 'luzernense', 116.832);
INSERT INTO tb_cidades VALUES (4567, 'Mafra', 421010, 24, 52912, 37.68, 'mafrense', 1404.21);
INSERT INTO tb_cidades VALUES (4569, 'Major Vieira', 421030, 24, 7479, 14.22, 'major-vieirense', 525.99);
INSERT INTO tb_cidades VALUES (4572, 'Marema', 421055, 24, 2203, 21.26, 'maremense', 103.615);
INSERT INTO tb_cidades VALUES (4574, 'Matos Costa', 421070, 24, 2839, 6.57, 'matos-costense', 432.179);
INSERT INTO tb_cidades VALUES (4576, 'Mirim Doce', 421085, 24, 2513, 7.47, 'mirindocense', 336.315);
INSERT INTO tb_cidades VALUES (4578, 'Monda�', 421100, 24, 10231, 50.91, 'mondaiense', 200.979);
INSERT INTO tb_cidades VALUES (4580, 'Monte Castelo', 421110, 24, 8346, 14.86, 'monte-castelense', 561.733);
INSERT INTO tb_cidades VALUES (4583, 'Navegantes', 421130, 24, 60556, 543.29, 'navegantino', 111.462);
INSERT INTO tb_cidades VALUES (4585, 'Nova Itaberaba', 421145, 24, 4267, 31.01, 'nova itaberadense', 137.583);
INSERT INTO tb_cidades VALUES (4588, 'Novo Horizonte', 421165, 24, 2750, 18.13, 'novo-horizontino', 151.674);
INSERT INTO tb_cidades VALUES (4590, 'Otac�lio Costa', 421175, 24, 16337, 19.3, 'otaciliense', 846.58);
INSERT INTO tb_cidades VALUES (4593, 'Paial', 421187, 24, 1763, 20.56, 'paialense', 85.761);
INSERT INTO tb_cidades VALUES (4595, 'Palho�a', 421190, 24, 137334, 347.68, 'palhocense', 395);
INSERT INTO tb_cidades VALUES (4597, 'Palmeira', 421205, 24, 2373, 8.12, 'palmeirense', 292.217);
INSERT INTO tb_cidades VALUES (4600, 'Para�so', 421223, 24, 4080, 22.84, 'paraisense', 178.608);
INSERT INTO tb_cidades VALUES (4602, 'Passos Maia', 421227, 24, 4425, 7.2, 'passosmaiense', 614.434);
INSERT INTO tb_cidades VALUES (4604, 'Pedras Grandes', 421240, 24, 4107, 23.9, 'pedras-grandense', 171.824);
INSERT INTO tb_cidades VALUES (4607, 'Petrol�ndia', 421270, 24, 6131, 20.03, 'petrolandense', 306.153);
INSERT INTO tb_cidades VALUES (4609, 'Pinheiro Preto', 421300, 24, 3147, 47.9, 'pinheirense', 65.706);
INSERT INTO tb_cidades VALUES (4611, 'Planalto Alegre', 421315, 24, 2654, 42.37, 'planaltoalegrense', 62.633);
INSERT INTO tb_cidades VALUES (4614, 'Ponte Alta Do Norte', 421335, 24, 3303, 8.24, 'norte pontealtense', 400.974);
INSERT INTO tb_cidades VALUES (4616, 'Porto Belo', 421350, 24, 16083, 167.82, 'porto-belense', 95.835);
INSERT INTO tb_cidades VALUES (4618, 'Pouso Redondo', 421370, 24, 14810, 41.19, 'pouso-redondense', 359.519);
INSERT INTO tb_cidades VALUES (4621, 'Presidente Get�lio', 421400, 24, 14887, 50.35, 'getulense', 295.65);
INSERT INTO tb_cidades VALUES (4623, 'Princesa', 421415, 24, 2758, 31.99, 'princesense', 86.215);
INSERT INTO tb_cidades VALUES (4625, 'Rancho Queimado', 421430, 24, 2748, 9.59, 'rancho-queimadense', 286.433);
INSERT INTO tb_cidades VALUES (4628, 'Rio Do Oeste', 421460, 24, 7090, 28.86, 'riense-do-oeste', 245.635);
INSERT INTO tb_cidades VALUES (4630, 'Rio Dos Cedros', 421470, 24, 10284, 18.51, 'rio-cedrense', 555.657);
INSERT INTO tb_cidades VALUES (4633, 'Rio Rufino', 421505, 24, 2436, 8.62, 'rio rufinense', 282.569);
INSERT INTO tb_cidades VALUES (4635, 'Rodeio', 421510, 24, 10922, 85.24, 'rodeiense', 128.136);
INSERT INTO tb_cidades VALUES (4638, 'Saltinho', 421535, 24, 3961, 25.3, 'saltinhense', 156.531);
INSERT INTO tb_cidades VALUES (4640, 'Sang�o', 421545, 24, 10400, 125.22, 'sang�oense', 83.055);
INSERT INTO tb_cidades VALUES (4642, 'Santa Helena', 421555, 24, 2382, 29.41, 'santaelenense', 80.983);
INSERT INTO tb_cidades VALUES (4644, 'Santa Rosa Do Sul', 421565, 24, 8054, 53.18, 'santa-rosense', 151.445);
INSERT INTO tb_cidades VALUES (4647, 'Santiago Do Sul', 421569, 24, 1465, 19.91, 'santiaguense', 73.564);
INSERT INTO tb_cidades VALUES (4827, 'Asp�sia', 350395, 26, 1809, 26.09, 'aspasiense', 69.337);
INSERT INTO tb_cidades VALUES (4649, 'S�o Bento Do Sul', 421580, 24, 74801, 150.94, 's�o-bentense', 495.577);
INSERT INTO tb_cidades VALUES (4652, 'S�o Carlos', 421600, 24, 10291, 64.73, 's�o-carlense', 158.989);
INSERT INTO tb_cidades VALUES (4654, 'S�o Domingos', 421610, 24, 9491, 24.74, 'dominguense', 383.652);
INSERT INTO tb_cidades VALUES (4656, 'S�o Jo�o Batista', 421630, 24, 26260, 118.97, 'batistense', 220.727);
INSERT INTO tb_cidades VALUES (4657, 'S�o Jo�o Do Itaperi�', 421635, 24, 3435, 22.61, 'itaperiuense', 151.926);
INSERT INTO tb_cidades VALUES (4659, 'S�o Jo�o Do Sul', 421640, 24, 7002, 38.33, 'jo�o-sulense', 182.694);
INSERT INTO tb_cidades VALUES (4662, 'S�o Jos� Do Cedro', 421670, 24, 13684, 48.94, 'cedrense', 279.583);
INSERT INTO tb_cidades VALUES (4664, 'S�o Louren�o Do Oeste', 421690, 24, 21792, 60.24, 'lourencense ou lourenciano', 361.766);
INSERT INTO tb_cidades VALUES (4666, 'S�o Martinho', 421710, 24, 3209, 14.29, 's�o-martinhense', 224.53);
INSERT INTO tb_cidades VALUES (4669, 'S�o Pedro De Alc�ntara', 421725, 24, 4704, 33.69, 'alcantarense', 139.636);
INSERT INTO tb_cidades VALUES (4672, 'Seara', 421750, 24, 16936, 54.19, 'searaense', 312.541);
INSERT INTO tb_cidades VALUES (4674, 'Sider�polis', 421760, 24, 12998, 49.48, 'sideropolitano', 262.718);
INSERT INTO tb_cidades VALUES (4676, 'Sul Brasil', 421775, 24, 2766, 24.54, 'sul brasilense', 112.7);
INSERT INTO tb_cidades VALUES (4679, 'Tigrinhos', 421795, 24, 1757, 30.59, 'tigrinhense', 57.439);
INSERT INTO tb_cidades VALUES (4681, 'Timb� Do Sul', 421810, 24, 5308, 15.91, 'timbeense', 333.58);
INSERT INTO tb_cidades VALUES (4683, 'Timb� Grande', 421825, 24, 7167, 12.01, 'timb�-grandense', 596.939);
INSERT INTO tb_cidades VALUES (4686, 'Treze De Maio', 421840, 24, 6876, 42.69, 'treze-maioense', 161.079);
INSERT INTO tb_cidades VALUES (4688, 'Trombudo Central', 421860, 24, 6553, 60.27, 'trombudense', 108.728);
INSERT INTO tb_cidades VALUES (4691, 'Turvo', 421880, 24, 11854, 50.72, 'turvense', 233.702);
INSERT INTO tb_cidades VALUES (4693, 'Urubici', 421890, 24, 10699, 10.5, 'urubiciense', 1019.236);
INSERT INTO tb_cidades VALUES (4695, 'Urussanga', 421900, 24, 20223, 84.1, 'urussanguense', 240.477);
INSERT INTO tb_cidades VALUES (4698, 'Vargem Bonita', 421917, 24, 4793, 16.05, 'vargembonitense', 298.611);
INSERT INTO tb_cidades VALUES (4700, 'Videira', 421930, 24, 47188, 124.88, 'videirense', 377.853);
INSERT INTO tb_cidades VALUES (4702, 'Witmarsum', 421940, 24, 3600, 23.87, 'witmarsumense', 150.798);
INSERT INTO tb_cidades VALUES (4704, 'Xavantina', 421960, 24, 4142, 19.26, 'xavantinense', 215.072);
INSERT INTO tb_cidades VALUES (4707, 'Amparo De S�o Francisco', 280010, 25, 2275, 64.75, 'amparense', 35.133);
INSERT INTO tb_cidades VALUES (4709, 'Aracaju', 280030, 25, 571149, 3.14, 'aracajuano', 181.856);
INSERT INTO tb_cidades VALUES (4711, 'Areia Branca', 280050, 25, 16857, 114.93, 'areia-branquense', 146.677);
INSERT INTO tb_cidades VALUES (4714, 'Brejo Grande', 280070, 25, 7742, 52.01, 'brejo-grandense', 148.857);
INSERT INTO tb_cidades VALUES (4716, 'Canhoba', 280110, 25, 3956, 23.23, 'canhobense', 170.288);
INSERT INTO tb_cidades VALUES (4719, 'Carira', 280140, 25, 20007, 31.44, 'carirense', 636.4);
INSERT INTO tb_cidades VALUES (4721, 'Cedro De S�o Jo�o', 280160, 25, 5633, 67.29, 'cedrense', 83.71);
INSERT INTO tb_cidades VALUES (4723, 'Cumbe', 280190, 25, 3813, 29.65, 'cumbense', 128.596);
INSERT INTO tb_cidades VALUES (4725, 'Est�ncia', 280210, 25, 64409, 100, 'estanciano', 644.08);
INSERT INTO tb_cidades VALUES (4728, 'Gararu', 280240, 25, 11405, 17.41, 'gararuense', 654.991);
INSERT INTO tb_cidades VALUES (4730, 'Gracho Cardoso', 280260, 25, 5645, 23.32, 'gracho-cardosense', 242.061);
INSERT INTO tb_cidades VALUES (4732, 'Indiaroba', 280280, 25, 15831, 50.49, 'indiarobense', 313.523);
INSERT INTO tb_cidades VALUES (4735, 'Itabi', 280310, 25, 4972, 26.96, 'itabiense', 184.422);
INSERT INTO tb_cidades VALUES (4737, 'Japaratuba', 280330, 25, 16864, 46.22, 'japaratubense', 364.897);
INSERT INTO tb_cidades VALUES (4739, 'Lagarto', 280350, 25, 94861, 97.84, 'lagartense', 969.573);
INSERT INTO tb_cidades VALUES (4742, 'Malhada Dos Bois', 280380, 25, 3456, 54.68, 'malhadense', 63.199);
INSERT INTO tb_cidades VALUES (4744, 'Maruim', 280400, 25, 16343, 174.29, 'maruinense', 93.77);
INSERT INTO tb_cidades VALUES (4746, 'Monte Alegre De Sergipe', 280420, 25, 13627, 33.45, 'monte-alegrense', 407.406);
INSERT INTO tb_cidades VALUES (4749, 'Nossa Senhora Aparecida', 280445, 25, 8508, 25, 'aparecidense', 340.378);
INSERT INTO tb_cidades VALUES (4751, 'Nossa Senhora Das Dores', 280460, 25, 24580, 50.85, 'dorense', 483.347);
INSERT INTO tb_cidades VALUES (4754, 'Pacatuba', 280490, 25, 13137, 35.14, 'pacatubense', 373.816);
INSERT INTO tb_cidades VALUES (4756, 'Pedrinhas', 280510, 25, 8833, 260.25, 'pedrinhense', 33.941);
INSERT INTO tb_cidades VALUES (4759, 'Po�o Redondo', 280540, 25, 30880, 25.06, 'po�o-redondense', 1232.117);
INSERT INTO tb_cidades VALUES (4761, 'Porto Da Folha', 280560, 25, 27146, 30.94, 'porto-folhense', 877.297);
INSERT INTO tb_cidades VALUES (4763, 'Riach�o Do Dantas', 280580, 25, 19386, 36.48, 'riach�oense', 531.472);
INSERT INTO tb_cidades VALUES (4766, 'Ros�rio Do Catete', 280610, 25, 9221, 87.27, 'rosarense', 105.66);
INSERT INTO tb_cidades VALUES (4768, 'Santa Luzia Do Itanhy', 280630, 25, 12969, 39.36, 'santa-luziense', 329.502);
INSERT INTO tb_cidades VALUES (4771, 'Santo Amaro Das Brotas', 280660, 25, 11410, 48.73, 'brotense', 234.155);
INSERT INTO tb_cidades VALUES (4773, 'S�o Domingos', 280680, 25, 10271, 100.23, 's�o-dominguense', 102.47);
INSERT INTO tb_cidades VALUES (4776, 'Sim�o Dias', 280710, 25, 38702, 68.54, 'sim�o-diense', 564.688);
INSERT INTO tb_cidades VALUES (4778, 'Telha', 280730, 25, 2957, 60.31, 'telhense', 49.026);
INSERT INTO tb_cidades VALUES (4780, 'Tomar Do Geru', 280750, 25, 12855, 42.16, 'geruense', 304.903);
INSERT INTO tb_cidades VALUES (4782, 'Adamantina', 350010, 26, 33797, 82.16, 'adamantinense', 411.355);
INSERT INTO tb_cidades VALUES (4783, 'Adolfo', 350020, 26, 3557, 16.85, 'adolfino', 211.077);
INSERT INTO tb_cidades VALUES (4785, '�guas Da Prata', 350040, 26, 7584, 53.05, 'pratense', 142.961);
INSERT INTO tb_cidades VALUES (4787, '�guas De Santa B�rbara', 350055, 26, 5601, 13.73, 'santa-barbarense', 408.024);
INSERT INTO tb_cidades VALUES (4790, 'Alambari', 350075, 26, 4884, 30.66, 'alambariense', 159.271);
INSERT INTO tb_cidades VALUES (4792, 'Altair', 350090, 26, 3815, 12.16, 'altairense', 313.858);
INSERT INTO tb_cidades VALUES (4795, 'Alum�nio', 350115, 26, 16839, 200.92, 'aluminense', 83.808);
INSERT INTO tb_cidades VALUES (4796, '�lvares Florence', 350120, 26, 3897, 10.74, 'alvares florencense', 362.941);
INSERT INTO tb_cidades VALUES (4799, 'Alvinl�ndia', 350150, 26, 3000, 35.38, 'alvinlandense', 84.803);
INSERT INTO tb_cidades VALUES (4801, 'Am�rico Brasiliense', 350170, 26, 34478, 281.99, 'am�rico-brasiliense', 122.268);
INSERT INTO tb_cidades VALUES (4804, 'Anal�ndia', 350200, 26, 4293, 13.16, 'analandense', 326.281);
INSERT INTO tb_cidades VALUES (4806, 'Angatuba', 350220, 26, 22210, 21.61, 'angatubense ', 1027.985);
INSERT INTO tb_cidades VALUES (4809, 'Aparecida', 350250, 26, 35007, 289.12, 'aparecidense', 121.083);
INSERT INTO tb_cidades VALUES (4811, 'Apia�', 350270, 26, 25191, 25.85, 'apiaiense', 974.324);
INSERT INTO tb_cidades VALUES (4813, 'Ara�atuba', 350280, 26, 181579, 155.54, 'ara�atubense', 1167.436);
INSERT INTO tb_cidades VALUES (4815, 'Aramina', 350300, 26, 5152, 25.39, 'araminense', 202.887);
INSERT INTO tb_cidades VALUES (4818, 'Araraquara', 350320, 26, 208662, 207.8, 'araraquarense', 1004.144);
INSERT INTO tb_cidades VALUES (4820, 'Arco �ris', 350335, 26, 1925, 7.27, 'arcoirense', 264.733);
INSERT INTO tb_cidades VALUES (4822, 'Areias', 350350, 26, 3696, 12.11, 'areiense', 305.227);
INSERT INTO tb_cidades VALUES (4824, 'Ariranha', 350370, 26, 8547, 64.19, 'ariranhense', 133.15);
INSERT INTO tb_cidades VALUES (4829, 'Atibaia', 350410, 26, 126603, 264.61, 'atibaiano', 478.448);
INSERT INTO tb_cidades VALUES (4831, 'Ava�', 350430, 26, 4959, 9.18, 'avaiense', 540.46);
INSERT INTO tb_cidades VALUES (4834, 'Bady Bassitt', 350460, 26, 14603, 134.54, 'badiense', 108.543);
INSERT INTO tb_cidades VALUES (4836, 'B�lsamo', 350480, 26, 8160, 54.18, 'balsamense', 150.602);
INSERT INTO tb_cidades VALUES (4838, 'Bar�o De Antonina', 350500, 26, 3116, 20.35, 'bar�oense', 153.141);
INSERT INTO tb_cidades VALUES (4841, 'Barra Bonita', 350530, 26, 35246, 235.12, 'barra-bonitense', 149.906);
INSERT INTO tb_cidades VALUES (4843, 'Barra Do Turvo', 350540, 26, 7729, 7.67, 'barra-turvense', 1007.821);
INSERT INTO tb_cidades VALUES (4846, 'Barueri', 350570, 26, 240749, 3.639, 'barueriense', 66.141);
INSERT INTO tb_cidades VALUES (4848, 'Batatais', 350590, 26, 56476, 66.48, 'batataense', 849.526);
INSERT INTO tb_cidades VALUES (4850, 'Bebedouro', 350610, 26, 75035, 109.81, 'bebedourense', 683.299);
INSERT INTO tb_cidades VALUES (4852, 'Bernardino De Campos', 350630, 26, 10775, 44.12, 'bernardinense', 244.198);
INSERT INTO tb_cidades VALUES (4855, 'Birigui', 350650, 26, 108728, 204.79, 'biriguiense', 530.922);
INSERT INTO tb_cidades VALUES (4857, 'Boa Esperan�a Do Sul', 350670, 26, 13645, 19.75, 'boa-esperancense', 690.763);
INSERT INTO tb_cidades VALUES (4860, 'Boituva', 350700, 26, 48314, 194.07, 'boituvense', 248.954);
INSERT INTO tb_cidades VALUES (4862, 'Bom Sucesso De Itarar�', 350715, 26, 3571, 26.73, 'bom sucessiense', 133.578);
INSERT INTO tb_cidades VALUES (4865, 'Borborema', 350740, 26, 14529, 26.31, 'borboremense', 552.257);
INSERT INTO tb_cidades VALUES (4867, 'Botucatu', 350750, 26, 127328, 85.88, 'botucatuense', 1482.643);
INSERT INTO tb_cidades VALUES (4869, 'Bra�na', 350770, 26, 5021, 25.7, 'braunense', 195.332);
INSERT INTO tb_cidades VALUES (4872, 'Brotas', 350790, 26, 21580, 19.59, 'brotense', 1101.385);
INSERT INTO tb_cidades VALUES (4874, 'Buritama', 350810, 26, 15418, 47.19, 'buritamense', 326.756);
INSERT INTO tb_cidades VALUES (4876, 'Cabr�lia Paulista', 350830, 26, 4365, 18.19, 'cabraliense', 239.91);
INSERT INTO tb_cidades VALUES (4879, 'Cachoeira Paulista', 350860, 26, 30091, 104.49, 'cachoeirense', 287.99);
INSERT INTO tb_cidades VALUES (4881, 'Cafel�ndia', 350880, 26, 16607, 18.05, 'cafelandense', 920.096);
INSERT INTO tb_cidades VALUES (4883, 'Caieiras', 350900, 26, 86529, 894.84, 'caieirense', 96.698);
INSERT INTO tb_cidades VALUES (4886, 'Cajati', 350925, 26, 28372, 62.43, 'cajatiense', 454.436);
INSERT INTO tb_cidades VALUES (4888, 'Cajuru', 350940, 26, 23371, 35.41, 'cajuruense', 660.088);
INSERT INTO tb_cidades VALUES (4890, 'Campinas', 350950, 26, 1080113, 1.358, 'campineiro', 795.004);
INSERT INTO tb_cidades VALUES (4892, 'Campos Do Jord�o', 350970, 26, 47789, 164.49, 'jordanense', 290.52);
INSERT INTO tb_cidades VALUES (4895, 'Canas', 350995, 26, 4385, 82.33, 'canense', 53.261);
INSERT INTO tb_cidades VALUES (4897, 'C�ndido Rodrigues', 351010, 26, 2668, 37.94, 'c�ndido-rodriguense', 70.313);
INSERT INTO tb_cidades VALUES (4899, 'Cap�o Bonito', 351020, 26, 46178, 28.15, 'cap�o-bonitense', 1640.232);
INSERT INTO tb_cidades VALUES (4902, 'Caraguatatuba', 351050, 26, 100840, 207.76, 'caraguatatubense', 485.377);
INSERT INTO tb_cidades VALUES (4904, 'Cardoso', 351070, 26, 11805, 18.45, 'cardosense', 639.725);
INSERT INTO tb_cidades VALUES (4906, 'C�ssia Dos Coqueiros', 351090, 26, 2634, 13.74, 'cassiano', 191.683);
INSERT INTO tb_cidades VALUES (4909, 'Catigu�', 351120, 26, 7127, 48.03, 'catig�ense', 148.393);
INSERT INTO tb_cidades VALUES (4911, 'Cerqueira C�sar', 351140, 26, 17532, 34.48, 'cerqueirense', 508.53);
INSERT INTO tb_cidades VALUES (4912, 'Cerquilho', 351150, 26, 39617, 309.98, 'cerquilhense', 127.803);
INSERT INTO tb_cidades VALUES (4914, 'Charqueada', 351170, 26, 15085, 85.79, 'charqueadense', 175.843);
INSERT INTO tb_cidades VALUES (4917, 'Colina', 351200, 26, 17371, 41.11, 'colinense', 422.575);
INSERT INTO tb_cidades VALUES (4919, 'Conchal', 351220, 26, 25229, 138.02, 'conchalense', 182.793);
INSERT INTO tb_cidades VALUES (4921, 'Cordeir�polis', 351240, 26, 21080, 153.22, 'cordeiropolense', 137.579);
INSERT INTO tb_cidades VALUES (4923, 'Coronel Macedo', 351260, 26, 5001, 16.45, 'macedense', 303.932);
INSERT INTO tb_cidades VALUES (4926, 'Cosmorama', 351290, 26, 7214, 16.25, 'cosmoramense', 443.819);
INSERT INTO tb_cidades VALUES (4929, 'Cristais Paulista', 351320, 26, 7588, 19.7, 'cristalense', 385.23);
INSERT INTO tb_cidades VALUES (4931, 'Cruzeiro', 351340, 26, 77039, 252.01, 'cruzeirense', 305.699);
INSERT INTO tb_cidades VALUES (4933, 'Cunha', 351360, 26, 21866, 15.54, 'cunhense', 1407.319);
INSERT INTO tb_cidades VALUES (4936, 'Dirce Reis', 351385, 26, 1689, 19.12, 'dircense', 88.353);
INSERT INTO tb_cidades VALUES (4938, 'Dobrada', 351400, 26, 7939, 53.02, 'dobradense', 149.729);
INSERT INTO tb_cidades VALUES (4940, 'Dolcin�polis', 351420, 26, 2096, 26.76, 'dolcinopolense', 78.339);
INSERT INTO tb_cidades VALUES (4942, 'Dracena', 351440, 26, 43258, 88.64, 'dracenense', 488.042);
INSERT INTO tb_cidades VALUES (4945, 'Echapor�', 351470, 26, 6318, 12.26, 'echaporense', 515.427);
INSERT INTO tb_cidades VALUES (4947, 'Elias Fausto', 351490, 26, 15775, 77.83, 'elias-faustense', 202.693);
INSERT INTO tb_cidades VALUES (4949, 'Emba�ba', 351495, 26, 2423, 29.15, 'embaubense', 83.129);
INSERT INTO tb_cidades VALUES (4952, 'Emilian�polis', 351512, 26, 3020, 13.45, 'emilian�polense', 224.488);
INSERT INTO tb_cidades VALUES (4954, 'Esp�rito Santo Do Pinhal', 351518, 26, 41907, 107.61, 'pinhalense', 389.421);
INSERT INTO tb_cidades VALUES (4956, 'Estiva Gerbi', 355730, 26, 10044, 135.35, 'estivense', 74.208);
INSERT INTO tb_cidades VALUES (4959, 'Euclides Da Cunha Paulista', 351535, 26, 9585, 16.66, 'euclidense', 575.214);
INSERT INTO tb_cidades VALUES (4961, 'Fernando Prestes', 351560, 26, 5534, 32.43, 'fernando-prestense', 170.67);
INSERT INTO tb_cidades VALUES (4964, 'Ferraz De Vasconcelos', 351570, 26, 168306, 5.624, 'ferrazense', 29.922);
INSERT INTO tb_cidades VALUES (4967, 'Flor�nia', 351610, 26, 2829, 12.54, 'florineense', 225.634);
INSERT INTO tb_cidades VALUES (4969, 'Franca', 351620, 26, 318640, 526.09, 'francano', 605.681);
INSERT INTO tb_cidades VALUES (4971, 'Franco Da Rocha', 351640, 26, 131604, 981.28, 'franco-rochense', 134.114);
INSERT INTO tb_cidades VALUES (4974, 'Gar�a', 351670, 26, 43115, 77.6, 'garcense', 555.63);
INSERT INTO tb_cidades VALUES (4976, 'Gavi�o Peixoto', 351685, 26, 4419, 18.13, 'gavionense', 243.766);
INSERT INTO tb_cidades VALUES (4978, 'Getulina', 351700, 26, 10765, 15.86, 'getulinense', 678.701);
INSERT INTO tb_cidades VALUES (4981, 'Guaimb�', 351730, 26, 5425, 24.88, 'guaimbeense', 218.013);
INSERT INTO tb_cidades VALUES (4983, 'Guapia�u', 351750, 26, 17869, 54.81, 'guapia�uense', 326);
INSERT INTO tb_cidades VALUES (4985, 'Guar�', 351770, 26, 19858, 54.78, 'guaraense', 362.482);
INSERT INTO tb_cidades VALUES (4987, 'Guaraci', 351790, 26, 9976, 15.55, 'guaraciense', 641.501);
INSERT INTO tb_cidades VALUES (4990, 'Guararapes', 351820, 26, 30597, 31.99, 'guararapense', 956.345);
INSERT INTO tb_cidades VALUES (4992, 'Guaratinguet�', 351840, 26, 112072, 148.95, 'guaratinguetaense', 752.433);
INSERT INTO tb_cidades VALUES (4994, 'Guariba', 351860, 26, 35486, 131.29, 'guaribense', 270.289);
INSERT INTO tb_cidades VALUES (4997, 'Guatapar�', 351885, 26, 6966, 16.86, 'guataparaense', 413.06);
INSERT INTO tb_cidades VALUES (4999, 'Hercul�ndia', 351900, 26, 8696, 23.85, 'herculandense', 364.641);
INSERT INTO tb_cidades VALUES (5001, 'Hortol�ndia', 351907, 26, 192692, 3.082, 'hortolandense', 62.503);
INSERT INTO tb_cidades VALUES (5004, 'Iaras', 351925, 26, 6376, 15.89, 'iarense', 401.308);
INSERT INTO tb_cidades VALUES (5006, 'Ibir�', 351940, 26, 10896, 40.07, 'ibiraense', 271.912);
INSERT INTO tb_cidades VALUES (5008, 'Ibitinga', 351960, 26, 53158, 77.12, 'ibitinguense', 689.25);
INSERT INTO tb_cidades VALUES (5011, 'Iep�', 351990, 26, 7628, 12.81, 'iepense', 595.485);
INSERT INTO tb_cidades VALUES (5013, 'Igarapava', 352010, 26, 27952, 59.7, 'igarapavense', 468.246);
INSERT INTO tb_cidades VALUES (5015, 'Iguape', 352030, 26, 28841, 14.59, 'iguapense', 1977.414);
INSERT INTO tb_cidades VALUES (5017, 'Ilha Solteira', 352044, 26, 25064, 38.19, 'ilhense', 656.225);
INSERT INTO tb_cidades VALUES (5020, 'Indiana', 352060, 26, 4825, 38.1, 'indianense', 126.624);
INSERT INTO tb_cidades VALUES (5022, 'In�bia Paulista', 352080, 26, 3630, 41.53, 'inubense', 87.414);
INSERT INTO tb_cidades VALUES (5025, 'Ipe�na', 352110, 26, 6016, 31.66, 'ipeunense', 190.01);
INSERT INTO tb_cidades VALUES (5027, 'Iporanga', 352120, 26, 4299, 3.73, 'iporanguense', 1152.05);
INSERT INTO tb_cidades VALUES (5029, 'Iracem�polis', 352140, 26, 20029, 173.99, 'iracemapolense', 115.118);
INSERT INTO tb_cidades VALUES (5032, 'Itaber�', 352170, 26, 17858, 16.5, 'itaberense', 1082.106);
INSERT INTO tb_cidades VALUES (5034, 'Itajobi', 352190, 26, 14556, 28.99, 'itajobiense', 502.066);
INSERT INTO tb_cidades VALUES (5036, 'Itanha�m', 352210, 26, 87057, 145.2, 'itanhaense', 599.581);
INSERT INTO tb_cidades VALUES (5038, 'Itapecerica Da Serra', 352220, 26, 152614, 1.015, 'itapecericano', 150.298);
INSERT INTO tb_cidades VALUES (5041, 'Itapevi', 352250, 26, 200769, 2.415, 'itapeviense', 83.107);
INSERT INTO tb_cidades VALUES (5042, 'Itapira', 352260, 26, 68537, 132.21, 'itapirense', 518.385);
INSERT INTO tb_cidades VALUES (5045, 'Itaporanga', 352280, 26, 14549, 28.66, 'itaporanguense', 507.706);
INSERT INTO tb_cidades VALUES (5047, 'Itapura', 352300, 26, 4357, 14.46, 'itapurense', 301.368);
INSERT INTO tb_cidades VALUES (5049, 'Itarar�', 352320, 26, 47934, 47.76, 'itarareense', 1003.581);
INSERT INTO tb_cidades VALUES (5051, 'Itatiba', 352340, 26, 101471, 314.92, 'itatibense', 322.211);
INSERT INTO tb_cidades VALUES (5053, 'Itirapina', 352360, 26, 15524, 27.52, 'itirapinense', 564.183);
INSERT INTO tb_cidades VALUES (5056, 'Itu', 352390, 26, 154147, 240.57, 'ituano', 640.757);
INSERT INTO tb_cidades VALUES (5058, 'Ituverava', 352410, 26, 38695, 54.87, 'ituveravense', 705.236);
INSERT INTO tb_cidades VALUES (5060, 'Jaboticabal', 352430, 26, 71662, 101.42, 'jaboticabalense', 706.603);
INSERT INTO tb_cidades VALUES (5062, 'Jaci', 352450, 26, 5657, 38.87, 'jaciense', 145.524);
INSERT INTO tb_cidades VALUES (5065, 'Jales', 352480, 26, 47012, 127.57, 'jalesense', 368.52);
INSERT INTO tb_cidades VALUES (5067, 'Jandira', 352500, 26, 108344, 6.124, 'jandirense', 17.69);
INSERT INTO tb_cidades VALUES (5069, 'Jarinu', 352520, 26, 23847, 114.85, 'jarinuense', 207.64);
INSERT INTO tb_cidades VALUES (5072, 'Joan�polis', 352550, 26, 11768, 31.37, 'joanopolitano', 375.095);
INSERT INTO tb_cidades VALUES (5074, 'Jos� Bonif�cio', 352570, 26, 32763, 38.1, 'bonifacense', 859.948);
INSERT INTO tb_cidades VALUES (5076, 'Jumirim', 352585, 26, 2798, 49.36, 'jumirense', 56.685);
INSERT INTO tb_cidades VALUES (5078, 'Junqueir�polis', 352600, 26, 18726, 32.12, 'junqueiropolense', 582.959);
INSERT INTO tb_cidades VALUES (5081, 'Lagoinha', 352630, 26, 4841, 18.95, 'lagoinhense', 255.472);
INSERT INTO tb_cidades VALUES (5083, 'Lav�nia', 352650, 26, 8779, 16.33, 'lavinense', 537.733);
INSERT INTO tb_cidades VALUES (5086, 'Len��is Paulista', 352680, 26, 61428, 75.88, 'len�oiense', 809.493);
INSERT INTO tb_cidades VALUES (5088, 'Lind�ia', 352700, 26, 6712, 137.67, 'lindoiano', 48.756);
INSERT INTO tb_cidades VALUES (5091, 'Lourdes', 352725, 26, 2128, 18.71, 'lourdense', 113.743);
INSERT INTO tb_cidades VALUES (5093, 'Luc�lia', 352740, 26, 19882, 63.16, 'luceliense', 314.785);
INSERT INTO tb_cidades VALUES (5095, 'Lu�s Ant�nio', 352760, 26, 11286, 18.86, 'lu�s-antoniense', 598.439);
INSERT INTO tb_cidades VALUES (5098, 'Lut�cia', 352790, 26, 2714, 5.71, 'luteciano', 474.925);
INSERT INTO tb_cidades VALUES (5100, 'Macaubal', 352810, 26, 7663, 30.88, 'macaubalense', 248.125);
INSERT INTO tb_cidades VALUES (5102, 'Magda', 352830, 26, 3200, 10.27, 'magdense', 311.712);
INSERT INTO tb_cidades VALUES (5104, 'Mairipor�', 352850, 26, 80956, 252.25, 'mairiporense', 320.93);
INSERT INTO tb_cidades VALUES (5106, 'Marab� Paulista', 352870, 26, 4812, 5.24, 'marabaense', 917.675);
INSERT INTO tb_cidades VALUES (5109, 'Mari�polis', 352890, 26, 3916, 21.07, 'mariapolense', 185.897);
INSERT INTO tb_cidades VALUES (5111, 'Marin�polis', 352910, 26, 2113, 27.15, 'marinopolense', 77.832);
INSERT INTO tb_cidades VALUES (5114, 'Mau�', 352940, 26, 417064, 6.803, 'mauaense', 61.301);
INSERT INTO tb_cidades VALUES (5116, 'Meridiano', 352960, 26, 3855, 16.82, 'meridianense', 229.246);
INSERT INTO tb_cidades VALUES (5118, 'Miguel�polis', 352970, 26, 20451, 24.88, 'miguelopense', 821.96);
INSERT INTO tb_cidades VALUES (5121, 'Miracatu', 352990, 26, 20592, 20.56, 'miracatuense', 1001.536);
INSERT INTO tb_cidades VALUES (5123, 'Mirante Do Paranapanema', 353020, 26, 17059, 13.77, 'mirantense', 1239.081);
INSERT INTO tb_cidades VALUES (5126, 'Mococa', 353050, 26, 66290, 77.55, 'mocoquense', 854.857);
INSERT INTO tb_cidades VALUES (5128, 'Mogi Gua�u', 353070, 26, 137245, 168.98, 'gua�uano', 812.186);
INSERT INTO tb_cidades VALUES (5130, 'Mombuca', 353090, 26, 3266, 24.43, 'mombucano', 133.698);
INSERT INTO tb_cidades VALUES (5133, 'Monte Alegre Do Sul', 353120, 26, 7152, 64.84, 'monte-alegrense', 110.302);
INSERT INTO tb_cidades VALUES (5135, 'Monte Apraz�vel', 353140, 26, 21746, 43.76, 'monte-aprazivelense', 496.906);
INSERT INTO tb_cidades VALUES (5137, 'Monte Castelo', 353160, 26, 4063, 17.47, 'monte-castelense', 232.565);
INSERT INTO tb_cidades VALUES (5140, 'Morro Agudo', 353190, 26, 29116, 20.97, 'morro-agudense', 1388.195);
INSERT INTO tb_cidades VALUES (5142, 'Motuca', 353205, 26, 4290, 18.76, 'motuquense', 228.7);
INSERT INTO tb_cidades VALUES (5145, 'Narandiba', 353220, 26, 4288, 11.98, 'narandibense', 358.029);
INSERT INTO tb_cidades VALUES (5147, 'Nazar� Paulista', 353240, 26, 16414, 50.36, 'nazareano', 325.926);
INSERT INTO tb_cidades VALUES (5150, 'Nipo�', 353270, 26, 4274, 31.01, 'nipoense', 137.816);
INSERT INTO tb_cidades VALUES (5152, 'Nova Campina', 353282, 26, 8515, 22.1, 'nova campinense', 385.376);
INSERT INTO tb_cidades VALUES (5154, 'Nova Castilho', 353286, 26, 1125, 6.14, 'castilhense', 183.232);
INSERT INTO tb_cidades VALUES (5157, 'Nova Guataporanga', 353310, 26, 2177, 63.81, 'guataporanguense', 34.116);
INSERT INTO tb_cidades VALUES (5159, 'Nova Luzit�nia', 353330, 26, 3441, 46.46, 'luzitaniense', 74.057);
INSERT INTO tb_cidades VALUES (5162, 'Novo Horizonte', 353350, 26, 36593, 39.28, 'novo-horizontino', 931.669);
INSERT INTO tb_cidades VALUES (5164, 'Ocau�u', 353370, 26, 4163, 13.86, 'ocau�uense', 300.353);
INSERT INTO tb_cidades VALUES (5167, 'Onda Verde', 353400, 26, 3884, 15.98, 'onda-verdense', 243.119);
INSERT INTO tb_cidades VALUES (5169, 'Orindi�va', 353420, 26, 5675, 22.87, 'orindiuvense', 248.109);
INSERT INTO tb_cidades VALUES (5171, 'Osasco', 353440, 26, 666740, 10.411, 'osasquense', 64.037);
INSERT INTO tb_cidades VALUES (5172, 'Oscar Bressane', 353450, 26, 2537, 11.46, 'bressanense', 221.34);
INSERT INTO tb_cidades VALUES (5175, 'Ouro Verde', 353480, 26, 7800, 29.15, 'ouro-verdense', 267.614);
INSERT INTO tb_cidades VALUES (5177, 'Pacaembu', 353490, 26, 13226, 39.07, 'pacaembuense', 338.503);
INSERT INTO tb_cidades VALUES (5179, 'Palmares Paulista', 353510, 26, 10934, 133.14, 'palmarense', 82.125);
INSERT INTO tb_cidades VALUES (5182, 'Panorama', 353540, 26, 14583, 40.93, 'panoramense', 356.312);
INSERT INTO tb_cidades VALUES (5184, 'Paraibuna', 353560, 26, 17388, 21.48, 'paraibunense', 809.577);
INSERT INTO tb_cidades VALUES (5186, 'Paranapanema', 353580, 26, 17808, 17.48, 'paranapanemense', 1018.726);
INSERT INTO tb_cidades VALUES (5189, 'Pardinho', 353610, 26, 5582, 26.59, 'pardinhense', 209.894);
INSERT INTO tb_cidades VALUES (5191, 'Parisi', 353625, 26, 2032, 24.04, 'parasiano', 84.522);
INSERT INTO tb_cidades VALUES (5193, 'Paulic�ia', 353640, 26, 6339, 16.97, 'pauliceiense', 373.568);
INSERT INTO tb_cidades VALUES (5196, 'Paulo De Faria', 353660, 26, 8589, 11.63, 'paulo-fariense', 738.29);
INSERT INTO tb_cidades VALUES (5198, 'Pedra Bela', 353680, 26, 5780, 36.45, 'pedra-belense', 158.587);
INSERT INTO tb_cidades VALUES (5200, 'Pedregulho', 353700, 26, 15700, 22.03, 'pedregulhense', 712.604);
INSERT INTO tb_cidades VALUES (5203, 'Pedro De Toledo', 353720, 26, 10204, 15.22, 'toledense', 670.402);
INSERT INTO tb_cidades VALUES (5205, 'Pereira Barreto', 353740, 26, 24962, 25.5, 'pereira-barretense', 978.885);
INSERT INTO tb_cidades VALUES (5208, 'Piacatu', 353770, 26, 5287, 22.75, 'piacatuense', 232.364);
INSERT INTO tb_cidades VALUES (5210, 'Pilar Do Sul', 353790, 26, 26406, 38.77, 'pilarense', 681.124);
INSERT INTO tb_cidades VALUES (5212, 'Pindorama', 353810, 26, 15039, 81.37, 'pindoramense', 184.825);
INSERT INTO tb_cidades VALUES (5214, 'Piquerobi', 353830, 26, 3537, 7.33, 'piquerobiense', 482.575);
INSERT INTO tb_cidades VALUES (5217, 'Piracicaba', 353870, 26, 364571, 264.77, 'piracicabano', 1376.913);
INSERT INTO tb_cidades VALUES (5219, 'Piraju�', 353890, 26, 22704, 27.55, 'pirajuiense', 824.197);
INSERT INTO tb_cidades VALUES (5221, 'Pirapora Do Bom Jesus', 353910, 26, 15733, 144.63, 'piraporense', 108.78);
INSERT INTO tb_cidades VALUES (5224, 'Piratininga', 353940, 26, 12072, 30, 'piratiningano', 402.414);
INSERT INTO tb_cidades VALUES (5226, 'Planalto', 353960, 26, 4463, 15.38, 'planaltense', 290.1);
INSERT INTO tb_cidades VALUES (5228, 'Po�', 353980, 26, 106013, 6.211, 'poaense', 17.066);
INSERT INTO tb_cidades VALUES (5231, 'Ponga�', 354010, 26, 3481, 18.99, 'pongaiense', 183.33);
INSERT INTO tb_cidades VALUES (5233, 'Pontalinda', 354025, 26, 4074, 19.38, 'pantalindense', 210.19);
INSERT INTO tb_cidades VALUES (5235, 'Populina', 354040, 26, 4223, 13.37, 'populinense', 315.947);
INSERT INTO tb_cidades VALUES (5237, 'Porto Feliz', 354060, 26, 48893, 87.76, 'porto-felicense', 557.103);
INSERT INTO tb_cidades VALUES (5239, 'Potim', 354075, 26, 19397, 436.22, 'potinense', 44.466);
INSERT INTO tb_cidades VALUES (5242, 'Prad�polis', 354090, 26, 17377, 103.73, 'pradopolitano', 167.526);
INSERT INTO tb_cidades VALUES (5244, 'Prat�nia', 354105, 26, 4599, 26.26, 'pratino', 175.1);
INSERT INTO tb_cidades VALUES (5246, 'Presidente Bernardes', 354120, 26, 13570, 18.04, 'bernardense', 752.134);
INSERT INTO tb_cidades VALUES (5249, 'Presidente Venceslau', 354150, 26, 37910, 50.1, 'venceslauense', 756.743);
INSERT INTO tb_cidades VALUES (5252, 'Quat�', 354170, 26, 12799, 19.64, 'quataense', 651.742);
INSERT INTO tb_cidades VALUES (5254, 'Queluz', 354190, 26, 11309, 45.27, 'queluzense', 249.829);
INSERT INTO tb_cidades VALUES (5256, 'Rafard', 354210, 26, 8612, 70.93, 'rafardense', 121.421);
INSERT INTO tb_cidades VALUES (5258, 'Reden��o Da Serra', 354230, 26, 3873, 12.52, 'rendencense', 309.366);
INSERT INTO tb_cidades VALUES (5261, 'Registro', 354260, 26, 54261, 75.11, 'registrense', 722.412);
INSERT INTO tb_cidades VALUES (5263, 'Ribeira', 354280, 26, 3358, 10, 'ribeirense', 335.742);
INSERT INTO tb_cidades VALUES (5265, 'Ribeir�o Branco', 354300, 26, 18269, 26.19, 'ribeir�o-branquense', 697.501);
INSERT INTO tb_cidades VALUES (5267, 'Ribeir�o Do Sul', 354320, 26, 4446, 21.83, 'ribeir�o-sulense', 203.686);
INSERT INTO tb_cidades VALUES (5270, 'Ribeir�o Pires', 354330, 26, 113068, 1.144, 'ribeir�o-pirense', 98.75);
INSERT INTO tb_cidades VALUES (5272, 'Rifaina', 354360, 26, 3436, 21.14, 'rifainense', 162.508);
INSERT INTO tb_cidades VALUES (5274, 'Rin�polis', 354380, 26, 9935, 27.73, 'rinopolense', 358.329);
INSERT INTO tb_cidades VALUES (5277, 'Rio Grande Da Serra', 354410, 26, 43974, 1.192, 'rio-grandense-da-serra', 36.877);
INSERT INTO tb_cidades VALUES (5279, 'Riversul', 354350, 26, 6163, 15.96, 'riversulense', 386.196);
INSERT INTO tb_cidades VALUES (5281, 'Roseira', 354430, 26, 9599, 73.47, 'roseirense', 130.654);
INSERT INTO tb_cidades VALUES (5284, 'Sabino', 354460, 26, 5217, 16.78, 'sabinense', 310.895);
INSERT INTO tb_cidades VALUES (5286, 'Sales', 354480, 26, 5451, 17.67, 'salense', 308.46);
INSERT INTO tb_cidades VALUES (5288, 'Sales�polis', 354500, 26, 15635, 36.79, 'salesopolense', 424.973);
INSERT INTO tb_cidades VALUES (5291, 'Salto', 354520, 26, 105516, 792.17, 'saltense', 133.199);
INSERT INTO tb_cidades VALUES (5293, 'Salto Grande', 354540, 26, 8787, 46.64, 'salto-grandense', 188.396);
INSERT INTO tb_cidades VALUES (5295, 'Santa Ad�lia', 354560, 26, 14333, 43.32, 'santa-adeliense', 330.895);
INSERT INTO tb_cidades VALUES (5298, 'Santa Branca', 354600, 26, 13763, 50, 'santa-branquense', 275.25);
INSERT INTO tb_cidades VALUES (5299, 'Santa Clara D`Oeste', 354610, 26, 2084, 11.36, 'santa-clarense', 183.427);
INSERT INTO tb_cidades VALUES (5300, 'Santa Cruz Da Concei��o', 354620, 26, 4002, 26.66, 'santa-cruzense', 150.128);
INSERT INTO tb_cidades VALUES (5302, 'Santa Cruz Das Palmeiras', 354630, 26, 29932, 101.35, 'palmeirense', 295.338);
INSERT INTO tb_cidades VALUES (5305, 'Santa F� Do Sul', 354660, 26, 29239, 140.43, 'santa-f�-sulense', 208.216);
INSERT INTO tb_cidades VALUES (5307, 'Santa Isabel', 354680, 26, 50453, 139.09, 'isabelense', 362.738);
INSERT INTO tb_cidades VALUES (5310, 'Santa Mercedes', 354710, 26, 2831, 16.96, 'mercedense', 166.873);
INSERT INTO tb_cidades VALUES (5312, 'Santa Rita Do Passa Quatro', 354750, 26, 26478, 35.11, 'santa-ritense', 754.141);
INSERT INTO tb_cidades VALUES (5315, 'Santana Da Ponte Pensa', 354720, 26, 1641, 12.6, 'santanense-da-ponte-pensa', 130.263);
INSERT INTO tb_cidades VALUES (5318, 'Santo Andr�', 354780, 26, 676407, 3.866, 'andreense', 174.947);
INSERT INTO tb_cidades VALUES (5320, 'Santo Ant�nio De Posse', 354800, 26, 20650, 134.09, 'possense', 153.997);
INSERT INTO tb_cidades VALUES (5322, 'Santo Ant�nio Do Jardim', 354810, 26, 5943, 54.05, 'jardinense', 109.956);
INSERT INTO tb_cidades VALUES (5325, 'Sant�polis Do Aguape�', 354840, 26, 4277, 33.44, 'santopolitano', 127.906);
INSERT INTO tb_cidades VALUES (5328, 'S�o Bernardo Do Campo', 354870, 26, 765463, 1.872, 's�o-bernardense', 408.773);
INSERT INTO tb_cidades VALUES (5331, 'S�o Francisco', 354900, 26, 2793, 36.94, 's�o-francisquense', 75.617);
INSERT INTO tb_cidades VALUES (5333, 'S�o Jo�o Das Duas Pontes', 354920, 26, 2566, 19.84, 's�o-joanense', 129.34);
INSERT INTO tb_cidades VALUES (5335, 'S�o Jo�o Do Pau D`Alho', 354930, 26, 2103, 17.86, 's�o-joanense', 117.72);
INSERT INTO tb_cidades VALUES (5338, 'S�o Jos� Do Barreiro', 354960, 26, 4077, 7.14, 'barreirense', 570.961);
INSERT INTO tb_cidades VALUES (5341, 'S�o Jos� Dos Campos', 354990, 26, 629921, 572.77, 'joseense', 1099.777);
INSERT INTO tb_cidades VALUES (5343, 'S�o Lu�s Do Paraitinga', 355000, 26, 10397, 16.84, 'luisense', 617.316);
INSERT INTO tb_cidades VALUES (5346, 'S�o Paulo', 355030, 26, 11253503, 7.387, 'paulistano', 1523.278);
INSERT INTO tb_cidades VALUES (5348, 'S�o Pedro Do Turvo', 355050, 26, 7198, 9.84, 's�o-pedrense', 731.76);
INSERT INTO tb_cidades VALUES (5351, 'S�o Sebasti�o Da Grama', 355080, 26, 12099, 47.94, 'gramense', 252.38);
INSERT INTO tb_cidades VALUES (5354, 'Sarapu�', 355110, 26, 9027, 25.6, 'sarapuiano', 352.685);
INSERT INTO tb_cidades VALUES (5356, 'Sebastian�polis Do Sul', 355130, 26, 3031, 18.61, 'sebastianopolense', 162.891);
INSERT INTO tb_cidades VALUES (5359, 'Serrana', 355150, 26, 38878, 309.68, 'serranense', 125.544);
INSERT INTO tb_cidades VALUES (5361, 'Sete Barras', 355180, 26, 13005, 12.34, 'barrense', 1053.474);
INSERT INTO tb_cidades VALUES (5363, 'Silveiras', 355200, 26, 5792, 13.96, 'silveirense', 414.782);
INSERT INTO tb_cidades VALUES (5366, 'Sud Mennucci', 355230, 26, 7435, 12.57, 'sud-menucciano', 591.305);
INSERT INTO tb_cidades VALUES (5368, 'Suzan�polis', 355255, 26, 3383, 10.3, 'suzanapolense', 328.526);
INSERT INTO tb_cidades VALUES (5371, 'Tabatinga', 355270, 26, 14686, 39.74, 'tabatinguense', 369.557);
INSERT INTO tb_cidades VALUES (5373, 'Taciba', 355290, 26, 5714, 9.41, 'tacibense', 607.312);
INSERT INTO tb_cidades VALUES (5375, 'Taia�u', 355310, 26, 5894, 55.27, 'taia�uense', 106.638);
INSERT INTO tb_cidades VALUES (5377, 'Tamba�', 355330, 26, 22406, 39.88, 'tambauense', 561.788);
INSERT INTO tb_cidades VALUES (5380, 'Tapiratiba', 355360, 26, 12737, 57.23, 'tapiratibense', 222.541);
INSERT INTO tb_cidades VALUES (5382, 'Taquaritinga', 355370, 26, 53988, 90.95, 'taquaritinguense', 593.581);
INSERT INTO tb_cidades VALUES (5384, 'Taquariva�', 355385, 26, 5151, 22.22, 'taquarivaiense', 231.793);
INSERT INTO tb_cidades VALUES (5387, 'Tatu�', 355400, 26, 107326, 205.03, 'tatuiano', 523.475);
INSERT INTO tb_cidades VALUES (5389, 'Tejup�', 355420, 26, 4809, 16.23, 'tejupaense', 296.276);
INSERT INTO tb_cidades VALUES (5391, 'Terra Roxa', 355440, 26, 8505, 38.39, 'terra-roxense', 221.541);
INSERT INTO tb_cidades VALUES (5393, 'Timburi', 355460, 26, 2646, 13.45, 'timburiense', 196.79);
INSERT INTO tb_cidades VALUES (5396, 'Trabiju', 355475, 26, 1544, 24.35, 'trabijuense', 63.421);
INSERT INTO tb_cidades VALUES (5398, 'Tr�s Fronteiras', 355490, 26, 5427, 35.45, 'trifonteirano', 153.092);
INSERT INTO tb_cidades VALUES (5400, 'Tup�', 355500, 26, 63476, 100.99, 'tup�ense', 628.513);
INSERT INTO tb_cidades VALUES (5403, 'Turmalina', 355530, 26, 1978, 13.37, 'turmalinense', 147.938);
INSERT INTO tb_cidades VALUES (5405, 'Ubatuba', 355540, 26, 78801, 110.87, 'ubatubano', 710.783);
INSERT INTO tb_cidades VALUES (5407, 'Uchoa', 355560, 26, 9471, 37.51, 'uchoense', 252.478);
INSERT INTO tb_cidades VALUES (5409, 'Ur�nia', 355580, 26, 8836, 42.29, 'uraniense', 208.942);
INSERT INTO tb_cidades VALUES (5412, 'Valentim Gentil', 355610, 26, 11036, 73.72, 'valentim-gentilense', 149.694);
INSERT INTO tb_cidades VALUES (5431, 'Alvorada', 170070, 27, 8374, 6.91, 'alvoradense', 1212.165);
INSERT INTO tb_cidades VALUES (5433, 'Angico', 170105, 27, 3175, 7.03, 'angicoense', 451.731);
INSERT INTO tb_cidades VALUES (5435, 'Aragominas', 170130, 27, 5882, 5.01, 'aragominense', 1173.055);
INSERT INTO tb_cidades VALUES (5438, 'Aragua�na', 170210, 27, 150484, 37.62, 'araguainense', 4000.403);
INSERT INTO tb_cidades VALUES (5440, 'Araguatins', 170220, 27, 31329, 11.93, 'araguatinense', 2625.276);
INSERT INTO tb_cidades VALUES (5442, 'Arraias', 170240, 27, 10645, 1.84, 'arraiano', 5786.859);
INSERT INTO tb_cidades VALUES (5444, 'Aurora Do Tocantins', 170270, 27, 3446, 4.58, 'aurorense', 752.828);
INSERT INTO tb_cidades VALUES (5447, 'Bandeirantes Do Tocantins', 170305, 27, 3122, 2.02, 'bandeirantense', 1541.837);
INSERT INTO tb_cidades VALUES (5449, 'Barrol�ndia', 170310, 27, 5349, 7.5, 'barrolandense', 713.298);
INSERT INTO tb_cidades VALUES (5452, 'Brasil�ndia Do Tocantins', 170360, 27, 2064, 3.22, 'brasilandense', 641.465);
INSERT INTO tb_cidades VALUES (5455, 'Cachoeirinha', 170382, 27, 2148, 6.1, 'cachoeirense', 352.344);
INSERT INTO tb_cidades VALUES (5457, 'Cariri Do Tocantins', 170386, 27, 3756, 3.33, 'caririense', 1128.599);
INSERT INTO tb_cidades VALUES (5459, 'Carrasco Bonito', 170389, 27, 3688, 19.12, 'carrascoense', 192.936);
INSERT INTO tb_cidades VALUES (5462, 'Chapada Da Natividade', 170510, 27, 3277, 1.99, 'chapadense', 1646.469);
INSERT INTO tb_cidades VALUES (5464, 'Colinas Do Tocantins', 170550, 27, 30838, 36.54, 'colinense', 843.843);
INSERT INTO tb_cidades VALUES (5467, 'Concei��o Do Tocantins', 170560, 27, 4182, 1.67, 'conceicionense', 2500.734);
INSERT INTO tb_cidades VALUES (5470, 'Crix�s Do Tocantins', 170625, 27, 1564, 1.59, 'crixaense', 986.691);
INSERT INTO tb_cidades VALUES (5473, 'Divin�polis Do Tocantins', 170710, 27, 6363, 2.71, 'divinopolino', 2347.428);
INSERT INTO tb_cidades VALUES (5475, 'Duer�', 170730, 27, 4592, 1.34, 'duerense', 3424.845);
INSERT INTO tb_cidades VALUES (5478, 'Figueir�polis', 170765, 27, 5340, 2.77, 'figueiropolense', 1930.069);
INSERT INTO tb_cidades VALUES (5480, 'Formoso Do Araguaia', 170820, 27, 18427, 1.37, 'formosense do araguaia', 13423.347);
INSERT INTO tb_cidades VALUES (5482, 'Goianorte', 170830, 27, 4956, 2.75, 'goianortense', 1800.979);
INSERT INTO tb_cidades VALUES (5485, 'Gurupi', 170950, 27, 76755, 41.8, 'gurupiense', 1836.087);
INSERT INTO tb_cidades VALUES (5487, 'Itacaj�', 171050, 27, 7104, 2.33, 'itacajaense', 3051.351);
INSERT INTO tb_cidades VALUES (5489, 'Itapiratins', 171090, 27, 3532, 2.84, 'itapiratinense', 1243.957);
INSERT INTO tb_cidades VALUES (5492, 'Juarina', 171180, 27, 2231, 4.64, 'juarinense', 481.046);
INSERT INTO tb_cidades VALUES (5494, 'Lagoa Do Tocantins', 171195, 27, 3525, 3.87, 'lagoense do tocantins', 911.34);
INSERT INTO tb_cidades VALUES (5496, 'Lavandeira', 171215, 27, 1605, 3.09, 'lavandeirense', 519.571);
INSERT INTO tb_cidades VALUES (5499, 'Marian�polis Do Tocantins', 171250, 27, 4352, 2.08, 'marianopolino', 2091.37);
INSERT INTO tb_cidades VALUES (5501, 'Mauril�ndia Do Tocantins', 171280, 27, 3154, 4.27, 'maurilandense', 738.103);
INSERT INTO tb_cidades VALUES (5504, 'Monte Do Carmo', 171360, 27, 6716, 1.86, 'carmelito', 3616.665);
INSERT INTO tb_cidades VALUES (5506, 'Muricil�ndia', 171395, 27, 3152, 2.66, 'muricilandense', 1186.642);
INSERT INTO tb_cidades VALUES (5509, 'Nova Olinda', 171488, 27, 10686, 6.82, 'novalindense ', 1566.179);
INSERT INTO tb_cidades VALUES (5511, 'Novo Acordo', 171510, 27, 3762, 1.41, 'novoacordino ', 2671.89);
INSERT INTO tb_cidades VALUES (5513, 'Novo Jardim', 171525, 27, 2457, 1.88, 'novojardinense', 1309.662);
INSERT INTO tb_cidades VALUES (5516, 'Palmeirante', 171570, 27, 4954, 1.88, 'palmeirantense', 2640.808);
INSERT INTO tb_cidades VALUES (5518, 'Palmeir�polis', 171575, 27, 7339, 4.31, 'palmeiropolitano', 1703.941);
INSERT INTO tb_cidades VALUES (5521, 'Pau D`Arco', 171630, 27, 4588, 3.33, 'pau d?arquense', 1377.401);
INSERT INTO tb_cidades VALUES (5523, 'Peixe', 171660, 27, 10384, 1.96, 'peixense', 5291.198);
INSERT INTO tb_cidades VALUES (5525, 'Pindorama Do Tocantins', 171700, 27, 4506, 2.89, 'pindoramense', 1559.083);
INSERT INTO tb_cidades VALUES (5528, 'Ponte Alta Do Bom Jesus', 171780, 27, 4544, 2.52, 'pontealtense', 1806.137);
INSERT INTO tb_cidades VALUES (5530, 'Porto Alegre Do Tocantins', 171800, 27, 2796, 5.57, 'porto-alegrense', 502.024);
INSERT INTO tb_cidades VALUES (5533, 'Presidente Kennedy', 171840, 27, 3681, 4.78, 'kenediense', 770.42);
INSERT INTO tb_cidades VALUES (5535, 'Recursol�ndia', 171850, 27, 3768, 1.7, 'recursolandense', 2216.656);
INSERT INTO tb_cidades VALUES (5538, 'Rio Dos Bois', 171870, 27, 2570, 3.04, 'rioboiense', 845.063);
INSERT INTO tb_cidades VALUES (5540, 'Sampaio', 171880, 27, 3864, 17.38, 'sampaiense', 222.292);
INSERT INTO tb_cidades VALUES (5542, 'Santa F� Do Araguaia', 171886, 27, 6599, 3.93, 'santaf�ense', 1678.087);
INSERT INTO tb_cidades VALUES (5545, 'Santa Rosa Do Tocantins', 171890, 27, 4568, 2.54, 'santa rosense', 1796.253);
INSERT INTO tb_cidades VALUES (5546, 'Santa Tereza Do Tocantins', 171900, 27, 2523, 4.67, 'santa terezense', 539.911);
INSERT INTO tb_cidades VALUES (5548, 'S�o Bento Do Tocantins', 172010, 27, 4608, 4.17, 's�o bentense', 1105.897);
INSERT INTO tb_cidades VALUES (5551, 'S�o Salvador Do Tocantins', 172025, 27, 2910, 2.05, 's�o salvadorense', 1422.03);
INSERT INTO tb_cidades VALUES (5553, 'S�o Val�rio', 172049, 27, 4383, 1.74, 's�o valeriano', 2519.579);
INSERT INTO tb_cidades VALUES (5558, 'Taipas Do Tocantins', 172093, 27, 1945, 1.74, 'taipense', 1116.199);
INSERT INTO tb_cidades VALUES (5561, 'Tocantin�polis', 172120, 27, 22619, 21, 'tocantinopolino', 1077.069);
INSERT INTO tb_cidades VALUES (5563, 'Tupiratins', 172130, 27, 2097, 2.34, 'tupiratinense', 895.305);
INSERT INTO tb_cidades VALUES (5565, 'Xambio�', 172210, 27, 11484, 9.68, 'xambioaense', 1186.424);


INSERT INTO tb_estados VALUES (1, 'Acre', 'AC');
INSERT INTO tb_estados VALUES (2, 'Alagoas', 'AL');
INSERT INTO tb_estados VALUES (3, 'Amazonas', 'AM');
INSERT INTO tb_estados VALUES (4, 'Amap�', 'AP');
INSERT INTO tb_estados VALUES (5, 'Bahia', 'BA');
INSERT INTO tb_estados VALUES (6, 'Cear�', 'CE');
INSERT INTO tb_estados VALUES (7, 'Distrito Federal', 'DF');
INSERT INTO tb_estados VALUES (8, 'Espirito Santo', 'ES');
INSERT INTO tb_estados VALUES (9, 'Goi�s', 'GO');
INSERT INTO tb_estados VALUES (10, 'Maranh�o', 'MA');
INSERT INTO tb_estados VALUES (11, 'Minas Gerais', 'MG');
INSERT INTO tb_estados VALUES (12, 'Mato Grosso do Sul', 'MS');
INSERT INTO tb_estados VALUES (13, 'Mato Grosso', 'MT');
INSERT INTO tb_estados VALUES (14, 'Par�', 'PA');
INSERT INTO tb_estados VALUES (15, 'Para�ba', 'PB');
INSERT INTO tb_estados VALUES (16, 'Pernambuco', 'PE');
INSERT INTO tb_estados VALUES (17, 'Piau�', 'PI');
INSERT INTO tb_estados VALUES (18, 'Paran�', 'PR');
INSERT INTO tb_estados VALUES (19, 'Rio de Janeiro', 'RJ');
INSERT INTO tb_estados VALUES (20, 'Rio Grande do Norte', 'RN');
INSERT INTO tb_estados VALUES (21, 'Rond�nia', 'RO');
INSERT INTO tb_estados VALUES (22, 'Roraima', 'RR');
INSERT INTO tb_estados VALUES (23, 'Rio Grande do Sul', 'RS');
INSERT INTO tb_estados VALUES (24, 'Santa Catarina', 'SC');
INSERT INTO tb_estados VALUES (25, 'Sergipe', 'SE');
INSERT INTO tb_estados VALUES (26, 'S�o Paulo', 'SP');
INSERT INTO tb_estados VALUES (27, 'Tocantins', 'TO');

ALTER TABLE ONLY tb_cidades
ADD CONSTRAINT pk_tb_cidade_id PRIMARY KEY (id);

ALTER TABLE ONLY tb_estados
ADD CONSTRAINT pk_tb_estados_id PRIMARY KEY (id);

ALTER TABLE ONLY tb_cidades
ADD CONSTRAINT fk_tb_estado_id FOREIGN KEY (estado_id) REFERENCES tb_estados(id) ON DELETE CASCADE;

----------------------------------------------------------------------------------------------

CREATE TABLE TB_APARTAMENTO(
  CD_APARTAMENTO SERIAL,
  CD_SETOR INTEGER CONSTRAINT NN_TB_APARTAMENTO_CD_SETOR NOT NULL,
  DESC_APARTAMENTO VARCHAR(10) CONSTRAINT NN_TB_APARTAMENTO_DESC_APARTAMENTO NOT NULL,
  CD_CATG_TIPO INTEGER CONSTRAINT NN_TB_APARTAMENTO_CD_CATG_TIPO NOT NULL,
  CD_VL_CATG_TIPO INTEGER CONSTRAINT NN_TB_APARTAMENTO_CD_CATG_TIPO NOT NUll,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_APARTAMENTO_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_APARTAMENTO_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_APARTAMENTO_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_APARTAMENTO_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_APARTAMENTO_CD_APARTAMENTO PRIMARY KEY(CD_APARTAMENTO)
);

CREATE TABLE TB_CATEGORIA(
  CD_CATEGORIA SERIAL,
  DESC_CATEGORIA VARCHAR(50) CONSTRAINT NN_TB_CATEGORIA_DESC_CATEGORIA NOT NULL,
  CD_USUARIO_CRIACAO INTEGER,
  DT_USUARIO_CRIACAO TIMESTAMP,
  CD_USUARIO_ATUALIZA INTEGER,
  DT_USUARIO_ATUALIZA TIMESTAMP,
  CONSTRAINT PK_TB_CATEGORIA_CD_CATEGORIA PRIMARY KEY(CD_CATEGORIA)
);

CREATE TABLE TB_CATEGORIA_VALOR(
  CD_VL_CATEGORIA SERIAL,
  CD_CATEGORIA INTEGER CONSTRAINT NN_TB_CATEGORIA_VALOR_CD_CATEGORIA NOT NULL,
  DESC_VL_CATG VARCHAR(40) CONSTRAINT NN_TB_CATEGORIA_VALOR_DESC_VL_CATG NOT NULL,
  GENERO VARCHAR(2),
  CD_GRUPO INTEGER,
  CD_CAT_GRUPO INTEGER,
  CD_USUARIO_CRIACAO INTEGER,
  DT_USUARIO_CRIACAO TIMESTAMP,
  CD_USUARIO_ATUALIZA INTEGER,
  DT_USUARIO_ATUALIZA TIMESTAMP,
  CONSTRAINT PK_TB_CD_VL_CATEGORIA_CD_VL_CATEGORIA PRIMARY KEY(CD_VL_CATEGORIA, CD_CATEGORIA)
);

/*
CAMPO IE_APROVADO

P - EM PROCESSO DE APROVACAO
A - APRAVADO
R - REPROVADO
*/

CREATE TABLE TB_ITENS_ORCAMENTO(
  NR_SEQUENCIA SERIAL,
  CD_ORCAMENTO INTEGER CONSTRAINT NN_TB_ITENS_ORCAMENTO_CD_ORCAMENTO NOT NULL,
  CD_PESSOA_JURIDICA INTEGER CONSTRAINT NN_TB_ITENS_ORCAMENTO_CD_PESSOA_JURIDICA NOT NULL,
  DESC_ITEM VARCHAR(50) CONSTRAINT NN_TB_ITENS_ORCAMENTO_DESC_ITEM NOT NULL,
  QT_ITEM INTEGER CONSTRAINT NN_TB_ITENS_ORCAMENTO_QT_ITEM NOT NULL,
  VALOR_UNIT NUMERIC(12,2) CONSTRAINT NN_TB_ITENS_ORCAMENTO_VALOR_UNIT NOT NULL,
  VALOR_TOTAL NUMERIC(12,2) CONSTRAINT NN_TB_ITENS_ORCAMENTO_VALOR_TOTAL NOT NULL,
  IE_APROVADO CHAR(1) CONSTRAINT NN_TB_ITENS_ORCAMENTO_IE_APROVADO NOT NULL,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_ITENS_ORCAMENTO_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_ITENS_ORCAMENTO_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_ITENS_ORCAMENTO_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_ITENS_ORCAMENTO_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_ITENS_ORCAMENTO_NR_SEQUENCIA PRIMARY KEY(NR_SEQUENCIA)
);

CREATE TABLE TB_MORADOR_ENDERECO(
  NR_SEQUENCIA SERIAL,
  CD_PESSOA_FISICA INTEGER CONSTRAINT NN_TB_MORADOR_ENDERECO_CD_PESSOA_FISICA NOT NULL,
  CD_APARTAMENTO INTEGER CONSTRAINT NN_TB_MORADOR_ENDERECO_CD_APARTAMENTO NOT NULL,
  DT_ENTRADA TIMESTAMP CONSTRAINT NN_TB_MORADOR_ENDERECO_DT_ENTRADA NOT NULL,
  DT_SAIDA TIMESTAMP,
  FG_RESIDENTE CHAR(1),
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_MORADOR_ENDERECO_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_MORADOR_ENDERECO_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_MORADOR_ENDERECO_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_MORADOR_ENDERECO_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_MORADOR_ENDERECO_NR_SEQUENCIA PRIMARY KEY(NR_SEQUENCIA)
);

CREATE TABLE TB_OCORRENCIA_PF_ENVOLVIDA(
  CD_OCORRENCIA SERIAL,
  CD_PESSOA_FISICA INTEGER CONSTRAINT NN_TB_OCORRENCIA_PF_ENVOLVIDA_CD_PESSOA_FISICA NOT NULL,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_OCORRENCIA_PF_ENVOLVIDA_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_OCORRENCIA_PF_ENVOLVIDA_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_OCORRENCIA_PF_ENVOLVIDA_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_OCORRENCIA_PF_ENVOLVIDA_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_CD_OCORRENCIA_CD_PESSOA_FISICA PRIMARY KEY(CD_OCORRENCIA, CD_PESSOA_FISICA)
);

CREATE TABLE TB_OCORRENCIA(
  CD_OCORRENCIA SERIAL,
  CD_SETOR INTEGER CONSTRAINT NN_TB_OCORRENCIA_CD_SETOR NOT NULL,
  CD_PF_INFORMANTE INTEGER CONSTRAINT NN_TB_OCORRENCIA_CD_PF_INFORMANTE NOT NULL,
  DESC_ASSUNTO VARCHAR(50) CONSTRAINT NN_TB_OCORRENCIA_DESC_ASSUNTO NOT NULL,
  DESC_OCORRENCIA TEXT CONSTRAINT NN_TB_OCORRENCIA_DESC_OCORRENCIA NOT NULL,
  DT_OCORRENCIA TIMESTAMP CONSTRAINT NN_TB_OCORRENCIA_DT_OCORRENCIA NOT NULL,
  DT_FIM TIMESTAMP,
  DESC_CONCLUSAO TEXT,
  CD_CATG_ESTAGIO INTEGER CONSTRAINT NN_TB_OCORRENCIA_CD_CATG_ESTAGIO NOT NULL,
  CD_VL_CATG_ESTAGIO INTEGER CONSTRAINT NN_TB_OCORRENCIA_CD_CATG_VL_ESTAGIO NOT NULL,
  CD_CATG_TIPO INTEGER CONSTRAINT NN_TB_OCORRENCIA_CD_CATG_TIPO NOT NULL,
  CD_VL_CATG_TIPO INTEGER CONSTRAINT NN_TB_OCORRENCIA_CD_CATG_TIPO NOT NULL,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_OCORRENCIA_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_OCORRENCIA_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_OCORRENCIA_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_OCORRENCIA_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_OCORRENCIA_CD_OCORRENICA PRIMARY KEY(CD_OCORRENCIA)
);

CREATE TABLE TB_ORCAMENTO(
  CD_ORCAMENTO SERIAL,
  CD_ORDEM_SERVICO INTEGER,
  DS_ORCAMENTO VARCHAR(250) CONSTRAINT NN_TB_ORCAMENTO_DS_ORCAMENTO NOT NULL,
  DT_ORCAMENTO TIMESTAMP CONSTRAINT NN_TB_ORCAMENTO_DT_ORCAMENTO NOT NULL,
  DT_FIM TIMESTAMP,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_ORCAMENTO_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_ORCAMENTO_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_ORCAMENTO_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_ORCAMENTO_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_ORCAMENTO_CD_ORCAMENTO PRIMARY KEY(CD_ORCAMENTO)
);

CREATE TABLE TB_ORDEM_SERVICO(
  CD_ORDEM_SERVICO SERIAL,
--------------------------------------------------------------
  CD_SETOR INTEGER CONSTRAINT NN_TB_ORDEM_SERVICO_CD_SETOR NOT NULL,
--------------------------------------------------------------
  CD_OCORRENCIA INTEGER,
  CD_PF_EXECUTOR INTEGER,
  CD_PF_SOLICITANTE INTEGER CONSTRAINT NN_TB_ORDEM_SERVICO_CD_PF_SOLICITANTE NOT NULL,
  DESC_ASSUNTO VARCHAR(50) CONSTRAINT NN_TB_ORDEM_SERVICO_DESC_ASSUNTO NOT NULL,
  DESC_ORDEM_SERVICO TEXT CONSTRAINT NN_TB_ORDEM_SERVICO_DESC_ORDEM_SERVICO NOT NULL,
  DT_INICIO TIMESTAMP CONSTRAINT NN_TB_ORDEM_SERVICO_DT_INICIO NOT NULL,
  DT_FIM TIMESTAMP,
  CD_CATG_ESTAGIO INTEGER CONSTRAINT NN_TB_ORDEM_SERVICO_CD_CATG_ESTAGIO NOT NULL,
  CD_VL_CATG_ESTAGIO INTEGER CONSTRAINT NN_TB_ORDEM_SERVICO_CD_VL_CATG_ESTAGIO NOT NULL,
  CD_CATG_AVAL_ATENDIMENTO INTEGER,
  CD_VL_CATG_AVAL_ATENDIMENTO INTEGER,
  CD_CATG_AVAL_QUALIDADE INTEGER,
  CD_VL_CATG_AVAL_QUALIDADE INTEGER,
  DESC_CONCLUSAO TEXT,
--------------------------------------------------------------
  VALOR_MATERIAL NUMERIC(7,2),
  VALOR_SERVICO NUMERIC(7,2),
--------------------------------------------------------------
  CD_CATG_TIPO INTEGER CONSTRAINT NN_TB_ORDEM_SERVICO_CD_CATG_TIPO NOT NULL,
  CD_VL_CATG_TIPO INTEGER CONSTRAINT NN_TB_ORDEM_SERVICO_CD_CATG_TIPO NOT NULL,
--------------------------------------------------------------
  CD_CATG_SUB_TIPO INTEGER CONSTRAINT NN_TB_ORDEM_SERVICO_CD_CATG_SUB_TIPO NOT NULL,
  CD_VL_CATG_SUB_TIPO INTEGER CONSTRAINT NN_TB_ORDEM_SERVICO_CD_VL_CATG_SUB_TIPO NOT NULL,
--------------------------------------------------------------
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_ORDEM_SERVICO_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_ORDEM_SERVICO_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_ORDEM_SERVICO_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_ORDEM_SERVICO_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_ORDEM_SERVICO_TESTE_CD_ORDEM_SERVICO PRIMARY KEY(CD_ORDEM_SERVICO)
);

CREATE TABLE TB_PESSOA_FISICA(
  CD_PESSOA_FISICA SERIAL,
  CD_PESSOA_JURIDICA INTEGER,
  CD_PROFISSAO INTEGER,
  NM_PESSOA_FISICA VARCHAR(50) CONSTRAINT NN_TB_PESSOA_FISICA_NM_PESSOA_FISICA NOT NULL,
  CPF VARCHAR(14),
  RG VARCHAR(15),
  UF_RG INTEGER,
  EMAIL VARCHAR(60),
  DT_NASCIMENTO DATE,
  IE_SEXO CHAR(1) CONSTRAINT NN_TB_PESSOA_FISICA_IE_SEXO NOT NULL,
  IM_PERFIL OID,
--------------------------------------------------------
  CD_CIDADE_ORIGEM INTEGER,
--------------------------------------------------------
  CD_USUARIO_CRIACAO INTEGER,
  DT_USUARIO_CRIACAO TIMESTAMP,
  CD_USUARIO_ATUALIZA INTEGER,
  DT_USUARIO_ATUALIZA TIMESTAMP,
  CONSTRAINT PK_TB_PESSAO_FISICA_CD_PESSOA_FISICA PRIMARY KEY(CD_PESSOA_FISICA),
  CONSTRAINT UQ_TB_PESSOA_FISICA_CPF UNIQUE(CPF),
  CONSTRAINT UQ_TB_PESSOA_FISICA_RG UNIQUE(RG),
  CONSTRAINT UQ_TB_PESSOA_FISICA_EMAIL UNIQUE(EMAIL)
);

CREATE TABLE TB_PESSOA_JURIDICA(
  CD_PESSOA_JURIDICA SERIAL,
  CNPJ VARCHAR(18),
  NM_FANTASIA VARCHAR(50) CONSTRAINT NN_TB_PESSOA_JURIDICA_NM_FANTASIA NOT NULL,
  DESC_RAZAO VARCHAR(50) CONSTRAINT NN_TB_PESSOA_JURIDICA_DESC_RAZAO NOT NULL,
  IM_PERFIL OID,
  CD_CATG_TIPO_EMPRESA INTEGER,
  CD_TIPO_EMPRESA INTEGER,
  CD_CATG_RAMO_ATIVIDADE INTEGER,
  CD_RAMO_ATIVIDADE INTEGER,
  EMAIL VARCHAR(30),
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_PESSOA_JURIDICA_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_PESSOA_JURIDICA_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_PESSOA_JURIDICA_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_PESSOA_JURIDICA_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_PESSAO_JURIDICA_CD_PESSOA_JURIDICA PRIMARY KEY(CD_PESSOA_JURIDICA),
  CONSTRAINT UQ_TB_PESSOA_JURIDICA_CGC UNIQUE(CNPJ),
  CONSTRAINT UQ_TB_PESSOA_JURIDICA_EMAIL UNIQUE(EMAIL)
);

CREATE TABLE TB_PF_ENDERECO(
  NR_SEQUENCIA SERIAL,
  CD_CATG_END INTEGER CONSTRAINT NN_TB_PF_ENDERECO_CD_CATG_END NOT NULL,
  CD_VL_CATG_END INTEGER CONSTRAINT NN_TB_PF_ENDERECO_CD_VL_CATG_END NOT NULL,
  CD_PESSOA_FISICA INTEGER CONSTRAINT NN_TB_PF_ENDERECO_CD_PESSOA_FISICA NOT NULL,
  CEP VARCHAR(9) CONSTRAINT NN_TB_PF_ENDERECO_CEP NOT NULL,
  RUA VARCHAR(50) CONSTRAINT NN_TB_PF_ENDERECO_RUA NOT NULL,
  NUMERO INTEGER CONSTRAINT NN_TB_PF_ENDERECO_NUMERO NOT NULL,
  BAIRRO VARCHAR(25) CONSTRAINT NN_TB_PF_ENDERECO_BAIRRO NOT NULL,
  CIDADE INTEGER CONSTRAINT NN_TB_PF_ENDERECO_CIDADE NOT NULL,
  ESTADO INTEGER CONSTRAINT NN_TB_PF_ENDERECO_ESTADO NOT NULL,
  OBSERVACAO TEXT,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_PF_ENDERECO_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_PF_ENDERECO_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_PF_ENDERECO_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_PF_ENDERECO_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_PF_ENDERECO_NR_SEQUENCIA PRIMARY KEY(NR_SEQUENCIA)
);

CREATE TABLE TB_PJ_ENDERECO(
  NR_SEQUENCIA SERIAL,
  CD_CATG_END INTEGER CONSTRAINT NN_TB_PJ_ENDERECO_CD_CATG_END NOT NULL,
  CD_VL_CATG_END INTEGER CONSTRAINT NN_TB_PJ_ENDERECO_CD_VL_CATG_END NOT NULL,
  CD_PESSOA_JURIDICA INTEGER CONSTRAINT NN_TB_PJ_ENDERECO_CD_PESSOA_JURIDICA NOT NULL,
  CEP VARCHAR(9) CONSTRAINT NN_TB_PJ_ENDERECO_CEP NOT NULL,
  RUA VARCHAR(50) CONSTRAINT NN_TB_PJ_ENDERECO_RUA NOT NULL,
  NUMERO INTEGER CONSTRAINT NN_TB_PJ_ENDERECO_NUMERO NOT NULL,
  BAIRRO VARCHAR(25) CONSTRAINT NN_TB_PJ_ENDERECO_BAIRRO NOT NULL,
  CIDADE INTEGER CONSTRAINT NN_TB_PJ_ENDERECO_CIDADE NOT NULL,
  ESTADO INTEGER CONSTRAINT NN_TB_PJ_ENDERECO_ESTADO NOT NULL,
  OBSERVACAO TEXT,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_PJ_ENDERECO_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_PJ_ENDERECO_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_PJ_ENDERECO_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_PJ_ENDERECO_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_PJ_ENDERECO_NR_SEQUENCIA PRIMARY KEY(NR_SEQUENCIA)
);

CREATE TABLE TB_PROFISSAO(
  CD_PROFISSAO SERIAL,
  NM_PROFISSAO VARCHAR(50) CONSTRAINT NN_TB_PROFISSAO_NM_PROFISSAO NOT NULL,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_PROFISSAO_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_PROFISSAO_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_PROFISSAO_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_PROFISSAO_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_PROFISSAO_CD_PROFISSAO PRIMARY KEY(CD_PROFISSAO)
);

CREATE TABLE tb_relacionados(
  cd_pessoa_fisica_1 INTEGER CONSTRAINT nn_tb_relacionados_cd_pessoa_fisica_1 NOT NULL,
  cd_pessoa_fisica_2 INTEGER CONSTRAINT nn_tb_relacionados_cd_pessoa_fisica_2 NOT NULL,
  cd_catg_relac INTEGER CONSTRAINT nn_tb_relacionados_cd_catg_relac NOT NULL,
  cd_catg_vl_relac INTEGER CONSTRAINT nn_tb_relacionados_cd_catg_vl_relac NOT NULL,
  cd_usuario_criacao INTEGER CONSTRAINT nn_tb_relacionados_cd_usuario_criacao NOT NULL,
  dt_usuario_criacao TIMESTAMP CONSTRAINT nn_tb_relacionados_dt_usuario_criacao NOT NULL,
  cd_usuario_atualiza INTEGER CONSTRAINT nn_tb_relacionados_cd_usuario_atualiza NOT NULL,
  dt_usuario_atualiza TIMESTAMP CONSTRAINT nn_tb_relacionados_dt_usuairo_atualiza NOT NULL,
  CONSTRAINT pk_tb_relacionados PRIMARY KEY (cd_pessoa_fisica_1,cd_pessoa_fisica_2),
  CONSTRAINT fk_tb_relacionados_cd_pessoa_fisica_1 FOREIGN KEY(cd_pessoa_fisica_1)
  REFERENCES tb_pessoa_fisica(cd_pessoa_fisica),
  CONSTRAINT fk_tb_relacionados_cd_pessoa_fisica_2 FOREIGN KEY(cd_pessoa_fisica_2)
  REFERENCES tb_pessoa_fisica(cd_pessoa_fisica),
  CONSTRAINT fk_tb_relacionados_cd_catg_relac FOREIGN KEY(cd_catg_relac,cd_catg_vl_relac)
  REFERENCES tb_categoria_valor(cd_categoria,cd_vl_categoria)
);

CREATE TABLE tb_relac_parametro(
  cd_catg_relac_1 INTEGER CONSTRAINT nn_tb_relac_parametro_cd_catg_relac_1  NOT NULL,
  cd_catg_vl_relac_1 INTEGER CONSTRAINT nn_tb_relac_parametro_cd_catg_vl_relac_1 NOT NULL,
  cd_catg_relac_2 INTEGER CONSTRAINT nn_tb_relac_parametro_cd_catg_relac_2 NOT NULL,
  cd_catg_vl_relac_2 INTEGER CONSTRAINT nn_tb_relac_parametro_cd_catg_vl_relac_2 NOT NULL,
  cd_usuario_criacao INTEGER CONSTRAINT nn_tb_relac_parametro_cd_usuario_criacao NOT NULL,
  dt_usuario_criacao TIMESTAMP CONSTRAINT nn_tb_relac_parametro_dt_usuario_criacao NOT NULL,
  cd_usuario_atualiza INTEGER CONSTRAINT nn_tb_relac_parametro_cd_usuario_atualiza NOT NULL,
  dt_usuario_atualiza TIMESTAMP CONSTRAINT nn_tb_relac_parametro_dt_usuario_atualiza NOT NULL,
  CONSTRAINT fk_tb_relac_parametro_catg_1 FOREIGN KEY (cd_catg_relac_1,cd_catg_vl_relac_1)
  REFERENCES tb_categoria_valor(cd_categoria,cd_vl_categoria),
  CONSTRAINT fk_tb_relac_parametro_catg_2 FOREIGN KEY (cd_catg_relac_2,cd_catg_vl_relac_2)
  REFERENCES tb_categoria_valor(cd_categoria,cd_vl_categoria)
);

CREATE TABLE TB_SERVICO_ADICIONAL(
  CD_SERV_ADICIONAL SERIAL,
  CD_ORDEM_SERVICO INTEGER,
  CD_PESSOA_FISICA INTEGER,
  CD_CATG_SERVICO INTEGER CONSTRAINT NN_TB_SERVICO_ADICIONAL_CD_CATG_SERVICO NOT NULL,
  CD_VL_CATG_SERVICO INTEGER CONSTRAINT NN_TB_SERVICO_ADICIONAL_CD_CATG_VL_SERVICO NOT NULL,
  CD_SETOR INTEGER,
  CD_VAGA INTEGER,
  DT_INICIO TIMESTAMP CONSTRAINT NN_TB_SERVICO_ADICIIONAL_DT_INICIO NOT NULL,
  DT_FIM TIMESTAMP,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_SERVICO_ADICIONAL_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_SERVICO_ADICIONAL_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_SERVICO_ADICIONAL_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_SERVICO_ADICIONAL_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_SERVICO_ADICIONAL_CD_SERV_ADICIONAL PRIMARY KEY(CD_SERV_ADICIONAL)
);

CREATE TABLE TB_SETOR(
  CD_SETOR SERIAL,
  CD_CONDOMINIO INTEGER CONSTRAINT NN_TB_SETOR_CD_CONDOMINIO NOT NULL,
  NM_SETOR VARCHAR(50) CONSTRAINT NN_TB_SETOR_NM_SETOR NOT NULL,
-------------------------------
  CD_SETOR_GRUPO INTEGER,
  RAMAL VARCHAR(4),
-------------------------------
  OBSERVACAO TEXT,
  IM_PERFIL OID,
  CD_CATG_TIPO INTEGER CONSTRAINT NN_TB_SETOR_CD_CATG_TIPO NOT NULL,
  CD_VL_CATG_TIPO INTEGER CONSTRAINT NN_TB_SETOR_CD_CATG_TIPO NOT NUll,
-------------------------------
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_SETOR_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_SETOR_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_SETOR_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_SETOR_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_SETOR_CD_SETOR PRIMARY KEY(CD_SETOR),
-------------------------------
  CONSTRAINT FK_TB_SETOR_CD_SETOR_GRUPO FOREIGN KEY(CD_SETOR_GRUPO)
  REFERENCES TB_SETOR(CD_SETOR)
-------------------------------
);

/*
Nivel de acesso
1 - Administrador
2 - Atendente
3 - Usuario
*/

CREATE TABLE TB_USUARIO(
  CD_USUARIO INTEGER CONSTRAINT NN_TB_USUARIO_CD_PF_USU NOT NULL,
  LOGIN VARCHAR(60) CONSTRAINT NN_TB_USUARIO_LOGIN NOT NULL,
  NIVEL INTEGER CONSTRAINT NN_TB_USUARIO_NIVEL NOT NULL,
  IE_STATUS CHAR(1) CONSTRAINT NN_TB_USUARIO_IE_STATUS NOT NULL,
  CD_USU_BANCO_OID BIGINT CONSTRAINT NN_TB_USUARIO_CD_USU_BANCO_OID NOT NULL,
  CD_USUARIO_CRIACAO INTEGER,
  DT_USUARIO_CRIACAO TIMESTAMP,
  CD_USUARIO_ATUALIZA INTEGER,
  DT_USUARIO_ATUALIZA TIMESTAMP,
  CONSTRAINT PK_TB_USUARIO_CD_USUARIO PRIMARY KEY(CD_USUARIO)
);

CREATE TABLE TB_VAGA_GARAGEM(
  CD_VAGA SERIAL,
  DS_VAGA VARCHAR(25) CONSTRAINT NN_TB_VAGA_GARAGEM_DS_VAGA NOT NULL,
  CD_SETOR INTEGER CONSTRAINT NN_TB_VAGA_GARAGEM_CD_SETOR NOT NULL,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_VAGA_GARAGEM_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_VAGA_GARAGEM_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_VAGA_GARAGEM_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_VAGA_GARAGEM_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_VAGA_GARAGEM_CD_VAGA PRIMARY KEY(CD_VAGA)
);

CREATE TABLE TB_PF_TELEFONE(
  CD_PF_FONE SERIAL,
  CD_PESSOA_FISICA INTEGER CONSTRAINT NN_TB_PF_TELEFONE_CD_PESSOA_FISICA NOT NULL,
  FONE VARCHAR(15) CONSTRAINT NN_TB_PF_TELEFONE_FONE NOT NULL,
  OBSERVACAO TEXT,
  CD_CATG_FONE_PF INTEGER CONSTRAINT NN_TB_PF_TELEFONE_CD_CATG_FONE_PF NOT NULL,
  CD_VL_CATG_FONE_PF INTEGER CONSTRAINT NN_TB_PF_TELEFONE_CD_CATG_VL_FONE_PF NOT NULL,
  CD_CATG_OPERADORA INTEGER CONSTRAINT NN_TB_PF_TELEFONE_CD_CATG_OPERADORA NOT NULL,
  CD_VL_CATG_OPERADORA INTEGER CONSTRAINT NN_TB_PF_TELEFONE_CD_CATG_VL_OPERADORA NOT NULL,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_PF_TELEFONE_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_PF_TELEFONE_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_PF_TELEFONE_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_PF_TELEFONE_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_PF_TELEFONE_CD_PF_FONE PRIMARY KEY(CD_PF_FONE)
);

CREATE TABLE TB_PJ_TELEFONE(
  CD_PJ_FONE SERIAL,
  CD_PESSOA_JURIDICA INTEGER CONSTRAINT NN_TB_PJ_TELEFONE_CD_PESSOA_JURIDICA NOT NULL,
  FONE VARCHAR(15) CONSTRAINT NN_TB_PJ_TELEFONE_FONE NOT NULL,
  OBSERVACAO TEXT,
  CD_CATG_FONE_PJ INTEGER CONSTRAINT NN_TB_PJ_TELEFONE_CD_CATG_FONE_PJ NOT NULL,
  CD_VL_CATG_FONE_PJ INTEGER CONSTRAINT NN_TB_PJ_TELEFONE_CD_CATG_VL_FONE_PJ NOT NULL,
  CD_CATG_OPERADORA INTEGER CONSTRAINT NN_TB_PJ_TELEFONE_CD_CATG_OPERADORA NOT NULL,
  CD_VL_CATG_OPERADORA INTEGER CONSTRAINT NN_TB_PJ_TELEFONE_CD_CATG_VL_OPERADORA NOT NULL,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_PJ_TELEFONE_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_PJ_TELEFONE_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_PJ_TELEFONE_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_PJ_TELEFONE_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_PJ_TELEFONE_CD_PJ_FONE PRIMARY KEY(CD_PJ_FONE)
);

CREATE TABLE TB_INFO_ESTUDOS(
  CD_INFO_ESTUDOS SERIAL,
  CD_PESSOA_FISICA INTEGER CONSTRAINT NN_TB_INFO_ESTUDOS_CD_PESSOA_FISICA NOT NULL, -- Quem
  CD_PESSOA_JURIDICA INTEGER CONSTRAINT NN_TB_INFO_ESTUDOS_CD_PESSOA_JURIDICA NOT NULL, -- Onde
  CD_CATG_CURSO INTEGER CONSTRAINT NN_TB_INFO_ESTUDOS_CD_CATG_CURSO NOT NULL, -- Cat Curso
  CD_VL_CATG_CURSO INTEGER CONSTRAINT NN_TB_INFO_ESTUDOS_CD_VL_CATG_CURSO NOT NULL, -- Qual Curso
  CD_CATG_PERIODO INTEGER CONSTRAINT NN_TB_INFO_ESTUDOS_CD_CATG_PERIODO NOT NULL, -- Cat Per�odo
  CD_VL_CATG_PERIODO INTEGER CONSTRAINT NN_TB_INFO_ESTUDOS_CD_VL_CATG_PERIODO NOT NULL, -- Matutino, Noturno, Integral
  DT_INICIO DATE CONSTRAINT NN_TB_INFO_ESTUDOS_DT_INICIO NOT NULL, -- In�cio do Curso
  DT_FIM DATE CONSTRAINT NN_TB_INFO_ESTUDOS_DT_FIM NOT NULL, -- Previs�o da Conclus�o
  ----------------------------------------------------------------------------------------
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_SETOR_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_SETOR_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_SETOR_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_SETOR_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_INFO_ESTUDOS_CD_INFO_ESTUDOS PRIMARY KEY(CD_INFO_ESTUDOS),
  CONSTRAINT UQ_TB_INFO_ESTUDOS
  UNIQUE (
    CD_PESSOA_FISICA,
    CD_PESSOA_JURIDICA,
    CD_VL_CATG_CURSO,
    CD_VL_CATG_PERIODO,
    DT_INICIO,
    DT_FIM
  )
);

--------------------------------- ALTERA��ES ADD CONSTRAINT FOREIGN KEY -------------------------------------


-- CONSTRAINTS PARA TB_INFO_ESTUDOS

-- FOREIGN KEY PARA PESSOA FISICA
ALTER TABLE TB_INFO_ESTUDOS ADD CONSTRAINT FK_TB_INFO_ESTUDOS_CD_PESSOA_FISICA
FOREIGN KEY(CD_PESSOA_FISICA) REFERENCES TB_PESSOA_FISICA(CD_PESSOA_FISICA);

-- FOREIGN KEY PARA PESSOA JUR�DICA
ALTER TABLE TB_INFO_ESTUDOS ADD CONSTRAINT FK_TB_INFO_ESTUDOS_CD_PESSOA_JURIDICA
FOREIGN KEY(CD_PESSOA_JURIDICA) REFERENCES TB_PESSOA_JURIDICA(CD_PESSOA_JURIDICA);

-- FOREIGN KEY CATG CURSO
ALTER TABLE TB_INFO_ESTUDOS ADD CONSTRAINT FK_TB_INFO_ESTUDOS_CD_CATG_CURSO_CD_VL_CATG_CURSO
FOREIGN KEY(CD_CATG_CURSO,CD_VL_CATG_CURSO) REFERENCES TB_CATEGORIA_VALOR(CD_CATEGORIA,CD_VL_CATEGORIA);

-- FOREIGN KEY CATG PER�ODO
ALTER TABLE TB_INFO_ESTUDOS ADD CONSTRAINT FK_TB_INFO_ESTUDOS_CD_CATG_PERIODO_CD_VL_CATG_PERIODO
FOREIGN KEY(CD_CATG_PERIODO,CD_VL_CATG_PERIODO) REFERENCES TB_CATEGORIA_VALOR(CD_CATEGORIA,CD_VL_CATEGORIA);


--  CONSTRAINTS PARA TB_OCORRENCIA
ALTER TABLE tb_ocorrencia ADD CONSTRAINT fk_tb_ocorrencia_cd_catg_tipo_cd_vl_catg_tipo
FOREIGN KEY(cd_catg_tipo,cd_vl_catg_tipo) REFERENCES tb_categoria_valor(cd_categoria,cd_vl_categoria);

ALTER TABLE TB_OCORRENCIA ADD CONSTRAINT FK_TB_OCORRENCIA_CD_SETOR
FOREIGN KEY(CD_SETOR) REFERENCES TB_SETOR(CD_SETOR);

-- CONSTRAINTS PARA TB_USUARIO
ALTER TABLE TB_USUARIO ADD CONSTRAINT FK_TB_USUARIO_CD_PESSOA_FISICA
FOREIGN KEY(CD_USUARIO) REFERENCES TB_PESSOA_FISICA(CD_PESSOA_FISICA);

ALTER TABLE TB_USUARIO ADD CONSTRAINT FK_TB_USUARIO_CD_USUARIO_CRIACAO
FOREIGN KEY(CD_USUARIO_CRIACAO) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_USUARIO ADD CONSTRAINT FK_TB_USUARIO_CD_USUARIO_ATUALIZA
FOREIGN KEY(CD_USUARIO_ATUALIZA) REFERENCES TB_USUARIO(CD_USUARIO);

-- CONSTRAINTS PARA TB_SETOR
ALTER TABLE TB_SETOR ADD CONSTRAINT FK_TB_SETOR_CD_CONDOMINIO
FOREIGN KEY(CD_CONDOMINIO) REFERENCES TB_PESSOA_JURIDICA(CD_PESSOA_JURIDICA);

ALTER TABLE TB_SETOR ADD CONSTRAINT FK_TB_SETOR_CD_CATG_TIPO_CD_VL_CATG_TIPO
FOREIGN KEY(CD_CATG_TIPO,CD_VL_CATG_TIPO) REFERENCES TB_CATEGORIA_VALOR(CD_CATEGORIA,CD_VL_CATEGORIA);

ALTER TABLE TB_SETOR ADD CONSTRAINT FK_TB_SETOR_CD_USUARIO_CRIACAO
FOREIGN KEY(CD_USUARIO_CRIACAO) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_SETOR ADD CONSTRAINT FK_TB_SETOR_CD_USUARIO_ATUALIZA
FOREIGN KEY(CD_USUARIO_ATUALIZA) REFERENCES TB_USUARIO(CD_USUARIO);

-- CONSTRAINTS PARA TB_SERVICO_ADICIONAL
ALTER TABLE TB_SERVICO_ADICIONAL ADD CONSTRAINT FK_TB_SERVICO_ADICIONAL_CD_PESSOA_FISICA
FOREIGN KEY(CD_PESSOA_FISICA) REFERENCES TB_PESSOA_FISICA(CD_PESSOA_FISICA);

ALTER TABLE TB_SERVICO_ADICIONAL ADD CONSTRAINT FK_TB_SERVICO_ADICIONAL_CD_CATG_SERVICO_CD_CATG_VL_SERVICO
FOREIGN KEY(CD_CATG_SERVICO,CD_VL_CATG_SERVICO) REFERENCES TB_CATEGORIA_VALOR(CD_CATEGORIA,CD_VL_CATEGORIA);

ALTER TABLE TB_SERVICO_ADICIONAL ADD CONSTRAINT FK_TB_SERVICO_ADICIONAL_CD_ORDEM_SERVICO
FOREIGN KEY(CD_ORDEM_SERVICO) REFERENCES TB_ORDEM_SERVICO(CD_ORDEM_SERVICO);

ALTER TABLE TB_SERVICO_ADICIONAL ADD CONSTRAINT FK_TB_SERVICO_ADICIONAL_CD_SETOR
FOREIGN KEY(CD_SETOR) REFERENCES TB_SETOR(CD_SETOR);

ALTER TABLE TB_SERVICO_ADICIONAL ADD CONSTRAINT FK_TB_SERVICO_ADICIONAL_CD_USUARIO_CRIACAO
FOREIGN KEY(CD_USUARIO_CRIACAO) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_SERVICO_ADICIONAL ADD CONSTRAINT FK_TB_SERVICO_ADICIONAL_CD_USUARIO_ATUALIZA
FOREIGN KEY(CD_USUARIO_ATUALIZA) REFERENCES TB_USUARIO(CD_USUARIO);

-- CONSTRAINTS PARA TB_RELACIONADOS
ALTER TABLE TB_RELACIONADOS ADD CONSTRAINT FK_TB_RELACIONADOS_CD_USUARIO_CRIACAO
FOREIGN KEY(CD_USUARIO_CRIACAO) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_RELACIONADOS ADD CONSTRAINT FK_TB_RELACIONADOS_CD_USUARIO_ATUALIZA
FOREIGN KEY(CD_USUARIO_ATUALIZA) REFERENCES TB_USUARIO(CD_USUARIO);

-- CONSTRAINTS PARA TB_PROFISSAO
ALTER TABLE TB_PROFISSAO ADD CONSTRAINT FK_TB_PROFISSAO_CD_USUARIO_CRIACAO
FOREIGN KEY(CD_USUARIO_CRIACAO) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_PROFISSAO ADD CONSTRAINT FK_TB_PROFISSAO_CD_USUARIO_ATUALIZA
FOREIGN KEY(CD_USUARIO_ATUALIZA) REFERENCES TB_USUARIO(CD_USUARIO);

-- CONSTRAINTS PARA TB_PJ_ENDERECO
ALTER TABLE TB_PJ_ENDERECO ADD CONSTRAINT FK_TB_PJ_ENDERECO_CD_PESSOA_JURIDICA
FOREIGN KEY(CD_PESSOA_JURIDICA) REFERENCES TB_PESSOA_JURIDICA(CD_PESSOA_JURIDICA);

ALTER TABLE TB_PJ_ENDERECO ADD CONSTRAINT FK_TB_PJ_ENDERECO_CD_CATG_END
FOREIGN KEY(CD_CATG_END) REFERENCES TB_CATEGORIA(CD_CATEGORIA);

ALTER TABLE TB_PJ_ENDERECO ADD CONSTRAINT FK_TB_PJ_ENDERECO_CD_CATG_END_CD_VL_CATG_END
FOREIGN KEY(CD_CATG_END,CD_VL_CATG_END) REFERENCES TB_CATEGORIA_VALOR(CD_CATEGORIA,CD_VL_CATEGORIA);

ALTER TABLE TB_PJ_ENDERECO ADD CONSTRAINT FK_TB_PJ_ENDERECO_CIDADE
FOREIGN KEY(CIDADE) REFERENCES TB_CIDADES(ID);

ALTER TABLE TB_PJ_ENDERECO ADD CONSTRAINT FK_TB_PJ_ENDERECO_ESTADO
FOREIGN KEY(ESTADO) REFERENCES TB_ESTADOS(ID);

ALTER TABLE TB_PJ_ENDERECO ADD CONSTRAINT FK_TB_PJ_ENDERECO_CD_USUARIO_CRIACAO
FOREIGN KEY(CD_USUARIO_CRIACAO) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_PJ_ENDERECO ADD CONSTRAINT FK_TB_PJ_ENDERECO_CD_USUARIO_ATUALIZA
FOREIGN KEY(CD_USUARIO_ATUALIZA) REFERENCES TB_USUARIO(CD_USUARIO);

-- CONSTRAINTS PARA TB_PF_ENDERECO
ALTER TABLE TB_PF_ENDERECO ADD CONSTRAINT FK_TB_PF_ENDERECO_CD_PESSOA_FISICA
FOREIGN KEY(CD_PESSOA_FISICA) REFERENCES TB_PESSOA_FISICA(CD_PESSOA_FISICA);

ALTER TABLE TB_PF_ENDERECO ADD CONSTRAINT FK_TB_PF_ENDERECO_CD_CATG_END_CD_VL_CATG_END
FOREIGN KEY(CD_CATG_END,CD_VL_CATG_END) REFERENCES TB_CATEGORIA_VALOR(CD_CATEGORIA,CD_VL_CATEGORIA);

ALTER TABLE TB_PF_ENDERECO ADD CONSTRAINT FK_TB_PF_ENDERECO_CIDADE
FOREIGN KEY(CIDADE) REFERENCES TB_CIDADES(ID);

ALTER TABLE TB_PF_ENDERECO ADD CONSTRAINT FK_TB_PF_ENDERECO_ESTADO
FOREIGN KEY(ESTADO) REFERENCES TB_ESTADOS(ID);

ALTER TABLE TB_PF_ENDERECO ADD CONSTRAINT FK_TB_PF_ENDERECO_CD_USUARIO_CRIACAO
FOREIGN KEY(CD_USUARIO_CRIACAO) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_PF_ENDERECO ADD CONSTRAINT FK_TB_PF_ENDERECO_CD_USUARIO_ATUALIZA
FOREIGN KEY(CD_USUARIO_ATUALIZA) REFERENCES TB_USUARIO(CD_USUARIO);

-- CONSTRAINTS PARA TB_PESSOA_JURIDICA
ALTER TABLE TB_PESSOA_JURIDICA ADD CONSTRAINT FK_TB_PESSOA_JURIDICA_CD_USUARIO_CRIACAO
FOREIGN KEY(CD_USUARIO_CRIACAO) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_PESSOA_JURIDICA ADD CONSTRAINT FK_TB_PESSOA_JURIDICA_CD_USUARIO_ATUALIZA
FOREIGN KEY(CD_USUARIO_ATUALIZA) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_PESSOA_JURIDICA ADD CONSTRAINT FK_TB_PESSOA_JURIDICA_CD_TIPO_EMPRESA
FOREIGN KEY(CD_CATG_TIPO_EMPRESA,CD_TIPO_EMPRESA) REFERENCES TB_CATEGORIA_VALOR(CD_CATEGORIA,CD_VL_CATEGORIA);

ALTER TABLE TB_PESSOA_JURIDICA ADD CONSTRAINT FK_TB_PESSOA_JURIDICA_CD_RAMO_ATIVIDADE
FOREIGN KEY(CD_CATG_RAMO_ATIVIDADE, CD_RAMO_ATIVIDADE) REFERENCES TB_CATEGORIA_VALOR(CD_CATEGORIA,CD_VL_CATEGORIA);

-- CONSTRAINTS PARA TB_PESSOA_FISICA
ALTER TABLE TB_PESSOA_FISICA ADD CONSTRAINT FK_TB_PESSOA_FISICA_UF_RG
FOREIGN KEY(UF_RG)  REFERENCES TB_ESTADOS(ID);

ALTER TABLE TB_PESSOA_FISICA ADD CONSTRAINT FK_TB_PESSOA_FISICA_CD_PESSOA_JURIDICA
FOREIGN KEY(CD_PESSOA_JURIDICA) REFERENCES TB_PESSOA_JURIDICA(CD_PESSOA_JURIDICA);

ALTER TABLE TB_PESSOA_FISICA ADD CONSTRAINT FK_TB_PESSOA_FISICA_CD_PROFISSAO
FOREIGN KEY(CD_PROFISSAO) REFERENCES TB_PROFISSAO(CD_PROFISSAO);

ALTER TABLE TB_PESSOA_FISICA ADD CONSTRAINT FK_TB_PESSOA_FISICA_CD_USUARIO_CRIACAO
FOREIGN KEY(CD_USUARIO_CRIACAO) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_PESSOA_FISICA ADD CONSTRAINT FK_TB_PESSOA_FISICA_CD_USUARIO_ATUALIZA
FOREIGN KEY(CD_USUARIO_ATUALIZA) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_PESSOA_FISICA ADD CONSTRAINT FK_TB_PESSOA_FISICA_CD_CIDADE_ORIGEM
FOREIGN KEY(CD_CIDADE_ORIGEM) REFERENCES TB_CIDADES(ID);

-- CONSTRAINTS PARA TB_ORDEM_SERVICO
ALTER TABLE TB_ORDEM_SERVICO ADD CONSTRAINT FK_TB_ORDEM_SERVICO_CD_OCORRENCIA
FOREIGN KEY(CD_OCORRENCIA) REFERENCES TB_OCORRENCIA(CD_OCORRENCIA);

ALTER TABLE TB_ORDEM_SERVICO ADD CONSTRAINT FK_TB_ORDEM_SERVICO_CD_PF_EXECUTOR
FOREIGN KEY(CD_PF_EXECUTOR) REFERENCES TB_PESSOA_FISICA(CD_PESSOA_FISICA);

ALTER TABLE TB_ORDEM_SERVICO ADD CONSTRAINT FK_TB_ORDEM_SERVICO_CD_PF_SOLICITANTE
FOREIGN KEY(CD_PF_SOLICITANTE) REFERENCES TB_PESSOA_FISICA(CD_PESSOA_FISICA);

ALTER TABLE TB_ORDEM_SERVICO ADD CONSTRAINT FK_TB_ORDEM_SERVICO_CD_USUARIO_CRIACAO
FOREIGN KEY(CD_USUARIO_CRIACAO) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_ORDEM_SERVICO ADD CONSTRAINT FK_TB_ORDEM_SERVICO_CD_USUARIO_ATUALIZA
FOREIGN KEY(CD_USUARIO_ATUALIZA) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_ORDEM_SERVICO ADD CONSTRAINT FK_TB_ORDEM_SERVICO_CD_SETOR
FOREIGN KEY(CD_SETOR) REFERENCES TB_SETOR(CD_SETOR);

ALTER TABLE tb_ordem_servico ADD CONSTRAINT fk_tb_ordem_servico_cd_catg_tipo_cd_catg_vl_tipo
FOREIGN KEY(cd_catg_tipo,cd_vl_catg_tipo) REFERENCES tb_categoria_valor(cd_categoria,cd_vl_categoria);

ALTER TABLE tb_ordem_servico ADD CONSTRAINT fk_tb_ordem_servico_cd_catg_sub_tipo_cd_catg_vl_sub_tipo
FOREIGN KEY(cd_catg_sub_tipo,cd_vl_catg_sub_tipo) REFERENCES tb_categoria_valor(cd_categoria,cd_vl_categoria);


-- CONSTRAINTS PARA TB_ORCAMENTO
ALTER TABLE TB_ORCAMENTO ADD CONSTRAINT FK_TB_ORCAMENTO_CD_ORDEM_SERVICO
FOREIGN KEY(CD_ORDEM_SERVICO) REFERENCES TB_ORDEM_SERVICO(CD_ORDEM_SERVICO);

ALTER TABLE TB_ORCAMENTO ADD CONSTRAINT FK_TB_ORCAMENTO_CD_USUARIO_CRIACAO
FOREIGN KEY(CD_USUARIO_CRIACAO) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_ORCAMENTO ADD CONSTRAINT FK_TB_ORCAMENTO_CD_USUARIO_ATUALIZA
FOREIGN KEY(CD_USUARIO_ATUALIZA) REFERENCES TB_USUARIO(CD_USUARIO);

-- CONSTRAINTS PARA TB_OCORRENCIA
ALTER TABLE TB_OCORRENCIA ADD CONSTRAINT FK_TB_OCORRENCIA_CD_PF_INFORMANTE
FOREIGN KEY(CD_PF_INFORMANTE) REFERENCES TB_PESSOA_FISICA(CD_PESSOA_FISICA);

ALTER TABLE TB_OCORRENCIA ADD CONSTRAINT FK_TB_OCORRENCIA_CD_USUARIO_CRIACAO
FOREIGN KEY(CD_USUARIO_CRIACAO) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_OCORRENCIA ADD CONSTRAINT FK_TB_OCORRENCIA_CD_USUARIO_ATUALIZA
FOREIGN KEY(CD_USUARIO_ATUALIZA) REFERENCES TB_USUARIO(CD_USUARIO);

-- CONSTRAINTS PARA TB_OCORRENCIA_PF_ENVOLVIDA
ALTER TABLE TB_OCORRENCIA_PF_ENVOLVIDA ADD CONSTRAINT FK_TB_OCORRENCIA_PF_ENVOLVIDA_CD_PESSOA_FISICA
FOREIGN KEY(CD_PESSOA_FISICA) REFERENCES TB_PESSOA_FISICA(CD_PESSOA_FISICA);

ALTER TABLE TB_OCORRENCIA_PF_ENVOLVIDA ADD CONSTRAINT FK_TB_OCORRENCIA_PF_ENVOLVIDA_CD_OCORRENCIA
FOREIGN KEY(CD_OCORRENCIA) REFERENCES TB_OCORRENCIA(CD_OCORRENCIA);

ALTER TABLE TB_OCORRENCIA_PF_ENVOLVIDA ADD CONSTRAINT FK_TB_OCORRENCIA_PF_ENVOLVIDA_CD_USUARIO_CRIACAO
FOREIGN KEY(CD_USUARIO_CRIACAO) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_OCORRENCIA_PF_ENVOLVIDA ADD CONSTRAINT FK_TB_OCORRENCIA_PF_ENVOLVIDA_CD_USUARIO_ATUALIZA
FOREIGN KEY(CD_USUARIO_ATUALIZA) REFERENCES TB_USUARIO(CD_USUARIO);

-- CONSTRAINTS PARA TB_MORADOR_ENDERECO
ALTER TABLE TB_MORADOR_ENDERECO ADD CONSTRAINT FK_TB_MORADOR_ENDERECO_CD_PESSOA_FISICA
FOREIGN KEY(CD_PESSOA_FISICA) REFERENCES TB_PESSOA_FISICA(CD_PESSOA_FISICA);

ALTER TABLE TB_MORADOR_ENDERECO ADD CONSTRAINT FK_TB_MORADOR_ENDERECO_CD_APARTAMENTO
FOREIGN KEY(CD_APARTAMENTO) REFERENCES TB_SETOR(CD_SETOR);

ALTER TABLE TB_MORADOR_ENDERECO ADD CONSTRAINT FK_TB_MORADOR_ENDERECO_CD_USUARIO_CRIACAO
FOREIGN KEY(CD_USUARIO_CRIACAO) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_MORADOR_ENDERECO ADD CONSTRAINT FK_TB_MORADOR_ENDERECO_CD_USUARIO_ATUALIZA
FOREIGN KEY(CD_USUARIO_ATUALIZA) REFERENCES TB_USUARIO(CD_USUARIO);

-- CONSTRAINTS PARA TB_ITENS_ORCAMENTO
ALTER TABLE TB_ITENS_ORCAMENTO ADD CONSTRAINT FK_TB_ITENS_ORCAMENTO_CD_PESSOA_JURIDICA
FOREIGN KEY(CD_PESSOA_JURIDICA) REFERENCES TB_PESSOA_JURIDICA(CD_PESSOA_JURIDICA);

ALTER TABLE TB_ITENS_ORCAMENTO ADD CONSTRAINT FK_TB_ITENS_ORCAMENTO_CD_ORCAMENTO
FOREIGN KEY(CD_ORCAMENTO) REFERENCES TB_ORCAMENTO(CD_ORCAMENTO);

ALTER TABLE TB_ITENS_ORCAMENTO ADD CONSTRAINT FK_TB_ITENS_ORCAMENTO_CD_USUARIO_CRIACAO
FOREIGN KEY(CD_USUARIO_CRIACAO) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_ITENS_ORCAMENTO ADD CONSTRAINT FK_TB_ITENS_ORCAMENTO_CD_USUARIO_ATUALIZA
FOREIGN KEY(CD_USUARIO_ATUALIZA) REFERENCES TB_USUARIO(CD_USUARIO);

-- CONSTRAINTS PARA TB_CATEGORIA_VALOR
ALTER TABLE TB_CATEGORIA_VALOR ADD CONSTRAINT FK_TB_CATEGORIA_VALOR_CD_CATEGORIA
FOREIGN KEY(CD_CATEGORIA) REFERENCES TB_CATEGORIA(CD_CATEGORIA);

ALTER TABLE TB_CATEGORIA_VALOR ADD CONSTRAINT FK_TB_CATEGORIA_VALOR_CD_CAT_GRUPO_CD_GRUPO
FOREIGN KEY(CD_CAT_GRUPO,CD_GRUPO) REFERENCES TB_CATEGORIA_VALOR(CD_CATEGORIA,CD_VL_CATEGORIA);

ALTER TABLE TB_CATEGORIA_VALOR ADD CONSTRAINT FK_TB_CATEGORIA_VALOR_CD_USUARIO_CRIACAO
FOREIGN KEY(CD_USUARIO_CRIACAO) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_CATEGORIA_VALOR ADD CONSTRAINT FK_TB_CATEGORIA_VALOR_CD_USUARIO_ATUALIZA
FOREIGN KEY(CD_USUARIO_ATUALIZA) REFERENCES TB_USUARIO(CD_USUARIO);

-- CONSTRAINTS PARA TB_CATEGORIA
ALTER TABLE TB_CATEGORIA ADD CONSTRAINT FK_TB_CATEGORIA_CD_USUARIO_CRIACAO
FOREIGN KEY(CD_USUARIO_CRIACAO) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_CATEGORIA ADD CONSTRAINT FK_TB_CATEGORIA_CD_USUARIO_ATUALIZA
FOREIGN KEY(CD_USUARIO_ATUALIZA) REFERENCES TB_USUARIO(CD_USUARIO);

-- CONSTRAINTS PARA TB_APARTAMENTO
ALTER TABLE TB_APARTAMENTO ADD CONSTRAINT FK_TB_APARTAMENTO_CD_SETOR
FOREIGN KEY(CD_SETOR) REFERENCES TB_SETOR(CD_SETOR);

ALTER TABLE TB_APARTAMENTO ADD CONSTRAINT FK_TB_APARTAMENTO_CD_CATG_TIPO_CD_VL_CATG_TIPO
FOREIGN KEY(CD_CATG_TIPO,CD_VL_CATG_TIPO) REFERENCES TB_CATEGORIA_VALOR(CD_CATEGORIA,CD_VL_CATEGORIA);

ALTER TABLE TB_APARTAMENTO ADD CONSTRAINT FK_TB_APARTAMENTO_CD_USUARIO_CRIACAO
FOREIGN KEY(CD_USUARIO_CRIACAO) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_APARTAMENTO ADD CONSTRAINT FK_TB_APARTAMENTO_CD_USUARIO_ATUALIZA
FOREIGN KEY(CD_USUARIO_ATUALIZA) REFERENCES TB_USUARIO(CD_USUARIO);

-- CONSTRAINTS PARA TB_VAGA_GARAGEM
ALTER TABLE TB_VAGA_GARAGEM ADD CONSTRAINT FK_TB_VAGA_GARAGEM_CD_SETOR
FOREIGN KEY(CD_SETOR) REFERENCES TB_SETOR(CD_SETOR);

ALTER TABLE TB_VAGA_GARAGEM ADD CONSTRAINT FK_TB_VAGA_GARAGEM_CD_USUARIO_CRIACAO
FOREIGN KEY(CD_USUARIO_CRIACAO) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_VAGA_GARAGEM ADD CONSTRAINT FK_TB_VAGA_GARAGEM_CD_USUARIO_ATUALIZA
FOREIGN KEY(CD_USUARIO_ATUALIZA) REFERENCES TB_USUARIO(CD_USUARIO);

-- CONSTRAINTS PARA TB_PF_TELEFONE
ALTER TABLE TB_PF_TELEFONE ADD CONSTRAINT FK_TB_PF_TELEFONE_CD_CATG_FONE_PF_CD_VL_CATG_FONE_PF
FOREIGN KEY(CD_CATG_FONE_PF,CD_VL_CATG_FONE_PF)  REFERENCES TB_CATEGORIA_VALOR(CD_CATEGORIA,CD_VL_CATEGORIA);

ALTER TABLE TB_PF_TELEFONE ADD CONSTRAINT FK_TB_PF_TELEFONE
FOREIGN KEY(CD_PESSOA_FISICA) REFERENCES TB_PESSOA_FISICA(CD_PESSOA_FISICA);
ALTER TABLE TB_PF_TELEFONE ADD CONSTRAINT FK_TB_PF_TELEFONE_CD_USUARIO_CRIACAO
FOREIGN KEY(CD_USUARIO_CRIACAO) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_PF_TELEFONE ADD CONSTRAINT FK_TB_PF_TELEFONE_CD_USUARIO_ATUALIZA
FOREIGN KEY(CD_USUARIO_ATUALIZA) REFERENCES TB_USUARIO(CD_USUARIO);

-- CONSTRAINTS PARA TB_PJ_TELEFONE
ALTER TABLE TB_PJ_TELEFONE ADD CONSTRAINT FK_TB_PJ_TELEFONE_CD_CATG_FONE_PJ_CD_VL_CATG_FONE_PJ
FOREIGN KEY(CD_CATG_FONE_PJ,CD_VL_CATG_FONE_PJ)  REFERENCES TB_CATEGORIA_VALOR(CD_CATEGORIA,CD_VL_CATEGORIA);

ALTER TABLE TB_PJ_TELEFONE ADD CONSTRAINT FK_TB_PJ_TELEFONE
FOREIGN KEY(CD_PESSOA_JURIDICA) REFERENCES TB_PESSOA_JURIDICA(CD_PESSOA_JURIDICA);

ALTER TABLE TB_PJ_TELEFONE ADD CONSTRAINT FK_TB_PJ_TELEFONE_CD_USUARIO_CRIACAO
FOREIGN KEY(CD_USUARIO_CRIACAO) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_PJ_TELEFONE ADD CONSTRAINT FK_TB_PJ_TELEFONE_CD_USUARIO_ATUALIZA
FOREIGN KEY(CD_USUARIO_ATUALIZA) REFERENCES TB_USUARIO(CD_USUARIO);

----------------------------- Tabelas de Logs -----------------------------

CREATE TABLE TB_APARTAMENTO_LOG(
  NR_SEQ_LOG INTEGER,
  USU_EXECUTOR INTEGER CONSTRAINT NN_TB_APARTAMENTO_LOG_USU_EXECUTOR NOT NULL,
  DT_EXECUTOR TIMESTAMP CONSTRAINT NN_TB_APARTAMENTO_LOG_DT_EXECUTOR NOT NULL,
  COMANDO_EXECUTADO CHAR(1) CONSTRAINT NN_TB_APARTAMENTO_LOG_COMANDO_EXECUTADO NOT NULL,
  CD_APARTAMENTO INTEGER CONSTRAINT NN_TB_APARTAMENTO_LOG_CD_APARTAMENTO NOT NULL,
  CD_PREDIO INTEGER CONSTRAINT NN_TB_APARTAMENTO_LOG_CD_PREDIO NOT NULL,
  DESC_APARTAMENTO VARCHAR(10) CONSTRAINT NN_TB_APARTAMENTO_LOG_DESC_APARTAMENTO NOT NULL,
  CD_CATG_TIPO INTEGER CONSTRAINT NN_TB_APARTAMENTO_LOG_CD_CATG_TIPO NOT NULL,
  CD_VL_CATG_TIPO INTEGER CONSTRAINT NN_TB_APARTAMENTO_LOG_CD_CATG_TIPO NOT NUll,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_APARTAMENTO_LOG_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_APARTAMENTO_LOG_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_APARTAMENTO_LOG_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_APARTAMENTO_LOG_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_APARTAMENTO_LOG_NR_SEQ_LOG PRIMARY KEY(NR_SEQ_LOG)
);

CREATE TABLE TB_CATEGORIA_LOG(
  NR_SEQ_LOG INTEGER,
  USU_EXECUTOR INTEGER CONSTRAINT NN_TB_CATEGORIA_LOG_USU_EXECUTOR NOT NULL,
  DT_EXECUTOR TIMESTAMP CONSTRAINT NN_TB_CATEGORIA_LOG_DT_EXECUTOR NOT NULL,
  COMANDO_EXECUTADO CHAR(1) CONSTRAINT NN_TB_CATEGORIA_LOG_COMANDO_EXECUTADO NOT NULL,
  CD_CATEGORIA INTEGER CONSTRAINT NN_TB_CATEGORIA_LOG_CD_CATEGORIA NOT NULL,
  DESC_CATEGORIA VARCHAR(50) CONSTRAINT NN_TB_CATEGORIA_LOG_DESC_CATEGORIA NOT NULL,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_CATEGORIA_LOG_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_CATEGORIA_LOG_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_CATEGORIA_LOG_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_CATEGORIA_LOG_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_CATEGORIA_LOG_NR_SEQ_LOG PRIMARY KEY(NR_SEQ_LOG)
);

CREATE TABLE TB_CATEGORIA_VALOR_LOG(
  NR_SEQ_LOG INTEGER,
  USU_EXECUTOR INTEGER CONSTRAINT NN_TB_CATEGORIA_VALOR_LOG_USU_EXECUTOR NOT NULL,
  DT_EXECUTOR TIMESTAMP CONSTRAINT NN_TB_CATEGORIA_VALOR_LOG_DT_EXECUTOR NOT NULL,
  COMANDO_EXECUTADO CHAR(1) CONSTRAINT NN_TB_CATEGORIA_VALOR_LOG_COMANDO_EXECUTADO NOT NULL,
  CD_VL_CATEGORIA INTEGER CONSTRAINT NN_TB_CATEGORIA_VALOR_LOG_NR_SEQ_LOG NOT NULL,
  CD_CATEGORIA INTEGER CONSTRAINT NN_TB_CATEGORIA_VALOR_LOG_CD_CATEGORIA NOT NULL,
  DESC_VL_CATG VARCHAR(40) CONSTRAINT NN_TB_CATEGORIA_VALOR_LOG_DESC_VL_CATG NOT NULL,
  GENERO VARCHAR(2),
  CD_GRUPO INTEGER,
  CD_CAT_GRUPO INTEGER,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_CATEGORIA_VALOR_LOG_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_CATEGORIA_VALOR_LOG_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_CATEGORIA_VALOR_LOG_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_CATEGORIA_VALOR_LOG_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_CATEGORIA_VALOR_LOG_NR_SEQ_LOG PRIMARY KEY(NR_SEQ_LOG)
);

CREATE TABLE TB_ITENS_ORCAMENTO_LOG(
  NR_SEQ_LOG INTEGER,
  USU_EXECUTOR INTEGER CONSTRAINT NN_TB_ITENS_ORCAMENTO_LOG_USU_EXECUTOR NOT NULL,
  DT_EXECUTOR TIMESTAMP CONSTRAINT NN_TB_ITENS_ORCAMENTO_LOG_DT_EXECUTOR NOT NULL,
  COMANDO_EXECUTADO CHAR(1) CONSTRAINT NN_TB_ITENS_ORCAMENTO_LOG_COMANDO_EXECUTADO NOT NULL,
  NR_SEQUENCIA INTEGER CONSTRAINT NN_TB_ITENS_ORCAMENTO_LOG_NR_SEQUENCIA NOT NULL,
  CD_ORCAMENTO INTEGER CONSTRAINT NN_TB_ITENS_ORCAMENTO_LOG_CD_ORCAMENTO NOT NULL,
  CD_PESSOA_JURIDICA INTEGER CONSTRAINT NN_TB_ITENS_ORCAMENTO_LOG_CD_PESSOA_JURIDICA NOT NULL,
  DESC_ITEM VARCHAR(50) CONSTRAINT NN_TB_ITENS_ORCAMENTO_LOG_DESC_ITEM NOT NULL,
  QT_ITEM INTEGER CONSTRAINT NN_TB_ITENS_ORCAMENTO_LOG_QT_ITEM NOT NULL,
  VALOR_UNIT NUMERIC(12,2) CONSTRAINT NN_TB_ITENS_ORCAMENTO_LOG_VALOR_UNIT NOT NULL,
  VALOR_TOTAL NUMERIC(12,2) CONSTRAINT NN_TB_ITENS_ORCAMENTO_LOG_VALOR_TOTAL NOT NULL,
  IE_APROVADO CHAR(1) CONSTRAINT NN_TB_ITENS_ORCAMENTO_LOG_IE_APROVADO NOT NULL,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_ITENS_ORCAMENTO_LOG_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_ITENS_ORCAMENTO_LOG_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_ITENS_ORCAMENTO_LOG_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_ITENS_ORCAMENTO_LOG_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_ITENS_ORCAMENTO_LOG_NR_SEQ_LOG PRIMARY KEY(NR_SEQ_LOG)
);

CREATE TABLE TB_MORADOR_ENDERECO_LOG(
  NR_SEQ_LOG INTEGER,
  USU_EXECUTOR INTEGER CONSTRAINT NN_TB_MORADOR_ENDERECO_LOG_USU_EXECUTOR NOT NULL,
  DT_EXECUTOR TIMESTAMP CONSTRAINT NN_TB_MORADOR_ENDERECO_LOG_DT_EXECUTOR NOT NULL,
  COMANDO_EXECUTADO CHAR(1) CONSTRAINT NN_TB_MORADOR_ENDERECO_LOG_COMANDO_EXECUTADO NOT NULL,
  NR_SEQUENCIA INTEGER CONSTRAINT NN_TB_MORADOR_ENDERECO_LOG_NR_SEQUENCIA NOT NULL,
  CD_PESSOA_FISICA INTEGER CONSTRAINT NN_TB_MORADOR_ENDERECO_LOG_CD_PESSOA_FISICA NOT NULL,
  CD_APARTAMENTO INTEGER CONSTRAINT NN_TB_MORADOR_ENDERECO_LOG_CD_APARTAMENTO NOT NULL,
  DT_ENTRADA TIMESTAMP CONSTRAINT NN_TB_MORADOR_ENDERECO_LOG_DT_ENTRADA NOT NULL,
  DT_SAIDA TIMESTAMP,
  FG_RESIDENTE CHAR(1),
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_MORADOR_ENDERECO_LOG_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_MORADOR_ENDERECO_LOG_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_MORADOR_ENDERECO_LOG_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_MORADOR_ENDERECO_LOG_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_MORADOR_ENDERECO_LOG_NR_SEQ_LOG PRIMARY KEY(NR_SEQ_LOG)
);

CREATE TABLE TB_OCORRENCIA_PF_ENVOLVIDA_LOG(
  NR_SEQ_LOG INTEGER,
  USU_EXECUTOR INTEGER CONSTRAINT NN_TB_OCORRENCIA_PF_ENVOLVIDA_LOG_USU_EXECUTOR NOT NULL,
  DT_EXECUTOR TIMESTAMP CONSTRAINT NN_TB_OCORRENCIA_PF_ENVOLVIDA_LOG_DT_EXECUTOR NOT NULL,
  COMANDO_EXECUTADO CHAR(1) CONSTRAINT NN_TB_OCORRENCIA_PF_ENVOLVIDA_LOG_COMANDO_EXECUTADO NOT NULL,
  CD_OCORRENCIA INTEGER CONSTRAINT NN_TB_OCORRENCIA_PF_ENVOLVIDA_LOG_CD_OCORRENCIA NOT NULL,
  CD_PESSOA_FISICA INTEGER CONSTRAINT NN_TB_OCORRENCIA_PF_ENVOLVIDA_LOG_CD_PESSOA_FISICA NOT NULL,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_OCORRENCIA_PF_ENVOLVIDA_LOG_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_OCORRENCIA_PF_ENVOLVIDA_LOG_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_OCORRENCIA_PF_ENVOLVIDA_LOG_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_OCORRENCIA_PF_ENVOLVIDA_LOG_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_CD_OCORRENCIA_LOG_NR_SEQ_LOG PRIMARY KEY(NR_SEQ_LOG)
);

CREATE TABLE TB_OCORRENCIA_LOG(
  NR_SEQ_LOG INTEGER,
  USU_EXECUTOR INTEGER CONSTRAINT NN_TB_OCORRENCIA_LOG_USU_EXECUTOR NOT NULL,
  DT_EXECUTOR TIMESTAMP CONSTRAINT NN_TB_OCORRENCIA_LOG_DT_EXECUTOR NOT NULL,
  COMANDO_EXECUTADO CHAR(1) CONSTRAINT NN_TB_OCORRENCIA_LOG_COMANDO_EXECUTADO NOT NULL,
  CD_OCORRENCIA INTEGER CONSTRAINT NN_TB_OCORRENCIA_LOG_CD_OCORRENCIA NOT NULL,
  CD_SETOR INTEGER,
  CD_PF_INFORMANTE INTEGER CONSTRAINT NN_TB_OCORRENCIA_LOG_CD_PF_INFORMANTE NOT NULL,
  DESC_ASSUNTO VARCHAR(50) CONSTRAINT NN_TB_OCORRENCIA_LOG_DESC_ASSUNTO NOT NULL,
  DESC_OCORRENCIA TEXT CONSTRAINT NN_TB_OCORRENCIA_LOG_DESC_OCORRENCIA NOT NULL,
  DT_OCORRENCIA TIMESTAMP CONSTRAINT NN_TB_OCORRENCIA_LOG_DT_OCORRENCIA NOT NULL,
  DT_FIM TIMESTAMP,
  DESC_CONCLUSAO TEXT,
  CD_CATG_ESTAGIO INTEGER CONSTRAINT NN_TB_OCORRENCIA_LOG_CD_CATG_ESTAGIO NOT NULL,
  CD_VL_CATG_ESTAGIO INTEGER CONSTRAINT NN_TB_OCORRENCIA_LOG_CD_CATG_VL_ESTAGIO NOT NULL,
  CD_CATG_TIPO INTEGER CONSTRAINT NN_TB_OCORRENCIA_LOG_CD_CATG_TIPO NOT NULL,
  CD_VL_CATG_TIPO INTEGER CONSTRAINT NN_TB_OCORRENCIA_LOG_CD_CATG_TIPO NOT NULL,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_OCORRENCIA_LOG_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_OCORRENCIA_LOG_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_OCORRENCIA_LOG_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_OCORRENCIA_LOG_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_OCORRENCIA_LOG_NR_SEQ_LOG PRIMARY KEY(NR_SEQ_LOG)
);

CREATE TABLE TB_ORCAMENTO_LOG(
  NR_SEQ_LOG INTEGER,
  USU_EXECUTOR INTEGER CONSTRAINT NN_TB_ORCAMENTO_LOG_USU_EXECUTOR NOT NULL,
  DT_EXECUTOR TIMESTAMP CONSTRAINT NN_TB_ORCAMENTO_LOG_DT_EXECUTOR NOT NULL,
  COMANDO_EXECUTADO CHAR(1) CONSTRAINT NN_TB_ORCAMENTO_LOG_COMANDO_EXECUTADO NOT NULL,
  CD_ORCAMENTO INTEGER CONSTRAINT NN_TB_ORCAMENTO_LOG_CD_ORCAMENTO NOT NULL,
  CD_ORDEM_SERVICO INTEGER,
  DS_ORCAMENTO VARCHAR(250) CONSTRAINT NN_TB_ORCAMENTO_DS_ORCAMENTO NOT NULL,
  DT_ORCAMENTO TIMESTAMP CONSTRAINT NN_TB_ORCAMENTO_LOG_DT_ORCAMENTO NOT NULL,
  DT_FIM TIMESTAMP,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_ORCAMENTO_LOG_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_ORCAMENTO_LOG_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_ORCAMENTO_LOG_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_ORCAMENTO_LOG_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_ORCAMENTO_LOG_NR_SEQ_LOG PRIMARY KEY(NR_SEQ_LOG)
);

CREATE TABLE TB_ORDEM_SERVICO_LOG(
  NR_SEQ_LOG INTEGER,
  USU_EXECUTOR INTEGER CONSTRAINT NN_TB_ORDEM_SERVICO_LOG_USU_EXECUTOR NOT NULL,
  DT_EXECUTOR TIMESTAMP CONSTRAINT NN_TB_ORDEM_SERVICO_LOG_DT_EXECUTOR NOT NULL,
  COMANDO_EXECUTADO CHAR(1) CONSTRAINT NN_TB_ORDEM_SERVICO_LOG_COMANDO_EXECUTADO NOT NULL,
  CD_ORDEM_SERVICO INTEGER CONSTRAINT NN_TB_ORDEM_SERVICO_LOG_CD_ORDEM_SERVICO NOT NULL,
  CD_SETOR INTEGER,
  CD_OCORRENCIA INTEGER,
  CD_PF_EXECUTOR INTEGER,
  CD_PF_SOLICITANTE INTEGER CONSTRAINT NN_TB_ORDEM_SERVICO_LOG_CD_PF_SOLICITANTE NOT NULL,
  DESC_ASSUNTO VARCHAR(50) CONSTRAINT NN_TB_ORDEM_SERVICO_LOG_DESC_ASSUNTO NOT NULL,
  DESC_ORDEM_SERVICO TEXT CONSTRAINT NN_TB_ORDEM_SERVICO_LOG_DESC_ORDEM_SERVICO NOT NULL,
  DT_INICIO TIMESTAMP CONSTRAINT NN_TB_ORDEM_SERVICO_LOG_DT_INICIO NOT NULL,
  DT_FIM TIMESTAMP,
  CD_CATG_ESTAGIO INTEGER CONSTRAINT NN_TB_ORDEM_SERVICO_LOG_CD_CATG_ESTAGIO NOT NULL,
  CD_VL_CATG_ESTAGIO INTEGER CONSTRAINT NN_TB_ORDEM_SERVICO_LOG_CD_VL_CATG_ESTAGIO NOT NULL,
  CD_CATG_AVAL_ATENDIMENTO INTEGER,
  CD_VL_CATG_AVAL_ATENDIMENTO INTEGER,
  CD_CATG_AVAL_QUALIDADE INTEGER,
  CD_VL_CATG_AVAL_QUALIDADE INTEGER,
  DESC_CONCLUSAO TEXT,
--------------------------------------------------------------
  VALOR_MATERIAL NUMERIC(7,2),
  VALOR_SERVICO NUMERIC(7,2),
--------------------------------------------------------------
  CD_CATG_TIPO INTEGER CONSTRAINT NN_TB_ORDEM_SERVICO_CD_CATG_TIPO NOT NULL,
  CD_VL_CATG_TIPO INTEGER CONSTRAINT NN_TB_ORDEM_SERVICO_CD_CATG_TIPO NOT NULL,
--------------------------------------------------------------
  CD_CATG_SUB_TIPO INTEGER CONSTRAINT NN_TB_ORDEM_SERVICO_CD_CATG_SUB_TIPO NOT NULL,
  CD_VL_CATG_SUB_TIPO INTEGER CONSTRAINT NN_TB_ORDEM_SERVICO_CD_VL_CATG_SUB_TIPO NOT NULL,
--------------------------------------------------------------
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_ORDEM_SERVICO_LOG_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_ORDEM_SERVICO_LOG_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_ORDEM_SERVICO_LOG_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_ORDEM_SERVICO_LOG_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_ORDEM_SERVICO_LOG_NR_SEQ_LOG PRIMARY KEY(NR_SEQ_LOG)
);

CREATE TABLE TB_PESSOA_FISICA_LOG(
  NR_SEQ_LOG INTEGER,
  USU_EXECUTOR INTEGER CONSTRAINT NN_TB_PESSOA_FISICA_LOG_USU_EXECUTOR NOT NULL,
  DT_EXECUTOR TIMESTAMP CONSTRAINT NN_TB_PESSOA_FISICA_LOG_DT_EXECUTOR NOT NULL,
  COMANDO_EXECUTADO CHAR(1) CONSTRAINT NN_TB_PESSOA_FISICA_LOG_COMANDO_EXECUTADO NOT NULL,
  CD_PESSOA_FISICA INTEGER CONSTRAINT NN_TB_PESSOA_FISICA_LOG_CD_PESSOA_FISICA NOT NULL,
  CD_PESSOA_JURIDICA INTEGER,
  CD_PROFISSAO INTEGER,
  NM_PESSOA_FISICA VARCHAR(50) CONSTRAINT NN_TB_PESSOA_FISICA_LOG_NM_PESSOA_FISICA NOT NULL,
  CPF VARCHAR(14),
  RG VARCHAR(15),
  UF_RG INTEGER,
  EMAIL VARCHAR(60),
  DT_NASCIMENTO DATE,
  IE_SEXO CHAR(1) CONSTRAINT NN_TB_PESSOA_FISICA_LOG_IE_SEXO NOT NULL,
  IM_PERFIL OID,
  CD_CIDADE_ORIGEM INTEGER,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_PESSOA_FISICA_LOG_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_PESSOA_FISICA_LOG_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_PESSOA_FISICA_LOG_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_PESSOA_FISICA_LOG_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_PESSAO_FISICA_LOG_NR_SEQ_LOG PRIMARY KEY(NR_SEQ_LOG)
);

CREATE TABLE TB_PESSOA_JURIDICA_LOG(
  NR_SEQ_LOG INTEGER,
  USU_EXECUTOR INTEGER CONSTRAINT NN_TB_PESSOA_JURIDICA_LOG_USU_EXECUTOR NOT NULL,
  DT_EXECUTOR TIMESTAMP CONSTRAINT NN_TB_PESSOA_JURIDICA_LOG_DT_EXECUTOR NOT NULL,
  COMANDO_EXECUTADO CHAR(1) CONSTRAINT NN_TB_PESSOA_JURIDICA_LOG_COMANDO_EXECUTADO NOT NULL,
  CD_PESSOA_JURIDICA INTEGER CONSTRAINT NN_TB_PESSOA_JURIDICA_LOG_CD_PESSOA_JURIDICA NOT NULL,
  CNPJ VARCHAR(18),
  NM_FANTASIA VARCHAR(50) CONSTRAINT NN_TB_PESSOA_JURIDICA_LOG_NM_FANTASIA NOT NULL,
  DESC_RAZAO VARCHAR(50) CONSTRAINT NN_TB_PESSOA_JURIDICA_LOG_DESC_RAZAO NOT NULL,
  CD_CATG_TIPO_EMPRESA INTEGER,
  CD_TIPO_EMPRESA INTEGER,
  CD_CATG_RAMO_ATIVIDADE INTEGER,
  CD_RAMO_ATIVIDADE INTEGER,
  IM_PERFIL OID,
  EMAIL VARCHAR(30),
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_PESSOA_JURIDICA_LOG_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_PESSOA_JURIDICA_LOG_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_PESSOA_JURIDICA_LOG_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_PESSOA_JURIDICA_LOG_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_PESSAO_JURIDICA_LOG_NR_SEQ_LOG PRIMARY KEY(NR_SEQ_LOG)
);

CREATE TABLE TB_PF_ENDERECO_LOG(
  NR_SEQ_LOG INTEGER,
  USU_EXECUTOR INTEGER CONSTRAINT NN_TB_PF_ENDERECO_LOG_USU_EXECUTOR NOT NULL,
  DT_EXECUTOR TIMESTAMP CONSTRAINT NN_TB_PF_ENDERECO_LOG_DT_EXECUTOR NOT NULL,
  COMANDO_EXECUTADO CHAR(1) CONSTRAINT NN_TB_PF_ENDERECO_LOG_COMANDO_EXECUTADO NOT NULL,
  NR_SEQUENCIA INTEGER CONSTRAINT NN_TB_PF_ENDERECO_LOG_NR_SEQUENCIA NOT NULL,
  CD_CATG_END INTEGER CONSTRAINT NN_TB_PF_ENDERECO_LOG_CD_CATG_END NOT NULL,
  CD_VL_CATG_END INTEGER CONSTRAINT NN_TB_PF_ENDERECO_LOG_CD_VL_CATG_END NOT NULL,
  CD_PESSOA_FISICA INTEGER CONSTRAINT NN_TB_PF_ENDERECO_LOG_CD_PESSOA_FISICA NOT NULL,
  CEP VARCHAR(9) CONSTRAINT NN_TB_PF_ENDERECO_LOG_CEP NOT NULL,
  RUA VARCHAR(50) CONSTRAINT NN_TB_PF_ENDERECO_LOG_RUA NOT NULL,
  NUMERO INTEGER CONSTRAINT NN_TB_PF_ENDERECO_LOG_NUMERO NOT NULL,
  BAIRRO VARCHAR(25) CONSTRAINT NN_TB_PF_ENDERECO_LOG_BAIRRO NOT NULL,
  CIDADE INTEGER CONSTRAINT NN_TB_PF_ENDERECO_LOG_CIDADE NOT NULL,
  ESTADO INTEGER CONSTRAINT NN_TB_PF_ENDERECO_LOG_ESTADO NOT NULL,
  OBSERVACAO TEXT,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_PF_ENDERECO_LOG_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_PF_ENDERECO_LOG_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_PF_ENDERECO_LOG_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_PF_ENDERECO_LOG_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_PF_ENDERECO_LOG_NR_SEQ_LOG PRIMARY KEY(NR_SEQ_LOG)
);

CREATE TABLE TB_PJ_ENDERECO_LOG(
  NR_SEQ_LOG INTEGER,
  USU_EXECUTOR INTEGER CONSTRAINT NN_TB_PJ_ENDERECO_LOG_USU_EXECUTOR NOT NULL,
  DT_EXECUTOR TIMESTAMP CONSTRAINT NN_TB_PJ_ENDERECO_LOG_DT_EXECUTOR NOT NULL,
  COMANDO_EXECUTADO CHAR(1) CONSTRAINT NN_TB_PJ_ENDERECO_LOG_COMANDO_EXECUTADO NOT NULL,
  NR_SEQUENCIA INTEGER CONSTRAINT NN_TB_PJ_ENDERECO_LOG_NR_SEQUENCIA NOT NULL,
  CD_CATG_END INTEGER CONSTRAINT NN_TB_PJ_ENDERECO_LOG_CD_CATG_END NOT NULL,
  CD_VL_CATG_END INTEGER CONSTRAINT NN_TB_PJ_ENDERECO_LOG_CD_VL_CATG_END NOT NULL,
  CD_PESSOA_JURIDICA INTEGER CONSTRAINT NN_TB_PJ_ENDERECO_LOG_CD_PESSOA_JURIDICA NOT NULL,
  CEP VARCHAR(9) CONSTRAINT NN_TB_PJ_ENDERECO_LOG_CEP NOT NULL,
  RUA VARCHAR(50) CONSTRAINT NN_TB_PJ_ENDERECO_LOG_RUA NOT NULL,
  NUMERO INTEGER CONSTRAINT NN_TB_PJ_ENDERECO_LOG_NUMERO NOT NULL,
  BAIRRO VARCHAR(25) CONSTRAINT NN_TB_PJ_ENDERECO_LOG_BAIRRO NOT NULL,
  CIDADE INTEGER CONSTRAINT NN_TB_PJ_ENDERECO_LOG_CIDADE NOT NULL,
  ESTADO INTEGER CONSTRAINT NN_TB_PJ_ENDERECO_LOG_ESTADO NOT NULL,
  OBSERVACAO TEXT,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_PJ_ENDERECO_LOG_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_PJ_ENDERECO_LOG_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_PJ_ENDERECO_LOG_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_PJ_ENDERECO_LOG_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_PJ_ENDERECO_LOG_NR_SEQ_LOG PRIMARY KEY(NR_SEQ_LOG)
);

CREATE TABLE TB_PROFISSAO_LOG(
  NR_SEQ_LOG INTEGER,
  USU_EXECUTOR INTEGER CONSTRAINT NN_TB_PROFISSAO_LOG_USU_EXECUTOR NOT NULL,
  DT_EXECUTOR TIMESTAMP CONSTRAINT NN_TB_PROFISSAO_LOG_DT_EXECUTOR NOT NULL,
  COMANDO_EXECUTADO CHAR(1) CONSTRAINT NN_TB_PROFISSAO_LOG_COMANDO_EXECUTADO NOT NULL,
  CD_PROFISSAO INTEGER CONSTRAINT NN_TB_PROFISSAO_LOG_CD_PROFISSAO NOT NULL,
  NM_PROFISSAO VARCHAR(50) CONSTRAINT NN_TB_PROFISSAO_LOG_NM_PROFISSAO NOT NULL,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_PROFISSAO_LOG_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_PROFISSAO_LOG_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_PROFISSAO_LOG_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_PROFISSAO_LOG_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_PROFISSAO_LOG_NR_SEQ_LOG PRIMARY KEY(NR_SEQ_LOG)
);


CREATE TABLE tb_relacionados_log(
  nr_seq_log INTEGER,
  usu_executor INTEGER CONSTRAINT nn_tb_relacionados_log_usu_executor NOT NULL,
  dt_executor TIMESTAMP CONSTRAINT nn_tb_relacionados_log_dt_executor NOT NULL,
  comando_executado CHAR(1) CONSTRAINT nn_tb_relacionados_log_comando_executado NOT NULL,
  cd_pessoa_fisica_1 INTEGER CONSTRAINT nn_tb_relacionados_log_cd_pessoa_fisica_1 NOT NULL,
  cd_pessoa_fisica_2 INTEGER CONSTRAINT nn_tb_relacionados_cd_pessoa_fisica_2 NOT NULL,
  cd_catg_relac INTEGER CONSTRAINT nn_tb_relacionados_cd_catg_relac NOT NULL,
  cd_catg_vl_relac INTEGER CONSTRAINT nn_tb_relacionados_cd_catg_vl_relac NOT NULL,
  cd_usuario_criacao INTEGER CONSTRAINT nn_tb_relacionados_cd_usuario_criacao NOT NULL,
  dt_usuario_criacao TIMESTAMP CONSTRAINT nn_tb_relacionados_dt_usuario_criacao NOT NULL,
  cd_usuario_atualiza INTEGER CONSTRAINT nn_tb_relacionados_cd_usuario_atualiza NOT NULL,
  dt_usuario_atualiza TIMESTAMP CONSTRAINT nn_tb_relacionados_dt_usuairo_atualiza NOT NULL,
  CONSTRAINT pk_tb_relacionados_nr_seq_log PRIMARY KEY (nr_seq_log)
);


CREATE TABLE tb_relac_parametro_log(
  nr_seq_log INTEGER,
  usu_executor INTEGER CONSTRAINT nn_tb_relac_parametro_log_usu_executor NOT NULL,
  dt_executor TIMESTAMP CONSTRAINT nn_tb_relac_parametro_log_dt_executor NOT NULL,
  comando_executado CHAR(1) CONSTRAINT nn_tb_relac_parametro_log_comando_executado NOT NULL,
  cd_catg_relac_1 INTEGER CONSTRAINT nn_tb_relac_parametro_cd_catg_relac_1  NOT NULL,
  cd_catg_vl_relac_1 INTEGER CONSTRAINT nn_tb_relac_parametro_cd_catg_vl_relac_1 NOT NULL,
  cd_catg_relac_2 INTEGER CONSTRAINT nn_tb_relac_parametro_cd_catg_relac_2 NOT NULL,
  cd_catg_vl_relac_2 INTEGER CONSTRAINT nn_tb_relac_parametro_cd_catg_vl_relac_2 NOT NULL,
  cd_usuario_criacao INTEGER CONSTRAINT nn_tb_relac_parametro_cd_usuario_criacao NOT NULL,
  dt_usuario_criacao TIMESTAMP CONSTRAINT nn_tb_relac_parametro_dt_usuario_criacao NOT NULL,
  cd_usuario_atualiza INTEGER CONSTRAINT nn_tb_relac_parametro_cd_usuario_atualiza NOT NULL,
  dt_usuario_atualiza TIMESTAMP CONSTRAINT nn_tb_relac_parametro_dt_usuario_atualiza NOT NULL,
  CONSTRAINT fk_tb_relac_parametro_log_nr_seq_log PRIMARY KEY (nr_seq_log)
);


CREATE TABLE TB_SERVICO_ADICIONAL_LOG(
  NR_SEQ_LOG INTEGER,
  USU_EXECUTOR INTEGER CONSTRAINT NN_TB_SERVICO_ADICIONAL_LOG_USU_EXECUTOR NOT NULL,
  DT_EXECUTOR TIMESTAMP CONSTRAINT NN_TB_SERVICO_ADICIONAL_LOG_DT_EXECUTOR NOT NULL,
  COMANDO_EXECUTADO CHAR(1) CONSTRAINT NN_TB_SERVICO_ADICIONAL_LOG_COMANDO_EXECUTADO NOT NULL,
  CD_SERV_ADICIONAL INTEGER CONSTRAINT NN_TB_SERVICO_ADICIONAL_LOG_CD_SERV_ADICIONAL NOT NULL,
  CD_ORDEM_SERVICO INTEGER,
  CD_PESSOA_FISICA INTEGER,
  CD_CATG_SERVICO INTEGER CONSTRAINT NN_TB_SERVICO_ADICIONAL_CD_CATG_SERVICO NOT NULL,
  CD_VL_CATG_SERVICO INTEGER CONSTRAINT NN_TB_SERVICO_ADICIONAL_CD_CATG_VL_SERVICO NOT NULL,
  CD_SETOR INTEGER,
  CD_VAGA INTEGER,
  DT_INICIO TIMESTAMP CONSTRAINT NN_TB_SERVICO_ADICIIONAL_LOG_DT_INICIO NOT NULL,
  DT_FIM TIMESTAMP,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_SERVICO_ADICIONAL_LOG_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_SERVICO_ADICIONAL_LOG_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_SERVICO_ADICIONAL_LOG_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_SERVICO_ADICIONAL_LOG_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_SERVICO_ADICIONAL_LOG_NR_SEQ_LOG PRIMARY KEY(NR_SEQ_LOG)
);

CREATE TABLE TB_SETOR_LOG(
  NR_SEQ_LOG INTEGER,
  USU_EXECUTOR INTEGER CONSTRAINT NN_TB_SETOR_LOG_USU_EXECUTOR NOT NULL,
  DT_EXECUTOR TIMESTAMP CONSTRAINT NN_TB_SETOR_LOG_DT_EXECUTOR NOT NULL,
  COMANDO_EXECUTADO CHAR(1) CONSTRAINT NN_TB_SETOR_LOG_COMANDO_EXECUTADO NOT NULL,
  CD_SETOR SERIAL CONSTRAINT NN_TB_SETOR_LOG_CD_SETOR NOT NULL,
  CD_CONDOMINIO INTEGER CONSTRAINT NN_TB_SETOR_LOG_CD_CONDOMINIO NOT NULL,
  NM_SETOR VARCHAR(50) CONSTRAINT NN_TB_SETOR_LOG_NM_SETOR NOT NULL,
-------------------------------
  CD_SETOR_GRUPO INTEGER,
  RAMAL VARCHAR(4),
-------------------------------
  OBSERVACAO TEXT,
  IM_PERFIL OID,
  CD_CATG_TIPO INTEGER CONSTRAINT NN_TB_SETOR_LOG_CD_CATG_TIPO NOT NULL,
  CD_VL_CATG_TIPO INTEGER CONSTRAINT NN_TB_SETOR_LOG_CD_CATG_TIPO NOT NUll,
-------------------------------
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_SETOR_LOG_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_SETOR_LOG_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_SSETOR_LOG_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_SETOR_LOG_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_SETOR_LOG_NR_SEQ_LOG PRIMARY KEY(NR_SEQ_LOG)
);

CREATE TABLE TB_USUARIO_LOG(
  NR_SEQ_LOG INTEGER,
  USU_EXECUTOR INTEGER CONSTRAINT NN_TB_USUARIO_LOG_USU_EXECUTOR NOT NULL,
  DT_EXECUTOR TIMESTAMP CONSTRAINT NN_TB_USUARIO_LOG_DT_EXECUTOR NOT NULL,
  COMANDO_EXECUTADO CHAR(1) CONSTRAINT NN_TB_USUARIO_LOG_COMANDO_EXECUTADO NOT NULL,
  CD_USUARIO INTEGER CONSTRAINT NN_TB_USUARIO_LOG_CD_PF_USU NOT NULL,
  LOGIN VARCHAR(60) CONSTRAINT NN_TB_USUARIO_LOGIN_LOGIN NOT NULL,
  NIVEL INTEGER CONSTRAINT NN_TB_USUARIO_LOG_NIVEL NOT NULL,
  IE_STATUS CHAR(1) CONSTRAINT NN_TB_USUARIO_LOG_IE_STATUS NOT NULL,
  CD_USU_BANCO_OID BIGINT CONSTRAINT NN_TB_USUARIO_LOG_CD_USU_BANCO_OID NOT NULL,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_USUARIO_LOG_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_USUARIO_LOG_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_USUARIO_LOG_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_USUARIO_LOG_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_USUARIO_LOG_NR_SEQ_LOG PRIMARY KEY(NR_SEQ_LOG)
);

CREATE TABLE TB_VAGA_GARAGEM_LOG(
  NR_SEQ_LOG INTEGER,
  USU_EXECUTOR INTEGER CONSTRAINT NN_TB_VAGA_GARAGEM_LOG_USU_EXECUTOR NOT NULL,
  DT_EXECUTOR TIMESTAMP CONSTRAINT NN_TB_VAGA_GARAGEM_LOG_DT_EXECUTOR NOT NULL,
  COMANDO_EXECUTADO CHAR(1) CONSTRAINT NN_TB_VAGA_GARAGEM_LOG_COMANDO_EXECUTADO NOT NULL,
  CD_VAGA INTEGER CONSTRAINT NN_TB_VAGA_GARAGEM_LOG_CD_VAGA NOT NULL,
  DS_VAGA VARCHAR(25) CONSTRAINT NN_TB_VAGA_GARAGEM_DS_VAGA NOT NULL,
  CD_SETOR INTEGER CONSTRAINT NN_TB_VAGA_GARAGEM_CD_SETOR NOT NULL,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_VAGA_GARAGEM_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_VAGA_GARAGEM_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_VAGA_GARAGEM_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_VAGA_GARAGEM_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_VAGA_GARAGEM_LOG_NR_SEQ_LOG PRIMARY KEY(NR_SEQ_LOG)
);


CREATE TABLE TB_PF_TELEFONE_LOG(
  NR_SEQ_LOG INTEGER,
  USU_EXECUTOR INTEGER CONSTRAINT NN_TB_PF_TELEFONE_LOG_USU_EXECUTOR NOT NULL,
  DT_EXECUTOR TIMESTAMP CONSTRAINT NN_TB_PF_TELEFONE_LOG_DT_EXECUTOR NOT NULL,
  COMANDO_EXECUTADO CHAR(1) CONSTRAINT NN_TB_PF_TELEFONE_LOG_COMANDO_EXECUTADO NOT NULL,
  CD_PF_FONE INTEGER CONSTRAINT NN_TB_PF_TELEFONE_LOG_CD_PF_FONE NOT NULL,
  CD_PESSOA_FISICA INTEGER CONSTRAINT NN_TB_PF_TELEFONE_LOG_CD_PESSOA_FISICA NOT NULL,
  FONE VARCHAR(15) CONSTRAINT NN_TB_PF_TELEFONE_FONE NOT NULL,
  OBSERVACAO TEXT,
  CD_CATG_FONE_PF INTEGER CONSTRAINT NN_TB_PF_TELEFONE_CD_CATG_FONE_PF NOT NULL,
  CD_VL_CATG_FONE_PF INTEGER CONSTRAINT NN_TB_PF_TELEFONE_CD_CATG_VL_FONE_PF NOT NULL,
  CD_CATG_OPERADORA INTEGER CONSTRAINT NN_TB_PF_TELEFONE_LOG_CD_CATG_OPERADORA NOT NULL,
  CD_VL_CATG_OPERADORA INTEGER CONSTRAINT NN_TB_PF_TELEFONE_LOG_CD_CATG_VL_OPERADORA NOT NULL,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_PF_TELEFONE_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_PF_TELEFONE_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_PF_TELEFONE_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_PF_TELEFONE_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_PF_TELEFONE_NR_SEQ_LOG PRIMARY KEY(NR_SEQ_LOG)
);

CREATE TABLE TB_PJ_TELEFONE_LOG(
  NR_SEQ_LOG INTEGER,
  USU_EXECUTOR INTEGER CONSTRAINT NN_TB_PJ_TELEFONE_LOG_USU_EXECUTOR NOT NULL,
  DT_EXECUTOR TIMESTAMP CONSTRAINT NN_TB_PJ_TELEFONE_LOG_DT_EXECUTOR NOT NULL,
  COMANDO_EXECUTADO CHAR(1) CONSTRAINT NN_TB_PJ_TELEFONE_LOG_COMANDO_EXECUTADO NOT NULL,
  CD_PJ_FONE INTEGER CONSTRAINT NN_TB_PJ_TELEFONE_LOG_CD_PJ_FONE NOT NULL,
  CD_PESSOA_JURIDICA INTEGER CONSTRAINT NN_TB_PJ_TELEFONE_LOG_CD_PESSOA_JURIDICA NOT NULL,
  FONE VARCHAR(15) CONSTRAINT NN_TB_PJ_TELEFONE_FONE NOT NULL,
  OBSERVACAO TEXT,
  CD_CATG_FONE_PJ INTEGER CONSTRAINT NN_TB_PJ_TELEFONE_CD_CATG_FONE_PJ NOT NULL,
  CD_VL_CATG_FONE_PJ INTEGER CONSTRAINT NN_TB_PJ_TELEFONE_CD_CATG_VL_FONE_PJ NOT NULL,
  CD_CATG_OPERADORA INTEGER CONSTRAINT NN_TB_PJ_TELEFONE_LOG_CD_CATG_OPERADORA NOT NULL,
  CD_VL_CATG_OPERADORA INTEGER CONSTRAINT NN_TB_PJ_TELEFONE_LOG_CD_CATG_VL_OPERADORA NOT NULL,
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_PJ_TELEFONE_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_PJ_TELEFONE_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_PJ_TELEFONE_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_PJ_TELEFONE_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_PJ_TELEFON_LOG_NR_SEQ_LOG PRIMARY KEY(NR_SEQ_LOG)
);

CREATE TABLE TB_INFO_ESTUDOS_LOG(
  NR_SEQ_LOG INTEGER,
  USU_EXECUTOR INTEGER CONSTRAINT NN_TB_SETOR_LOG_USU_EXECUTOR NOT NULL,
  DT_EXECUTOR TIMESTAMP CONSTRAINT NN_TB_SETOR_LOG_DT_EXECUTOR NOT NULL,
  COMANDO_EXECUTADO CHAR(1) CONSTRAINT NN_TB_SETOR_LOG_COMANDO_EXECUTADO NOT NULL,
-------------------------------------------------------------------------------
  CD_INFO_ESTUDOS SERIAL,
  CD_PESSOA_FISICA INTEGER CONSTRAINT NN_TB_INFO_ESTUDOS_CD_PESSOA_FISICA NOT NULL, -- Quem
  CD_PESSOA_JURIDICA INTEGER CONSTRAINT NN_TB_INFO_ESTUDOS_CD_INSTITUICAO NOT NULL, -- Onde
  CD_CATG_CURSO INTEGER CONSTRAINT NN_TB_INFO_ESTUDOS_CD_CATG_CURSO NOT NULL, -- Cat Curso
  CD_VL_CATG_CURSO INTEGER CONSTRAINT NN_TB_INFO_ESTUDOS_CD_VL_CATG_CURSO NOT NULL, -- Qual Curso
  CD_CATG_PERIODO INTEGER CONSTRAINT NN_TB_INFO_ESTUDOS_CD_CATG_PERIODO NOT NULL, -- Cat Per�odo
  CD_VL_CATG_PERIODO INTEGER CONSTRAINT NN_TB_INFO_ESTUDOS_CD_VL_CATG_PERIODO NOT NULL, -- Matutino, Noturno, Integral
  DT_INICIO DATE CONSTRAINT NN_TB_INFO_ESTUDOS_DT_INICIO NOT NULL, -- In�cio do Curso
  DT_FIM DATE CONSTRAINT NN_TB_INFO_ESTUDOS_DT_FIM NOT NULL, -- Previs�o da Conclus�o
  ----------------------------------------------------------------------------------------
  CD_USUARIO_CRIACAO INTEGER CONSTRAINT NN_TB_SETOR_CD_USUARIO_CRIACAO NOT NULL,
  DT_USUARIO_CRIACAO TIMESTAMP CONSTRAINT NN_TB_SETOR_DT_USUARIO_CRIACAO NOT NULL,
  CD_USUARIO_ATUALIZA INTEGER CONSTRAINT NN_TB_SETOR_CD_USUARIO_ATUALIZA NOT NULL,
  DT_USUARIO_ATUALIZA TIMESTAMP CONSTRAINT NN_TB_SETOR_DT_USUARIO_ATUALIZA NOT NULL,
  CONSTRAINT PK_TB_INFO_ESTUDOS_LOG_NR_SEQ_LOG PRIMARY KEY(NR_SEQ_LOG)
);


---------- CRIA��O DE FOREIGN KEY PARA TABELAS DE LOG ---------------------------------
ALTER TABLE TB_USUARIO_LOG ADD CONSTRAINT FK_TB_USUARIO_LOG_USU_EXECUTOR
FOREIGN KEY(USU_EXECUTOR) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_SETOR_LOG ADD CONSTRAINT FK_TB_SETOR_LOG_USU_EXECUTOR
FOREIGN KEY(USU_EXECUTOR) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_SERVICO_ADICIONAL_LOG ADD CONSTRAINT FK_TB_SERVICO_ADICIONAL_LOG_USU_EXECUTOR
FOREIGN KEY(USU_EXECUTOR) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_RELACIONADOS_LOG ADD CONSTRAINT FK_TB_RELACIONADOS_LOG_USU_EXECUTOR
FOREIGN KEY(USU_EXECUTOR) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_PROFISSAO_LOG ADD CONSTRAINT FK_TB_PROFISSAO_LOG_USU_EXECUTOR
FOREIGN KEY(USU_EXECUTOR) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_PJ_ENDERECO_LOG ADD CONSTRAINT FK_TB_PJ_ENDERECO_LOG_USU_EXECUTOR
FOREIGN KEY(USU_EXECUTOR) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_PF_ENDERECO_LOG ADD CONSTRAINT FK_TB_PF_ENDERECO_LOG_USU_EXECUTOR
FOREIGN KEY(USU_EXECUTOR) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_PESSOA_JURIDICA_LOG ADD CONSTRAINT FK_TB_PESSOA_JURIDICA_LOG_USU_EXECUTOR
FOREIGN KEY(USU_EXECUTOR) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_PESSOA_FISICA_LOG ADD CONSTRAINT FK_TB_PESSOA_FISICA_LOG_USU_EXECUTOR
FOREIGN KEY(USU_EXECUTOR) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_ORDEM_SERVICO_LOG ADD CONSTRAINT FK_TB_ORDEM_SERVICO_LOG_USU_EXECUTOR
FOREIGN KEY(USU_EXECUTOR) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_ORCAMENTO_LOG ADD CONSTRAINT FK_TB_ORCAMENTO_LOG_USU_EXECUTOR
FOREIGN KEY(USU_EXECUTOR) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_OCORRENCIA_LOG ADD CONSTRAINT FK_TB_OCORRENCIA_LOG_USU_EXECUTOR
FOREIGN KEY(USU_EXECUTOR) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_OCORRENCIA_PF_ENVOLVIDA_LOG ADD CONSTRAINT FK_TB_OCORRENCIA_PF_ENVOLVIDA_LOG_USU_EXECUTOR
FOREIGN KEY(USU_EXECUTOR) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_MORADOR_ENDERECO_LOG ADD CONSTRAINT FK_TB_MORADOR_ENDERECO_LOG_USU_EXECUTOR
FOREIGN KEY(USU_EXECUTOR) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_ITENS_ORCAMENTO_LOG ADD CONSTRAINT FK_TB_ITENS_ORCAMENTO_LOG_USU_EXECUTOR
FOREIGN KEY(USU_EXECUTOR) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_CATEGORIA_VALOR_LOG ADD CONSTRAINT FK_TB_CATEGORIA_VALOR_LOG_USU_EXECUTOR
FOREIGN KEY(USU_EXECUTOR) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_CATEGORIA_LOG ADD CONSTRAINT FK_TB_CATEGORIA_LOG_USU_EXECUTOR
FOREIGN KEY(USU_EXECUTOR) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_APARTAMENTO_LOG ADD CONSTRAINT FK_TB_APARTAMENTO_LOG_USU_EXECUTOR
FOREIGN KEY(USU_EXECUTOR) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_VAGA_GARAGEM_LOG ADD CONSTRAINT FK_TB_VAGA_GARAGEM_LOG_USU_EXECUTOR
FOREIGN KEY(USU_EXECUTOR) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_PF_TELEFONE_LOG ADD CONSTRAINT FK_TB_PF_TELEFONE_LOG_USU_EXECUTOR
FOREIGN KEY(USU_EXECUTOR) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_PJ_TELEFONE_LOG ADD CONSTRAINT FK_TB_PJ_TELEFONE_LOG_USU_EXECUTOR
FOREIGN KEY(USU_EXECUTOR) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE tb_relac_parametro_log ADD CONSTRAINT fk_tb_relac_parametro_log_usu_executor
FOREIGN KEY(USU_EXECUTOR) REFERENCES TB_USUARIO(CD_USUARIO);

ALTER TABLE TB_INFO_ESTUDOS_LOG ADD CONSTRAINT FK_TB_INFO_ESTUDOS_LOG_USU_EXECUTOR
FOREIGN KEY(USU_EXECUTOR) REFERENCES TB_USUARIO(CD_USUARIO);

------------------------- CRIA�AO DE SEQUENCIAS PARA TABELAS DE LOG -----------------------
CREATE SEQUENCE seq_tb_apartamento_log
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
NO CYCLE;

CREATE SEQUENCE seq_tb_categoria_log
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
NO CYCLE;

CREATE SEQUENCE seq_tb_categoria_valos_log
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
NO CYCLE;

CREATE SEQUENCE seq_tb_categoria_valor_log
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
NO CYCLE;

CREATE SEQUENCE seq_tb_itens_orcamento_log
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
NO CYCLE;

CREATE SEQUENCE seq_tb_morador_endereco_log
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
NO CYCLE;

CREATE SEQUENCE seq_tb_ocorrencia_pf_envolvida_log
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
NO CYCLE;

CREATE SEQUENCE seq_tb_ocorrencia_log
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
NO CYCLE;

CREATE SEQUENCE seq_tb_orcamento_log
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
NO CYCLE;

CREATE SEQUENCE seq_tb_ordem_servico_log
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
NO CYCLE;

CREATE SEQUENCE seq_tb_pessoa_fisica_log
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
NO CYCLE;

CREATE SEQUENCE seq_tb_pessoa_juridica_log
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
NO CYCLE;

CREATE SEQUENCE seq_tb_pf_endereco_log
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
NO CYCLE;

CREATE SEQUENCE seq_tb_pj_endereco_log
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
NO CYCLE;

CREATE SEQUENCE seq_tb_profissao_log
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
NO CYCLE;

CREATE SEQUENCE seq_tb_relacionados_log
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
NO CYCLE;

CREATE SEQUENCE seq_tb_servico_adicional_log
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
NO CYCLE;

CREATE SEQUENCE seq_tb_setor_log
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
NO CYCLE;

CREATE SEQUENCE seq_tb_usuario_log
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
NO CYCLE;

CREATE SEQUENCE seq_tb_vaga_garagem_log
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
NO CYCLE;

CREATE SEQUENCE seq_tb_pf_telefone_log
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
NO CYCLE;

CREATE SEQUENCE seq_tb_pj_telefone_log
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
NO CYCLE;

CREATE SEQUENCE seq_tb_info_estudos_log
INCREMENT 1
MINVALUE 1
MAXVALUE 9223372036854775807
START 1
NO CYCLE;

-------------------------Usuario---------------------------

CREATE SEQUENCE seq_cd_usuario;

DELETE
FROM pg_authid
WHERE rolname = 'administrador';

CREATE GROUP administrador;

GRANT SELECT, INSERT, UPDATE, DELETE ON tb_apartamento TO administrador;
GRANT SELECT, INSERT ON tb_apartamento_log TO administrador;
GRANT SELECT, USAGE, UPDATE ON seq_tb_apartamento_log TO administrador;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_categoria TO administrador;
GRANT SELECT, INSERT ON tb_categoria_log TO administrador;
GRANT SELECT, USAGE, UPDATE ON seq_tb_categoria_log TO administrador;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_categoria_valor TO administrador;
GRANT SELECT, INSERT ON tb_categoria_valor_log TO administrador;
GRANT SELECT, USAGE, UPDATE ON seq_tb_categoria_valor_log TO administrador;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_itens_orcamento TO administrador;
GRANT SELECT, INSERT  ON tb_itens_orcamento_log TO administrador;
GRANT SELECT, USAGE, UPDATE ON seq_tb_itens_orcamento_log TO administrador;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_morador_endereco TO administrador;
GRANT SELECT, INSERT ON tb_morador_endereco_log TO administrador;
GRANT SELECT, USAGE, UPDATE ON seq_tb_morador_endereco_log TO administrador;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_ocorrencia TO administrador;
GRANT SELECT, INSERT ON tb_ocorrencia_log TO administrador;
GRANT SELECT, USAGE, UPDATE ON seq_tb_ocorrencia_log TO administrador;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_ocorrencia_pf_envolvida TO administrador;
GRANT SELECT, INSERT ON tb_ocorrencia_pf_envolvida_log TO administrador;
GRANT SELECT, USAGE, UPDATE ON seq_tb_ocorrencia_pf_envolvida_log TO administrador;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_orcamento TO administrador;
GRANT SELECT, INSERT ON tb_orcamento_log TO administrador;
GRANT SELECT, USAGE, UPDATE ON seq_tb_orcamento_log TO administrador;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_ordem_servico TO administrador;
GRANT SELECT, INSERT ON tb_ordem_servico_log TO administrador;
GRANT SELECT, USAGE, UPDATE ON seq_tb_ordem_servico_log TO administrador;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_pessoa_fisica TO administrador;
GRANT SELECT, INSERT ON tb_pessoa_fisica_log TO administrador;
GRANT SELECT, USAGE, UPDATE ON seq_tb_pessoa_fisica_log TO administrador;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_pessoa_juridica TO administrador;
GRANT SELECT, INSERT ON tb_pessoa_juridica_log TO administrador;
GRANT SELECT, USAGE, UPDATE ON seq_tb_pessoa_juridica_log TO administrador;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_pf_endereco TO administrador;
GRANT SELECT, INSERT ON tb_pf_endereco_log TO administrador;
GRANT SELECT, USAGE, UPDATE ON seq_tb_pf_endereco_log TO administrador;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_pf_telefone TO administrador;
GRANT SELECT, INSERT ON tb_pf_telefone_log TO administrador;
GRANT SELECT, USAGE, UPDATE ON seq_tb_pf_telefone_log TO administrador;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_pj_endereco TO administrador;
GRANT SELECT, INSERT ON tb_pj_endereco_log TO administrador;
GRANT SELECT, USAGE, UPDATE ON seq_tb_pj_endereco_log TO administrador;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_pj_telefone TO administrador;
GRANT SELECT, INSERT ON tb_pj_telefone_log TO administrador;
GRANT SELECT, USAGE, UPDATE ON seq_tb_pj_telefone_log TO administrador;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_profissao TO administrador;
GRANT SELECT, INSERT ON tb_profissao_log TO administrador;
GRANT SELECT, USAGE, UPDATE ON seq_tb_profissao_log TO administrador;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_relacionados TO administrador;
GRANT SELECT, INSERT ON tb_relacionados_log TO administrador;
GRANT SELECT, USAGE, UPDATE ON seq_tb_relacionados_log TO administrador;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_servico_adicional TO administrador;
GRANT SELECT, INSERT ON tb_servico_adicional_log TO administrador;
GRANT SELECT, USAGE, UPDATE ON seq_tb_servico_adicional_log TO administrador;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_setor TO administrador;
GRANT SELECT, INSERT ON tb_setor_log TO administrador;
GRANT SELECT, USAGE, UPDATE ON seq_tb_setor_log TO administrador;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_usuario TO administrador;
GRANT SELECT, INSERT ON tb_usuario_log TO administrador;
GRANT SELECT, USAGE, UPDATE ON seq_tb_usuario_log TO administrador;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_vaga_garagem TO administrador;
GRANT SELECT, INSERT ON tb_vaga_garagem_log TO administrador;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_info_estudos TO administrador;
GRANT SELECT, INSERT ON tb_info_estudos_log TO administrador;


GRANT SELECT, USAGE, UPDATE ON seq_tb_vaga_garagem_log TO administrador;
GRANT SELECT, USAGE, UPDATE ON  tb_apartamento_cd_apartamento_seq TO administrador;
GRANT SELECT, USAGE, UPDATE ON  tb_categoria_cd_categoria_seq TO administrador;
GRANT SELECT, USAGE, UPDATE ON  tb_categoria_valor_cd_vl_categoria_seq TO administrador;
GRANT SELECT, USAGE, UPDATE ON  tb_itens_orcamento_nr_sequencia_seq TO administrador;
GRANT SELECT, USAGE, UPDATE ON  tb_morador_endereco_nr_sequencia_seq TO administrador;
GRANT SELECT, USAGE, UPDATE ON  tb_ocorrencia_cd_ocorrencia_seq TO administrador;
GRANT SELECT, USAGE, UPDATE ON  tb_ocorrencia_pf_envolvida_cd_ocorrencia_seq TO administrador;
GRANT SELECT, USAGE, UPDATE ON  tb_orcamento_cd_orcamento_seq TO administrador;
GRANT SELECT, USAGE, UPDATE ON  tb_ordem_servico_cd_ordem_servico_seq TO administrador;
GRANT SELECT, USAGE, UPDATE ON  tb_pessoa_fisica_cd_pessoa_fisica_seq TO administrador;
GRANT SELECT, USAGE, UPDATE ON  tb_pessoa_juridica_cd_pessoa_juridica_seq TO administrador;
GRANT SELECT, USAGE, UPDATE ON  tb_pf_endereco_nr_sequencia_seq TO administrador;
GRANT SELECT, USAGE, UPDATE ON  tb_pf_telefone_cd_pf_fone_seq TO administrador;
GRANT SELECT, USAGE, UPDATE ON  tb_pj_endereco_nr_sequencia_seq TO administrador;
GRANT SELECT, USAGE, UPDATE ON  tb_pj_telefone_cd_pj_fone_seq TO administrador;
GRANT SELECT, USAGE, UPDATE ON  tb_profissao_cd_profissao_seq TO administrador;
GRANT SELECT, USAGE, UPDATE ON  tb_servico_adicional_cd_serv_adicional_seq TO administrador;
GRANT SELECT, USAGE, UPDATE ON  tb_setor_cd_setor_seq TO administrador;
GRANT SELECT, USAGE, UPDATE ON  tb_setor_log_cd_setor_seq TO administrador;
GRANT SELECT, USAGE, UPDATE ON  tb_vaga_garagem_cd_vaga_seq TO administrador;


DELETE
FROM pg_authid
WHERE rolname = 'atendente';

CREATE GROUP atendente;

GRANT SELECT, INSERT, UPDATE, DELETE ON tb_apartamento TO atendente;
GRANT INSERT ON tb_apartamento_log TO atendente;
GRANT SELECT, USAGE, UPDATE ON seq_tb_apartamento_log TO atendente;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_categoria TO atendente;
GRANT INSERT ON tb_categoria_log TO atendente;
GRANT SELECT, USAGE, UPDATE ON seq_tb_categoria_log TO atendente;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_categoria_valor TO atendente;
GRANT INSERT ON tb_categoria_valor_log TO atendente;
GRANT SELECT, USAGE, UPDATE ON seq_tb_categoria_valor_log TO atendente;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_itens_orcamento TO atendente;
GRANT INSERT  ON tb_itens_orcamento_log TO atendente;
GRANT SELECT, USAGE, UPDATE ON seq_tb_itens_orcamento_log TO atendente;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_morador_endereco TO atendente;
GRANT INSERT ON tb_morador_endereco_log TO atendente;
GRANT SELECT, USAGE, UPDATE ON seq_tb_morador_endereco_log TO atendente;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_ocorrencia TO atendente;
GRANT INSERT ON tb_ocorrencia_log TO atendente;
GRANT SELECT, USAGE, UPDATE ON seq_tb_ocorrencia_log TO atendente;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_ocorrencia_pf_envolvida TO atendente;
GRANT INSERT ON tb_ocorrencia_pf_envolvida_log TO atendente;
GRANT SELECT, USAGE, UPDATE ON seq_tb_ocorrencia_pf_envolvida_log TO atendente;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_orcamento TO atendente;
GRANT INSERT ON tb_orcamento_log TO atendente;
GRANT SELECT, USAGE, UPDATE ON seq_tb_orcamento_log TO atendente;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_ordem_servico TO atendente;
GRANT INSERT ON tb_ordem_servico_log TO atendente;
GRANT SELECT, USAGE, UPDATE ON seq_tb_ordem_servico_log TO atendente;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_pessoa_fisica TO atendente;
GRANT INSERT ON tb_pessoa_fisica_log TO atendente;
GRANT SELECT, USAGE, UPDATE ON seq_tb_pessoa_fisica_log TO atendente;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_pessoa_juridica TO atendente;
GRANT INSERT ON tb_pessoa_juridica_log TO atendente;
GRANT SELECT, USAGE, UPDATE ON seq_tb_pessoa_juridica_log TO atendente;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_pf_endereco TO atendente;
GRANT INSERT ON tb_pf_endereco_log TO atendente;
GRANT SELECT, USAGE, UPDATE ON seq_tb_pf_endereco_log TO atendente;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_pf_telefone TO atendente;
GRANT INSERT ON tb_pf_telefone_log TO atendente;
GRANT SELECT, USAGE, UPDATE ON seq_tb_pf_telefone_log TO atendente;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_pj_endereco TO atendente;
GRANT INSERT ON tb_pj_endereco_log TO atendente;
GRANT SELECT, USAGE, UPDATE ON seq_tb_pj_endereco_log TO atendente;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_pj_telefone TO atendente;
GRANT INSERT ON tb_pj_telefone_log TO atendente;
GRANT SELECT, USAGE, UPDATE ON seq_tb_pj_telefone_log TO atendente;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_profissao TO atendente;
GRANT INSERT ON tb_profissao_log TO atendente;
GRANT SELECT, USAGE, UPDATE ON seq_tb_profissao_log TO atendente;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_relacionados TO atendente;
GRANT INSERT ON tb_relacionados_log TO atendente;
GRANT SELECT, USAGE, UPDATE ON seq_tb_relacionados_log TO atendente;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_servico_adicional TO atendente;
GRANT INSERT ON tb_servico_adicional_log TO atendente;
GRANT SELECT, USAGE, UPDATE ON seq_tb_servico_adicional_log  TO atendente;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_setor TO atendente;
GRANT INSERT ON tb_setor_log TO atendente;
GRANT SELECT, USAGE, UPDATE ON seq_tb_setor_log TO atendente;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_vaga_garagem TO atendente;
GRANT INSERT ON tb_vaga_garagem_log TO atendente;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_info_estudos TO atendente;
GRANT INSERT ON tb_info_estudos_log TO atendente;

GRANT SELECT, USAGE, UPDATE ON seq_tb_info_estudos_log TO atendente;
GRANT SELECT, USAGE, UPDATE ON seq_tb_vaga_garagem_log TO atendente;
GRANT SELECT, USAGE, UPDATE ON  tb_apartamento_cd_apartamento_seq TO atendente;
GRANT SELECT, USAGE, UPDATE ON  tb_categoria_cd_categoria_seq TO atendente;
GRANT SELECT, USAGE, UPDATE ON  tb_categoria_valor_cd_vl_categoria_seq TO atendente;
GRANT SELECT, USAGE, UPDATE ON  tb_itens_orcamento_nr_sequencia_seq TO atendente;
GRANT SELECT, USAGE, UPDATE ON  tb_morador_endereco_nr_sequencia_seq TO atendente;
GRANT SELECT, USAGE, UPDATE ON  tb_ocorrencia_cd_ocorrencia_seq TO atendente;
GRANT SELECT, USAGE, UPDATE ON  tb_ocorrencia_pf_envolvida_cd_ocorrencia_seq TO atendente;
GRANT SELECT, USAGE, UPDATE ON  tb_orcamento_cd_orcamento_seq TO atendente;
GRANT SELECT, USAGE, UPDATE ON  tb_ordem_servico_cd_ordem_servico_seq TO atendente;
GRANT SELECT, USAGE, UPDATE ON  tb_pessoa_fisica_cd_pessoa_fisica_seq TO atendente;
GRANT SELECT, USAGE, UPDATE ON  tb_pessoa_juridica_cd_pessoa_juridica_seq TO atendente;
GRANT SELECT, USAGE, UPDATE ON  tb_pf_endereco_nr_sequencia_seq TO atendente;
GRANT SELECT, USAGE, UPDATE ON  tb_pf_telefone_cd_pf_fone_seq TO atendente;
GRANT SELECT, USAGE, UPDATE ON  tb_pj_endereco_nr_sequencia_seq TO atendente;
GRANT SELECT, USAGE, UPDATE ON  tb_pj_telefone_cd_pj_fone_seq TO atendente;
GRANT SELECT, USAGE, UPDATE ON  tb_profissao_cd_profissao_seq TO atendente;
GRANT SELECT, USAGE, UPDATE ON  tb_servico_adicional_cd_serv_adicional_seq TO atendente;
GRANT SELECT, USAGE, UPDATE ON  tb_setor_cd_setor_seq TO atendente;
GRANT SELECT, USAGE, UPDATE ON  tb_setor_log_cd_setor_seq TO atendente;
GRANT SELECT, USAGE, UPDATE ON  tb_vaga_garagem_cd_vaga_seq TO atendente;

DELETE
FROM pg_authid
WHERE rolname = 'usuario';

CREATE GROUP usuario;

GRANT SELECT, INSERT, UPDATE, DELETE ON tb_apartamento TO usuario;
GRANT INSERT ON tb_apartamento_log TO usuario;
GRANT SELECT, USAGE, UPDATE ON seq_tb_apartamento_log TO usuario;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_categoria TO usuario;
GRANT INSERT ON tb_categoria_log TO usuario;
GRANT SELECT, USAGE, UPDATE ON seq_tb_categoria_log TO usuario;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_categoria_valor TO usuario;
GRANT INSERT ON tb_categoria_valor_log TO usuario;
GRANT SELECT, USAGE, UPDATE ON seq_tb_categoria_valor_log TO usuario;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_itens_orcamento TO usuario;
GRANT INSERT  ON tb_itens_orcamento_log TO usuario;
GRANT SELECT, USAGE, UPDATE ON seq_tb_itens_orcamento_log TO usuario;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_morador_endereco TO usuario;
GRANT INSERT ON tb_morador_endereco_log TO usuario;
GRANT SELECT, USAGE, UPDATE ON seq_tb_morador_endereco_log TO usuario;
GRANT SELECT ON tb_ocorrencia TO usuario;
GRANT INSERT ON tb_ocorrencia_log TO usuario;
GRANT SELECT, USAGE, UPDATE ON seq_tb_ocorrencia_log TO usuario;
GRANT SELECT ON tb_ocorrencia_pf_envolvida TO usuario;
GRANT INSERT ON tb_ocorrencia_pf_envolvida_log TO usuario;
GRANT SELECT, USAGE, UPDATE ON seq_tb_ocorrencia_pf_envolvida_log TO usuario;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_orcamento TO usuario;
GRANT INSERT ON tb_orcamento_log TO usuario;
GRANT SELECT, USAGE, UPDATE ON seq_tb_orcamento_log TO usuario;
GRANT SELECT ON tb_ordem_servico TO usuario;
GRANT INSERT ON tb_ordem_servico_log TO usuario;
GRANT SELECT, USAGE, UPDATE ON seq_tb_ordem_servico_log TO usuario;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_pessoa_fisica TO usuario;
GRANT INSERT ON tb_pessoa_fisica_log TO usuario;
GRANT SELECT, USAGE, UPDATE ON seq_tb_pessoa_fisica_log TO usuario;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_pessoa_juridica TO usuario;
GRANT INSERT ON tb_pessoa_juridica_log TO usuario;
GRANT SELECT, USAGE, UPDATE ON seq_tb_pessoa_juridica_log TO usuario;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_pf_endereco TO usuario;
GRANT INSERT ON tb_pf_endereco_log TO usuario;
GRANT SELECT, USAGE, UPDATE ON seq_tb_pf_endereco_log TO usuario;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_pf_telefone TO usuario;
GRANT INSERT ON tb_pf_telefone_log TO usuario;
GRANT SELECT, USAGE, UPDATE ON seq_tb_pf_telefone_log TO usuario;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_pj_endereco TO usuario;
GRANT INSERT ON tb_pj_endereco_log TO usuario;
GRANT SELECT, USAGE, UPDATE ON seq_tb_pj_endereco_log TO usuario;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_pj_telefone TO usuario;
GRANT INSERT ON tb_pj_telefone_log TO usuario;
GRANT SELECT, USAGE, UPDATE ON seq_tb_pj_telefone_log TO usuario;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_profissao TO usuario;
GRANT INSERT ON tb_profissao_log TO usuario;
GRANT SELECT, USAGE, UPDATE ON seq_tb_profissao_log TO usuario;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_relacionados TO usuario;
GRANT INSERT ON tb_relacionados_log TO usuario;
GRANT SELECT, USAGE, UPDATE ON seq_tb_relacionados_log TO usuario;
GRANT SELECT ON tb_servico_adicional TO usuario;
GRANT INSERT ON tb_servico_adicional_log TO usuario;
GRANT SELECT, USAGE, UPDATE ON seq_tb_servico_adicional_log TO usuario;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_setor TO usuario;
GRANT INSERT ON tb_setor_log TO usuario;
GRANT SELECT, USAGE, UPDATE ON seq_tb_setor_log TO usuario;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_info_estudos TO usuario;
GRANT INSERT ON tb_info_estudos_log TO usuario;
GRANT SELECT, USAGE, UPDATE ON seq_tb_info_estudos_log TO usuario;
GRANT SELECT, INSERT, UPDATE, DELETE ON tb_vaga_garagem TO usuario;
GRANT INSERT ON tb_vaga_garagem_log TO usuario;
GRANT SELECT, USAGE, UPDATE ON seq_tb_vaga_garagem_log TO usuario;
GRANT SELECT, USAGE, UPDATE ON seq_tb_vaga_garagem_log TO usuario;
GRANT SELECT, USAGE, UPDATE ON  tb_apartamento_cd_apartamento_seq TO usuario;
GRANT SELECT, USAGE, UPDATE ON  tb_categoria_cd_categoria_seq TO usuario;
GRANT SELECT, USAGE, UPDATE ON  tb_categoria_valor_cd_vl_categoria_seq TO usuario;
GRANT SELECT, USAGE, UPDATE ON  tb_itens_orcamento_nr_sequencia_seq TO usuario;
GRANT SELECT, USAGE, UPDATE ON  tb_morador_endereco_nr_sequencia_seq TO usuario;
GRANT SELECT, USAGE, UPDATE ON  tb_ocorrencia_cd_ocorrencia_seq TO usuario;
GRANT SELECT, USAGE, UPDATE ON  tb_ocorrencia_pf_envolvida_cd_ocorrencia_seq TO usuario;
GRANT SELECT, USAGE, UPDATE ON  tb_orcamento_cd_orcamento_seq TO usuario;
GRANT SELECT, USAGE, UPDATE ON  tb_ordem_servico_cd_ordem_servico_seq TO usuario;
GRANT SELECT, USAGE, UPDATE ON  tb_pessoa_fisica_cd_pessoa_fisica_seq TO usuario;
GRANT SELECT, USAGE, UPDATE ON  tb_pessoa_juridica_cd_pessoa_juridica_seq TO usuario;
GRANT SELECT, USAGE, UPDATE ON  tb_pf_endereco_nr_sequencia_seq TO usuario;
GRANT SELECT, USAGE, UPDATE ON  tb_pf_telefone_cd_pf_fone_seq TO usuario;
GRANT SELECT, USAGE, UPDATE ON  tb_pj_endereco_nr_sequencia_seq TO usuario;
GRANT SELECT, USAGE, UPDATE ON  tb_pj_telefone_cd_pj_fone_seq TO usuario;
GRANT SELECT, USAGE, UPDATE ON  tb_profissao_cd_profissao_seq TO usuario;
GRANT SELECT, USAGE, UPDATE ON  tb_servico_adicional_cd_serv_adicional_seq TO usuario;
GRANT SELECT, USAGE, UPDATE ON  tb_setor_cd_setor_seq TO usuario;
GRANT SELECT, USAGE, UPDATE ON  tb_setor_log_cd_setor_seq TO usuario;
GRANT SELECT, USAGE, UPDATE ON  tb_vaga_garagem_cd_vaga_seq TO usuario;


INSERT INTO TB_PESSOA_FISICA(
  NM_PESSOA_FISICA,
  CPF,
  RG,
  DT_NASCIMENTO,
  IE_SEXO)
VALUES
  ('Administrador',
   '000.000.000-00',
   '00000000',
   '01/01/2000',
   'M');

--fc_criar_usuario(login,senha,nivel,status,cd_pessoa_fisica,login_trocar)	

CREATE OR REPLACE FUNCTION fc_criar_usuario (varchar, varchar, integer, varchar, integer, varchar) RETURNS varchar AS
  $$
  DECLARE

    existe INTEGER;
    existe2 INTEGER;
    existe3 INTEGER;
    cd_usu_banco_oid BIGINT;
    existe5 INTEGER;
    aux_nivel INTEGER;
    login_prop INTEGER;

  BEGIN

    SELECT count(*)
    INTO existe
    FROM tb_usuario
    WHERE login = $1;

    SELECT count(*)
    INTO existe2
    FROM tb_usuario
    WHERE cd_usuario = $5;

    SELECT count(*)
    INTO existe3
    FROM tb_pessoa_fisica
    WHERE cd_pessoa_fisica = $5;

    SELECT count(*)
    INTO existe5
    FROM tb_usuario
    WHERE login = $6;

    SELECT count(*)
    INTO login_prop
    FROM tb_usuario
    WHERE login = $6
          AND cd_usuario = $5;

    IF (existe3 = 1) THEN

      IF (existe2 = 0) THEN

        IF (existe = 0) THEN

          EXECUTE 'CREATE ROLE "' || $5 || '" LOGIN ENCRYPTED PASSWORD ''' || $2 || ''' SUPERUSER';

          IF ($3 = 1) THEN

            EXECUTE 'ALTER GROUP administrador ADD USER "' || $5 || '"';

            EXECUTE 'ALTER ROLE "' || $5 || '" CREATEROLE';

          ELSIF ($3 = 2) THEN

            EXECUTE 'ALTER GROUP atendente ADD USER "' || $5 || '"';

            EXECUTE 'ALTER ROLE "' || $5 || '" NOCREATEROLE';

          ELSIF ($3 = 3) THEN

            EXECUTE 'ALTER GROUP usuario ADD USER "' || $5 || '"';

            EXECUTE 'ALTER ROLE "' || $5 || '" NOCREATEROLE';

          END IF;

          IF ($4 = 'I') THEN

            EXECUTE 'ALTER ROLE "' || $5 || '" NOLOGIN';

          END IF;

          SELECT oid
          INTO cd_usu_banco_oid
          FROM pg_roles
          WHERE rolname = $5::VARCHAR(60);

          INSERT INTO tb_usuario SELECT $5,
                                   $1,
                                   $3,
                                   $4,
                                   cd_usu_banco_oid,
                                   1,
                                   now(),
                                   1,
                                   now();

          RETURN 'Usuario criado com sucesso!';

        ELSE

          RETURN 'J� existe um usu�rio cadastrado com esse nome!';

        END IF;

      ELSE

        IF ($6 IS NOT NULL) THEN

          IF (login_prop = 0) THEN

            IF (existe5 = 0) THEN

              UPDATE tb_usuario SET
                login = $6
              WHERE cd_usuario = $5;

            ELSE

              RETURN 'A outro perfil que j� possui uma conta de usu�rio com esse nome!';

            END IF;

          END IF;

        END IF;

        IF ($2 IS NOT NULL) THEN

          EXECUTE 'ALTER ROLE "' || $5 || '" WITH ENCRYPTED PASSWORD ''' || $2 || '''';

        END IF;

        IF ($4 IS NOT NULL) THEN

          IF ($4 = 'I') THEN

            EXECUTE 'ALTER ROLE "' || $5 || '" NOLOGIN';

            UPDATE tb_usuario SET
              IE_STATUS = $4
            WHERE cd_usuario = $5;

          END IF;

          IF ($4 = 'A') THEN

            EXECUTE 'ALTER ROLE "' || $5 || '" LOGIN';

            UPDATE tb_usuario SET
              IE_STATUS = $4
            WHERE cd_usuario = $5;

          END IF;

        END IF;

        IF($3 IS NOT NULL) THEN

          SELECT NIVEL
          INTO aux_nivel
          FROM tb_usuario
          WHERE cd_usuario = $5;

          UPDATE tb_usuario SET
            nivel = $3,
            CD_USUARIO_CRIACAO =  user::INTEGER,
            DT_USUARIO_CRIACAO = now(),
            CD_USUARIO_ATUALIZA = user::INTEGER,
            DT_USUARIO_ATUALIZA = now()
          WHERE cd_usuario = $5;

          IF (aux_nivel = 1) THEN

            EXECUTE 'ALTER GROUP administrador DROP USER "' || $5 || '"';

          ELSIF (aux_nivel = 2) THEN

            EXECUTE 'ALTER GROUP atendente DROP USER "' || $5 || '"';

          ELSIF (aux_nivel = 3) THEN

            EXECUTE 'ALTER GROUP usuario DROP USER "' || $5 || '"';

          END IF;

          IF ($3 = 1) THEN

            EXECUTE 'ALTER GROUP administrador ADD USER "' || $5 || '"';

            EXECUTE 'ALTER ROLE "' || $5 || '" CREATEROLE';

          ELSIF ($3 = 2) THEN

            EXECUTE 'ALTER GROUP atendente ADD USER "' || $5 || '"';

            EXECUTE 'ALTER ROLE "' || $5 || '" NOCREATEROLE';

          ELSIF ($3 = 3) THEN

            EXECUTE 'ALTER GROUP usuario ADD USER "' || $5 || '"';

            EXECUTE 'ALTER ROLE "' || $5 || '" NOCREATEROLE';

          END IF;

          RETURN 'Usuario alterado com sucesso!';

        END IF;

        UPDATE tb_usuario SET
          CD_USUARIO_CRIACAO = user::INTEGER,
          DT_USUARIO_CRIACAO = now(),
          CD_USUARIO_ATUALIZA = user::INTEGER,
          DT_USUARIO_ATUALIZA = now()
        WHERE CD_USUARIO = $5;

        RETURN 'Usuario alterado com sucesso!';

      END IF;

    ELSE

      RETURN 'N�o existe este perfil';

    END IF;

    RETURN null;
  END;
  $$ LANGUAGE 'plpgsql';

SELECT fc_criar_usuario('administrador','123456',1,'A',1,NULL);

CREATE OR REPLACE FUNCTION fc_criar_usuario (varchar, varchar, integer, varchar, integer, varchar) RETURNS varchar AS
  $$
  DECLARE

    existe INTEGER;
    existe2 INTEGER;
    existe3 INTEGER;
    cd_usu_banco_oid BIGINT;
    existe5 INTEGER;
    aux_nivel INTEGER;
    login_prop INTEGER;


  BEGIN

    SELECT count(*)
    INTO existe
    FROM tb_usuario
    WHERE login = $1;

    SELECT count(*)
    INTO existe2
    FROM tb_usuario
    WHERE cd_usuario = $5;

    SELECT count(*)
    INTO existe3
    FROM tb_pessoa_fisica
    WHERE cd_pessoa_fisica = $5;


    SELECT count(*)
    INTO existe5
    FROM tb_usuario
    WHERE login = $6;

    SELECT count(*)
    INTO login_prop
    FROM tb_usuario
    WHERE login = $6
          AND cd_usuario = $5;

    IF (existe3 = 1) THEN

      IF (existe2 = 0) THEN

        IF (existe = 0) THEN

          EXECUTE 'CREATE ROLE "' || $5 || '" LOGIN ENCRYPTED PASSWORD ''' || $2 || ''' SUPERUSER';

          IF ($3 = 1) THEN

            EXECUTE 'ALTER GROUP administrador ADD USER "' || $5 || '"';

            EXECUTE 'ALTER ROLE "' || $5 || '" CREATEROLE';

          ELSIF ($3 = 2) THEN

            EXECUTE 'ALTER GROUP atendente ADD USER "' || $5 || '"';

            EXECUTE 'ALTER ROLE "' || $5 || '" NOCREATEROLE';

          ELSIF ($3 = 3) THEN

            EXECUTE 'ALTER GROUP usuario ADD USER "' || $5 || '"';

            EXECUTE 'ALTER ROLE "' || $5 || '" NOCREATEROLE';

          END IF;

          IF ($4 = 'I') THEN

            EXECUTE 'ALTER ROLE "' || $5 || '" NOLOGIN';

          END IF;

          SELECT oid
          INTO cd_usu_banco_oid
          FROM pg_roles
          WHERE rolname = $5::VARCHAR(60);

          INSERT INTO tb_usuario SELECT $5,
                                   $1,
                                   $3,
                                   $4,
                                   cd_usu_banco_oid,
                                   user::INTEGER,
                                   now(),
                                   user::INTEGER,
                                   now();

          RETURN 'Usuario criado com sucesso!';

        ELSE

          RETURN 'J� existe um usu�rio cadastrado com esse nome!';

        END IF;

      ELSE

        IF ($6 IS NOT NULL) THEN

          IF (login_prop = 0) THEN

            IF (existe5 = 0) THEN

              UPDATE tb_usuario SET
                login = $6
              WHERE cd_usuario = $5;

            ELSE

              RETURN 'A outro perfil que j� possui uma conta de usu�rio com esse nome!';

            END IF;

          END IF;

        END IF;

        IF ($2 IS NOT NULL) THEN

          EXECUTE 'ALTER ROLE "' || $5 || '" WITH ENCRYPTED PASSWORD ''' || $2 || '''';

        END IF;

        IF ($4 IS NOT NULL) THEN

          IF ($4 = 'I') THEN

            EXECUTE 'ALTER ROLE "' || $5 || '" NOLOGIN';

            UPDATE tb_usuario SET
              IE_STATUS = $4
            WHERE cd_usuario = $5;

          END IF;

          IF ($4 = 'A') THEN

            EXECUTE 'ALTER ROLE "' || $5 || '" LOGIN';

            UPDATE tb_usuario SET
              IE_STATUS = $4
            WHERE cd_usuario = $5;

          END IF;

        END IF;

        IF($3 IS NOT NULL) THEN

          SELECT NIVEL
          INTO aux_nivel
          FROM tb_usuario
          WHERE cd_usuario = $5;

          UPDATE tb_usuario SET
            nivel = $3,
            CD_USUARIO_CRIACAO = user::INTEGER,
            DT_USUARIO_CRIACAO = now(),
            CD_USUARIO_ATUALIZA = user::INTEGER,
            DT_USUARIO_ATUALIZA = now()
          WHERE cd_usuario = $5;

          IF (aux_nivel = 1) THEN

            EXECUTE 'ALTER GROUP administrador DROP USER "' || $5 || '"';

          ELSIF (aux_nivel = 2) THEN

            EXECUTE 'ALTER GROUP atendente DROP USER "' || $5 || '"';

          ELSIF (aux_nivel = 3) THEN

            EXECUTE 'ALTER GROUP usuario DROP USER "' || $5 || '"';

          END IF;

          IF ($3 = 1) THEN

            EXECUTE 'ALTER GROUP administrador ADD USER "' || $5 || '"';

            EXECUTE 'ALTER ROLE "' || $5 || '" CREATEROLE';

          ELSIF ($3 = 2) THEN

            EXECUTE 'ALTER GROUP atendente ADD USER "' || $5 || '"';

            EXECUTE 'ALTER ROLE "' || $5 || '" NOCREATEROLE';

          ELSIF ($3 = 3) THEN

            EXECUTE 'ALTER GROUP usuario ADD USER "' || $5 || '"';

            EXECUTE 'ALTER ROLE "' || $5 || '" NOCREATEROLE';

          END IF;

          RETURN 'Usuario alterado com sucesso!';

        END IF;

        UPDATE tb_usuario SET
          CD_USUARIO_CRIACAO = user::INTEGER,
          DT_USUARIO_CRIACAO = now(),
          CD_USUARIO_ATUALIZA = user::INTEGER,
          DT_USUARIO_ATUALIZA = now()
        WHERE CD_USUARIO = $5;

        RETURN 'Usuario alterado com sucesso!';


      END IF;

    ELSE

      RETURN 'N�o existe este perfil';

    END IF;

    RETURN null;
  END;
  $$ LANGUAGE 'plpgsql';



CREATE OR REPLACE FUNCTION fn_relacionados(p_pf1 INTEGER, p_pf2 INTEGER, p_cd_catg_relac INTEGER, p_deleta VARCHAR DEFAULT NULL)
  RETURNS VARCHAR AS
  $$
  DECLARE
    v_cd_catg_relac_2 INTEGER;
    v_cadastrado INTEGER;
    v_exist_parametro INTEGER;
    v_categoria_1_coluna INTEGER;
    v_genero CHAR(1);
  BEGIN

    SELECT COUNT(*)
    INTO v_cadastrado
    FROM tb_relacionados
    WHERE cd_pessoa_fisica_1 = p_pf1
          AND cd_pessoa_fisica_2 = p_pf2;

    SELECT COUNT(*)
    INTO v_exist_parametro
    FROM tb_relac_parametro
    WHERE cd_catg_vl_relac_1 = p_cd_catg_relac
          OR cd_catg_vl_relac_2 = p_cd_catg_relac;

    IF v_exist_parametro >= 1 THEN

      SELECT ie_sexo
      INTO v_genero
      FROM tb_pessoa_fisica
      WHERE cd_pessoa_fisica = p_pf1;

      SELECT COUNT(*)
      INTO v_categoria_1_coluna
      FROM tb_relac_parametro
      WHERE cd_catg_vl_relac_1 = p_cd_catg_relac;

      IF v_categoria_1_coluna >= 1 THEN

        IF v_genero = 'M' THEN

          SELECT cd_vl_categoria
          INTO v_cd_catg_relac_2
          FROM tb_relac_parametro p,
            tb_categoria_valor  c
          WHERE p.cd_catg_vl_relac_2 = c.cd_vl_categoria
                AND p.cd_catg_vl_relac_1 = p_cd_catg_relac
                AND c.genero = 'M';

        ELSIF v_genero = 'F' THEN

          SELECT cd_vl_categoria
          INTO v_cd_catg_relac_2
          FROM tb_relac_parametro p,
            tb_categoria_valor  c
          WHERE p.cd_catg_vl_relac_2 = c.cd_vl_categoria
                AND p.cd_catg_vl_relac_1 = p_cd_catg_relac
                AND c.genero = 'F';

        END IF;

        IF v_cd_catg_relac_2 IS NULL THEN

          SELECT cd_catg_vl_relac_2
          INTO v_cd_catg_relac_2
          FROM tb_relac_parametro
          WHERE cd_catg_vl_relac_1 = p_cd_catg_relac;

        END IF;

      ELSE

        IF v_genero = 'M' THEN

          SELECT cd_vl_categoria
          INTO v_cd_catg_relac_2
          FROM tb_relac_parametro p,
            tb_categoria_valor  c
          WHERE p.cd_catg_vl_relac_1 = c.cd_vl_categoria
                AND p.cd_catg_vl_relac_2 = p_cd_catg_relac
                AND c.genero = 'M';

        ELSiF v_genero = 'F'  THEN

          SELECT cd_vl_categoria
          INTO v_cd_catg_relac_2
          FROM tb_relac_parametro p,
            tb_categoria_valor  c
          WHERE p.cd_catg_vl_relac_1 = c.cd_vl_categoria
                AND p.cd_catg_vl_relac_2 = p_cd_catg_relac
                AND c.genero = 'F';

        END IF;

        IF v_cd_catg_relac_2 IS NULL THEN

          SELECT cd_catg_vl_relac_1
          INTO v_cd_catg_relac_2
          FROM tb_relac_parametro
          WHERE cd_catg_vl_relac_2 = p_cd_catg_relac;

        END IF;


      END IF;


      IF p_deleta IS NOT NULL THEN

        IF v_cadastrado > 0 THEN

          DELETE
          FROM  tb_relacionados
          WHERE cd_pessoa_fisica_1 = p_pf1
                AND cd_pessoa_fisica_2 = p_pf2;

          DELETE
          FROM  tb_relacionados
          WHERE cd_pessoa_fisica_1 = p_pf2
                AND cd_pessoa_fisica_2 = p_pf1;

          RETURN 'Relacionamento deletado com sucesso!';

        ELSE

          RETURN 'Este relacionamento nao existe para ser excluido!';

        END IF;



      ELSE

        IF v_cadastrado = 0 THEN

          INSERT INTO tb_relacionados(cd_pessoa_fisica_1,
                                      cd_pessoa_fisica_2,
                                      cd_catg_relac,
                                      cd_catg_vl_relac,
                                      cd_usuario_criacao,
                                      dt_usuario_criacao,
                                      cd_usuario_atualiza,
                                      dt_usuario_atualiza)

          VALUES
            (p_pf1,p_pf2,4,p_cd_catg_relac,user::INTEGER, now(),user::INTEGER, now());

          INSERT INTO tb_relacionados(cd_pessoa_fisica_1,
                                      cd_pessoa_fisica_2,
                                      cd_catg_relac,
                                      cd_catg_vl_relac,
                                      cd_usuario_criacao,
                                      dt_usuario_criacao,
                                      cd_usuario_atualiza,
                                      dt_usuario_atualiza)

          VALUES
            (p_pf2,p_pf1,4,v_cd_catg_relac_2,user::INTEGER, now(),user::INTEGER, now());

          RETURN 'Relacionamento inserido com sucesso! ';

        ELSE

          UPDATE tb_relacionados SET
            cd_catg_vl_relac = p_cd_catg_relac,
            cd_usuario_atualiza=user::INTEGER,
            dt_usuario_atualiza=now()
          WHERE cd_pessoa_fisica_1 = p_pf1
                AND cd_pessoa_fisica_2 = p_pf2;

          UPDATE tb_relacionados SET
            cd_catg_vl_relac = v_cd_catg_relac_2,
            cd_usuario_atualiza=user::INTEGER,
            dt_usuario_atualiza=now()
          WHERE cd_pessoa_fisica_1 = p_pf2
                AND cd_pessoa_fisica_2 = p_pf1;

          RETURN 'Relacionamento atualizado com sucesso!';

        END IF;

      END IF;

    END IF;

    RETURN 'Nao existe esta categoria ou ainda nao foi parametrizada na tabela tb_relac_parametro!';
  END;
  $$
LANGUAGE plpgsql;

INSERT INTO TB_CATEGORIA(
  DESC_CATEGORIA)
VALUES
  ('Cat Reservado'),
('Cat Reservado 2'),
('Est�gio OS e ocorr�ncia'),
('Relacionados'),
('Fone pessoa f�sica'),
('Fone pessoa jur�dica'),
('Grau de escolaridade'),
('Ramo de Atividade'),
('Endere�o'),
('Operadora'),
('Servi�o Adicional'),
  ('Tipo Ocorr�ncia'),
  ('Tipo Ordem de Servi�o'),
  ('Curso'),
  ('Avalia��o'),
  ('Tipo de Empresa'),
  ('Tipo de Setor'),
  ('Tipo de Apartamento'),
  ('�rea do Curso'),
  ('Per�odo do Curso');

INSERT INTO TB_CATEGORIA_VALOR(
  CD_CATEGORIA,
  DESC_VL_CATG,
  GENERO)
VALUES
  (1,'AC',NULL),
(1,'AL',NULL),
(1,'AP',NULL),
(1,'AM',NULL),
(1,'BA',NULL),
(1,'CE',NULL),
(1,'DF',NULL),
(1,'ES',NULL),
(1,'GO',NULL),
(1,'MA',NULL),
(1,'MT',NULL),
(1,'MS',NULL),
(1,'MG',NULL),
(1,'PA',NULL),
(1,'PB',NULL),
(1,'PR',NULL),
(1,'PE',NULL),
(1,'PI',NULL),
(1,'RJ',NULL),
(1,'RN',NULL),
(1,'RS',NULL),
(1,'RO',NULL),
(1,'RR',NULL),
(1,'SC',NULL),
(1,'SP',NULL),
(1,'SE',NULL),
(1,'TO',NULL),
(2,'Acre',NULL),
(2,'Alagoas',NULL),
(2,'Amap�',NULL),
(2,'Amazonas',NULL),
(2,'Bahia',NULL),
(2,'Cear�',NULL),
(2,'Distrito Federal',NULL),
(2,'Esp�rito Santo',NULL),
(2,'Goi�s',NULL),
(2,'Maranh�o',NULL),
(2,'Mato Grosso',NULL),
(2,'Mato Grosso do Sul',NULL),
(2,'Minas Gerais',NULL),
(2,'Par�',NULL),
(2,'Para�ba',NULL),
(2,'Paran�',NULL),
(2,'Pernambuco',NULL),
(2,'Piua�',NULL),
(2,'Rio de Janeiro',NULL),
(2,'Rio Grande do Norte',NULL),
(2,'Rio Grande do Sul',NULL),
(2,'Rond�nia',NULL),
(2,'Roraima',NULL),
(2,'Santa Catarina',NULL),
(2,'S�o Paulo',NULL),
(2,'Sergipe',NULL),
(2,'Tocantins',NULL),
(3,'A Iniciar',NULL),
(3,'Execu��o',NULL),
(3,'An�lise',NULL),
(3,'Finalizado',NULL),
(4,'Pai','M'),
(4,'M�e','F'),
(4,'Filho','M'),
(4,'Filha','F'),
(4,'Nora','F'),
(4,'Genro','M'),
(4,'Cunhado','M'),
(4,'Av�','M'),
(4,'Av�','F'),
(4,'Neto','M'),
(4,'Neta','F'),
(4,'Esposa','F'),
(4,'Marido','M'),
(4,'Namorado','M'),
(4,'Namorada','F'),
(4,'Noivo','M'),
(4,'Noiva','F'),
(4,'Amigo','M'),
(4,'Amiga','F'),
(4,'Sogro','M'),
(4,'Sogra','F'),
(4,'Irm�o','M'),
(4,'Irm�','F'),
(5,'Residencial',NULL),
(5,'Comercial',NULL),
(5,'Celular',NULL),
(5,'Contato Extra',NULL),
(6,'Central',NULL),
(6,'Fax',NULL),
(6,'Ramal Direto',NULL),
(6,'Celular',NULL),
(7,'Primario',NULL),
(7,'Ensino Fundamental',NULL),
(7,'Ensino M�dio',NULL),
(7,'Curso T�cnico',NULL),
(7,'Ensino Superior',NULL),
(7,'P�s-Gradua��o',NULL),
(7,'Mestrado',NULL),
(7,'Doutorado',NULL),
(8,'Escola Municipal',NULL),
(8,'Escola Estadual',NULL),
(8,'Escola Particular',NULL),
(8,'Universidade Particular',NULL),
(8,'Universidade Federal',NULL),
(8,'Universidade Estadual',NULL),
(8,'Universidade Municipal',NULL),
(8,'Cursos Tecnol�gicos',NULL),
(8,'Cursos T�cnicos',NULL),
(8,'Condom�nio',NULL),
(8,'Software',NULL),
(9,'Residencial',NULL),
(9,'Comercial',NULL),
(9,'Condom�nio de Apartamentos',NULL),
(9,'Pr�dio',NULL),
(9,'Outros',NULL),
(10,'Claro',NULL),
(10,'Oi',NULL),
(10,'Tim',NULL),
(10,'CTBC',NULL),
(10,'Telefonica',NULL),
(10,'Embratel',NULL),
(10,'Net',NULL),
(11,'Internet',NULL),
(11,'Vaga de Garagem',NULL),
(12,'Barulho no apartamento',NULL),
(12,'Problema com visitante',NULL),
(12,'Acesso sem chip',NULL),
(12,'Estacionamento em vaga errada',NULL),
(12,'Danos ao patrim�nio',NULL),
(12,'Outros',NULL),
(13,'Zeladoria',NULL),
(13,'Tecnologia',NULL),
(13,'Outros',NULL),
(14, 'Medicina',NULL),
(14, 'Psicologia',NULL),
(14, 'Veterin�ria',NULL),
(14, 'Matem�tica',NULL),
(14, 'Letras Ingl�s',NULL),
(14, 'Publicidade',NULL),
(14, 'Direito',NULL),
(14, 'Sistemas de Informa��o',NULL),
(14, 'Ci�ncia da Computa��o',NULL),
(14, 'Engenharia Civil',NULL),
(14, 'Engenharia de Produ��o',NULL),
(14, 'Economia',NULL),
(14, 'Administra��o',NULL),
(14, 'Est�tica e Cosm�tica',NULL),
(14, 'Moda',NULL),
(14, 'Gastronomia',NULL),
(14, 'Ci�ncias Cont�beis',NULL),
(14, 'Turismo',NULL),
(14, 'An�lise e Desenvolvimento',NULL),
(14, 'Biomedicina',NULL),
(14, 'Arquitetura',NULL),
(14, 'Nutri��o',NULL),
(15, 'Bom',NULL),
(15, 'Regular',NULL),
(15, 'Ruim',NULL),
(16, 'Privada',NULL),
(16, 'P�blica',NULL),
(16, 'Ensino',NULL),
(17, 'Torre',NULL),
(17, '�rea de Lazer',NULL),
(17, 'Administra��o',NULL),
(18, 'Kitnet',NULL),
(18, 'Duplex',NULL),
(19, 'Humanas',NULL),
(19, 'Exatas',NULL),
(19, 'Tecnol�gicas',NULL),
(19, 'Biol�gicas',NULL),
(20, 'Matutino',NULL),
(20, 'Verpertino',NULL),
(20, 'Noturno',NULL),
  (20, 'Integral',NULL);

INSERT INTO TB_PROFISSAO(
  NM_PROFISSAO,
  CD_USUARIO_CRIACAO,
  DT_USUARIO_CRIACAO,
  CD_USUARIO_ATUALIZA,
  DT_USUARIO_ATUALIZA
)
VALUES
  ('Almoxarife',1,now(),1,now()),
('Analista Cont�bil',1,now(),1,now()),
('Analista Faturamento',1,now(),1,now()),
('Aposentado',1,now(),1,now()),
('Assistente Social',1,now(),1,now()),
('Atendente de Enfermagem',1,now(),1,now()),
('Aux. Impress�o',1,now(),1,now()),
('Aux. Servi�os Gerais',1,now(),1,now()),
('Auxiliar de Almoxarifado',1,now(),1,now()),
('Auxiliar de Contabilidade',1,now(),1,now()),
('Auxiliar de Contas a Pagar',1,now(),1,now()),
('Auxiliar de Contas a Receber',1,now(),1,now()),
('Auxiliar de Cozinha',1,now(),1,now()),
('Auxiliar de Enfermagem',1,now(),1,now()),
('Auxiliar de Escrit�rio',1,now(),1,now()),
('Auxiliar de Farm�cia',1,now(),1,now()),
('Auxiliar de Interna��o',1,now(),1,now()),
('Auxiliar de Lavanderia',1,now(),1,now()),
('Auxiliar de Limpeza',1,now(),1,now()),
('Auxiliar de Manuten��o',1,now(),1,now()),
('Auxiliar de Pessoal',1,now(),1,now()),
('Auxiliar de Rouparia',1,now(),1,now()),
('Auxiliar de Secretaria',1,now(),1,now()),
('Auxiliar de Tesouraria',1,now(),1,now()),
('Barbeiro',1,now(),1,now()),
('Cabeleireiro',1,now(),1,now()),
('Chefe Dep. de Financeiro',1,now(),1,now()),
('Chefe Dep. de Manuten��o',1,now(),1,now()),
('Chefe Dep. de Psicologia',1,now(),1,now()),
('Chefe Dep. de Rec. Humanos',1,now(),1,now()),
('Chefe Dep. de Recep��o/Interna��o',1,now(),1,now()),
('Chefe Dep. de Suprimentos',1,now(),1,now()),
('Chefe Dep. Financeiro',1,now(),1,now()),
('Chefe Dep. Servi�o Social',1,now(),1,now()),
('Chefe Serv. Limpeza',1,now(),1,now()),
('Comprador',1,now(),1,now()),
('Contador(a)',1,now(),1,now()),
('Coordenador Enfermagem',1,now(),1,now()),
('Costureira',1,now(),1,now()),
('Cozinheira',1,now(),1,now()),
('Diretor Cl�nico',1,now(),1,now()),
('Do Lar',1,now(),1,now()),
('Eletricista de Manuten��o',1,now(),1,now()),
('Enfermeira',1,now(),1,now()),
('Farmac�utica',1,now(),1,now()),
('Fisioterapeuta',1,now(),1,now()),
('Gar�om',1,now(),1,now()),
('Gerente Administrativo',1,now(),1,now()),
('Gerente de T.I.',1,now(),1,now()),
('Gerente Depto. Assist. Espiritual',1,now(),1,now()),
('Gerente Depto.Prop.Doutrinaria',1,now(),1,now()),
('Gerente Hospitalar',1,now(),1,now()),
('Jardineiro',1,now(),1,now()),
('Marceneiro',1,now(),1,now()),
('Mec�nico de Manuten��o',1,now(),1,now()),
('M�dico Cl�nico Geral',1,now(),1,now()),
('M�dico Geriatra',1,now(),1,now()),
('M�dico Ginecologista',1,now(),1,now()),
('M�dico Neurologista',1,now(),1,now()),
('M�dico Plantonista',1,now(),1,now()),
('M�dico Psiquiatra',1,now(),1,now()),
('Motorista',1,now(),1,now()),
('Musicoterap�uta',1,now(),1,now()),
('Nutricionista',1,now(),1,now()),
('Pedreiro',1,now(),1,now()),
('Pintor',1,now(),1,now()),
('Presidente',1,now(),1,now()),
('Professor de Ed. F�sica',1,now(),1,now()),
('Programador de Computador',1,now(),1,now()),
('Psicologa',1,now(),1,now()),
('Recepcionista',1,now(),1,now()),
('Sapateiro',1,now(),1,now()),
('Serralheiro',1,now(),1,now()),
('Servente de Pedreiro',1,now(),1,now()),
('Superv. Rouparia/Lavanderia',1,now(),1,now()),
  ('Supervisor de Enfermagem',1,now(),1,now()),
  ('Supervisor Reda��o/Diagrama��o',1,now(),1,now()),
  ('Suporte T�cnico TI',1,now(),1,now()),
  ('T�cnico Contabil',1,now(),1,now()),
  ('T�cnico de Enfermagem',1,now(),1,now()),
  ('T�cnico Seg. Trabalho',1,now(),1,now()),
  ('Terap�uta Ocupacional',1,now(),1,now());

UPDATE TB_USUARIO SET
  CD_USUARIO_CRIACAO = 1,
  DT_USUARIO_CRIACAO = now(),
  CD_USUARIO_ATUALIZA = 1,
  DT_USUARIO_ATUALIZA	= now();

UPDATE TB_PESSOA_FISICA SET
  CD_USUARIO_CRIACAO = 1,
  DT_USUARIO_CRIACAO = now(),
  CD_USUARIO_ATUALIZA = 1,
  DT_USUARIO_ATUALIZA	= now();

UPDATE TB_CATEGORIA_VALOR SET
  CD_USUARIO_CRIACAO = 1,
  DT_USUARIO_CRIACAO = now(),
  CD_USUARIO_ATUALIZA = 1,
  DT_USUARIO_ATUALIZA	= now();

UPDATE TB_CATEGORIA SET
  CD_USUARIO_CRIACAO = 1,
  DT_USUARIO_CRIACAO = now(),
  CD_USUARIO_ATUALIZA = 1,
  DT_USUARIO_ATUALIZA	= now();

ALTER TABLE TB_USUARIO ALTER COLUMN CD_USUARIO_CRIACAO SET NOT NULL;

ALTER TABLE TB_USUARIO ALTER COLUMN DT_USUARIO_CRIACAO SET NOT NULL;

ALTER TABLE TB_USUARIO ALTER COLUMN CD_USUARIO_ATUALIZA SET NOT NULL;

ALTER TABLE TB_USUARIO ALTER COLUMN DT_USUARIO_ATUALIZA SET NOT NULL;

ALTER TABLE TB_PESSOA_FISICA ALTER COLUMN CD_USUARIO_CRIACAO SET NOT NULL;

ALTER TABLE TB_PESSOA_FISICA ALTER COLUMN DT_USUARIO_CRIACAO SET NOT NULL;

ALTER TABLE TB_PESSOA_FISICA ALTER COLUMN CD_USUARIO_ATUALIZA SET NOT NULL;

ALTER TABLE TB_PESSOA_FISICA ALTER COLUMN DT_USUARIO_ATUALIZA SET NOT NULL;

ALTER TABLE TB_CATEGORIA_VALOR ALTER COLUMN CD_USUARIO_CRIACAO SET NOT NULL;

ALTER TABLE TB_CATEGORIA_VALOR ALTER COLUMN DT_USUARIO_CRIACAO SET NOT NULL;

ALTER TABLE TB_CATEGORIA_VALOR ALTER COLUMN CD_USUARIO_ATUALIZA SET NOT NULL;

ALTER TABLE TB_CATEGORIA_VALOR ALTER COLUMN DT_USUARIO_ATUALIZA SET NOT NULL;

ALTER TABLE TB_CATEGORIA ALTER COLUMN CD_USUARIO_CRIACAO SET NOT NULL;

ALTER TABLE TB_CATEGORIA ALTER COLUMN DT_USUARIO_CRIACAO SET NOT NULL;

ALTER TABLE TB_CATEGORIA ALTER COLUMN CD_USUARIO_ATUALIZA SET NOT NULL;

ALTER TABLE TB_CATEGORIA ALTER COLUMN DT_USUARIO_ATUALIZA SET NOT NULL;

---Insert para teste---

INSERT INTO tb_pessoa_fisica(
  nm_pessoa_fisica,
  cpf,
  rg,
  ie_sexo,
  dt_nascimento,
  cd_usuario_criacao,
  dt_usuario_criacao,
  cd_usuario_atualiza,
  dt_usuario_atualiza)
VALUES
  ('Joana',
   '000.000.000-03',
   '00000003',
   'F',
   '01/01/2000',
   1,
   now(),
   1,
   now());

INSERT INTO tb_pessoa_juridica(
  cnpj,
  nm_fantasia,
  desc_razao,
  cd_catg_tipo_empresa,
  cd_tipo_empresa,
  cd_catg_ramo_atividade,
  cd_ramo_atividade,
  email,
  cd_usuario_criacao,
  dt_usuario_criacao,
  cd_usuario_atualiza,
  dt_usuario_atualiza)
VALUES
  ('08.950.468/0001-59',
   'Vila Brasil',
   'Condom�nio Vila Brasil',
   16,157,8,107,
   'condominio@vlbrasil.com.br',
   1,now(),1,now()),
  ('08.950.468/0001-00',
   'Uni-FACEF',
   'Centro Universit�rio de Franca',
   16,159,8,101,
   'contato@unifacef.com.br',
   1,now(),1,now());

INSERT INTO tb_pf_telefone(
  cd_pessoa_fisica,
  fone,
  cd_catg_fone_pf,
  cd_vl_catg_fone_pf,
  cd_catg_operadora,
  cd_vl_catg_operadora,
  cd_usuario_criacao,
  dt_usuario_criacao,
  cd_usuario_atualiza,
  dt_usuario_atualiza)
VALUES
  (2,'(16)99222-1212',
   5,82,10,115,1,now(),1,now());

INSERT INTO tb_pj_telefone(
  cd_pessoa_juridica,
  fone,
  cd_catg_fone_pj,
  cd_vl_catg_fone_pj,
  cd_catg_operadora,
  cd_vl_catg_operadora,
  cd_usuario_criacao,
  dt_usuario_criacao,
  cd_usuario_atualiza,
  dt_usuario_atualiza)
VALUES
  (1,'(16) 2177-5000',
   6,86,10,115,1,now(),1,now());

INSERT INTO tb_orcamento(
  ds_orcamento,
  dt_orcamento,
  cd_usuario_criacao,
  dt_usuario_criacao,
  cd_usuario_atualiza,
  dt_usuario_atualiza)
VALUES
  ('Port�o central',now(),
   1,now(),1,now());

INSERT INTO tb_itens_orcamento(
  cd_orcamento,
  cd_pessoa_juridica,
  desc_item,
  qt_item,
  valor_unit,
  valor_total,
  ie_aprovado,
  cd_usuario_criacao,
  dt_usuario_criacao,
  cd_usuario_atualiza,
  dt_usuario_atualiza)
VALUES
  (1,1,'portao',1,100.00,100.00,'P',
   1,now(),1,now());

INSERT INTO tb_relac_parametro
VALUES
  (4,59,4,61,1, now(),1, now()),
(4,59,4,62,1, now(),1, now()),
(4,60,4,61,1, now(),1, now()),
(4,60,4,62,1, now(),1, now()),
(4,78,4,63,1, now(),1, now()),
(4,78,4,64,1, now(),1, now()),
(4,79,4,63,1, now(),1, now()),
(4,79,4,64,1, now(),1, now()),
(4,65,4,65,1, now(),1, now()),
(4,66,4,68,1, now(),1, now()),
(4,66,4,69,1, now(),1, now()),
(4,67,4,68,1, now(),1, now()),
(4,67,4,69,1, now(),1, now()),
(4,70,4,71,1, now(),1, now()),
(4,72,4,73,1, now(),1, now()),
(4,74,4,75,1, now(),1, now()),
(4,76,4,76,1, now(),1, now()),
(4,76,4,77,1, now(),1, now()),
(4,77,4,76,1, now(),1, now()),
(4,76,4,76,1, now(),1, now()),
(4,77,4,77,1, now(),1, now()),
  (4,80,4,81,1, now(),1, now()),
  (4,81,4,80,1, now(),1, now()),
  (4,80,4,80,1, now(),1, now()),
  (4,81,4,81,1, now(),1, now());

------------------------------ TRIGGERS ----------------------------------

CREATE OR REPLACE FUNCTION fc_tg_apartamento_log() RETURNS TRIGGER
AS $tb_apartamento_log$
BEGIN

  IF (TG_OP = 'DELETE') THEN
    INSERT INTO tb_apartamento_log SELECT nextval('seq_tb_apartamento_log'),user::INTEGER, now(), 'D', old.*;

  ELSIF (TG_OP = 'UPDATE') THEN
    INSERT INTO tb_apartamento_log SELECT nextval('seq_tb_apartamento_log'),user::INTEGER, now(), 'U', new.*;

  ELSIF (TG_OP = 'INSERT') THEN
    INSERT INTO tb_apartamento_log SELECT nextval('seq_tb_apartamento_log'),user::INTEGER, now(), 'I', new.*;
    RETURN NEW;
  END IF;

  RETURN NULL;

END;
$tb_apartamento_log$ LANGUAGE 'plpgsql';

CREATE TRIGGER tg_tb_apartamento_log
AFTER INSERT OR UPDATE OR DELETE ON tb_apartamento
FOR EACH ROW EXECUTE PROCEDURE fc_tg_apartamento_log();



CREATE OR REPLACE FUNCTION fc_tg_categoria_log() RETURNS TRIGGER
AS $tb_categoria_log$
BEGIN

  IF (TG_OP = 'DELETE') THEN
    INSERT INTO tb_categoria_log SELECT nextval('seq_tb_categoria_log'),user::INTEGER, now(), 'D', old.*;

  ELSIF (TG_OP = 'UPDATE') THEN
    INSERT INTO tb_categoria_log SELECT nextval('seq_tb_categoria_log'),user::INTEGER, now(), 'U', new.*;

  ELSIF (TG_OP = 'INSERT') THEN
    INSERT INTO tb_categoria_log SELECT nextval('seq_tb_categoria_log'),user::INTEGER, now(), 'I', new.*;
    RETURN NEW;
  END IF;

  RETURN NULL;

END;
$tb_categoria_log$ LANGUAGE 'plpgsql';

CREATE TRIGGER tg_tb_categoria_log
AFTER INSERT OR UPDATE OR DELETE ON tb_categoria
FOR EACH ROW EXECUTE PROCEDURE fc_tg_categoria_log();


CREATE OR REPLACE FUNCTION fc_tg_categoria_valor_log() RETURNS TRIGGER
AS $tb_categoria_valor_log$
BEGIN

  IF (TG_OP = 'DELETE') THEN
    INSERT INTO tb_categoria_valor_log SELECT nextval('seq_tb_categoria_valor_log'),user::INTEGER, now(), 'D', old.*;

  ELSIF (TG_OP = 'UPDATE') THEN
    INSERT INTO tb_categoria_valor_log SELECT nextval('seq_tb_categoria_valor_log'),user::INTEGER, now(), 'U', new.*;

  ELSIF (TG_OP = 'INSERT') THEN
    INSERT INTO tb_categoria_valor_log SELECT nextval('seq_tb_categoria_valor_log'),user::INTEGER, now(), 'I', new.*;
    RETURN NEW;
  END IF;

  RETURN NULL;

END;
$tb_categoria_valor_log$ LANGUAGE 'plpgsql';

CREATE TRIGGER tg_tb_categoria_valor_log
AFTER INSERT OR UPDATE OR DELETE ON tb_categoria_valor
FOR EACH ROW EXECUTE PROCEDURE fc_tg_categoria_valor_log();

CREATE OR REPLACE FUNCTION fc_tg_itens_orcamento_log() RETURNS TRIGGER
AS $tb_itens_orcamento_log$
BEGIN

  IF (TG_OP = 'DELETE') THEN
    INSERT INTO tb_itens_orcamento_log SELECT nextval('seq_tb_itens_orcamento_log'),user::INTEGER, now(), 'D', old.*;

  ELSIF (TG_OP = 'UPDATE') THEN
    INSERT INTO tb_itens_orcamento_log SELECT nextval('seq_tb_itens_orcamento_log'),user::INTEGER, now(), 'U', new.*;

  ELSIF (TG_OP = 'INSERT') THEN
    INSERT INTO tb_itens_orcamento_log SELECT nextval('seq_tb_itens_orcamento_log'),user::INTEGER, now(), 'I', new.*;
    RETURN NEW;
  END IF;

  RETURN NULL;

END;
$tb_itens_orcamento_log$ LANGUAGE 'plpgsql';

CREATE TRIGGER tg_tb_itens_orcamento_log
AFTER INSERT OR UPDATE OR DELETE ON tb_itens_orcamento
FOR EACH ROW EXECUTE PROCEDURE fc_tg_itens_orcamento_log();


CREATE OR REPLACE FUNCTION fc_tg_morador_endereco_log() RETURNS TRIGGER
AS $tb_morador_endereco_log$
BEGIN

  IF (TG_OP = 'DELETE') THEN
    INSERT INTO tb_morador_endereco_log SELECT nextval('seq_tb_morador_endereco_log'),user::INTEGER, now(), 'D', old.*;

  ELSIF (TG_OP = 'UPDATE') THEN
    INSERT INTO tb_morador_endereco_log SELECT nextval('seq_tb_morador_endereco_log'),user::INTEGER, now(), 'U', new.*;

  ELSIF (TG_OP = 'INSERT') THEN
    INSERT INTO tb_morador_endereco_log SELECT nextval('seq_tb_morador_endereco_log'),user::INTEGER, now(), 'I', new.*;
    RETURN NEW;
  END IF;

  RETURN NULL;

END;
$tb_morador_endereco_log$ LANGUAGE 'plpgsql';

CREATE TRIGGER tg_tb_morador_endereco_log
AFTER INSERT OR UPDATE OR DELETE ON tb_morador_endereco
FOR EACH ROW EXECUTE PROCEDURE fc_tg_morador_endereco_log();


CREATE OR REPLACE FUNCTION fc_tg_ocorrencia_pf_envolvida_log() RETURNS TRIGGER
AS $tb_ocorrencia_pf_envolvida_log$
BEGIN

  IF (TG_OP = 'DELETE') THEN
    INSERT INTO tb_ocorrencia_pf_envolvida_log SELECT nextval('seq_tb_ocorrencia_pf_envolvida_log'),user::INTEGER, now(), 'D', old.*;

  ELSIF (TG_OP = 'UPDATE') THEN
    INSERT INTO tb_ocorrencia_pf_envolvida_log SELECT nextval('seq_tb_ocorrencia_pf_envolvida_log'),user::INTEGER, now(), 'U', new.*;

  ELSIF (TG_OP = 'INSERT') THEN
    INSERT INTO tb_ocorrencia_pf_envolvida_log SELECT nextval('seq_tb_ocorrencia_pf_envolvida_log'),user::INTEGER, now(), 'I', new.*;
    RETURN NEW;
  END IF;

  RETURN NULL;

END;
$tb_ocorrencia_pf_envolvida_log$ LANGUAGE 'plpgsql';

CREATE TRIGGER tg_tb_ocorrencia_pf_envolvida_log
AFTER INSERT OR UPDATE OR DELETE ON tb_ocorrencia_pf_envolvida
FOR EACH ROW EXECUTE PROCEDURE fc_tg_ocorrencia_pf_envolvida_log();

CREATE OR REPLACE FUNCTION fc_tg_ocorrencia_log() RETURNS TRIGGER
AS $tb_ocorrencia_log$
BEGIN

  IF (TG_OP = 'DELETE') THEN
    INSERT INTO tb_ocorrencia_log SELECT nextval('seq_tb_ocorrencia_log'),user::INTEGER, now(), 'D', old.*;

  ELSIF (TG_OP = 'UPDATE') THEN
    INSERT INTO tb_ocorrencia_log SELECT nextval('seq_tb_ocorrencia_log'),user::INTEGER, now(), 'U', new.*;

  ELSIF (TG_OP = 'INSERT') THEN
    INSERT INTO tb_ocorrencia_log SELECT nextval('seq_tb_ocorrencia_log'),user::INTEGER, now(), 'I', new.*;
    RETURN NEW;
  END IF;

  RETURN NULL;

END;
$tb_ocorrencia_log$ LANGUAGE 'plpgsql';

CREATE TRIGGER tg_tb_ocorrencia_log
AFTER INSERT OR UPDATE OR DELETE ON tb_ocorrencia
FOR EACH ROW EXECUTE PROCEDURE fc_tg_ocorrencia_log();


CREATE OR REPLACE FUNCTION fc_tg_orcamento_log() RETURNS TRIGGER
AS $tb_orcamento_log$
BEGIN

  IF (TG_OP = 'DELETE') THEN
    INSERT INTO tb_orcamento_log SELECT nextval('seq_tb_orcamento_log'),user::INTEGER, now(), 'D', old.*;

  ELSIF (TG_OP = 'UPDATE') THEN
    INSERT INTO tb_orcamento_log SELECT nextval('seq_tb_orcamento_log'),user::INTEGER, now(), 'U', new.*;

  ELSIF (TG_OP = 'INSERT') THEN
    INSERT INTO tb_orcamento_log SELECT nextval('seq_tb_orcamento_log'),user::INTEGER, now(), 'I', new.*;
    RETURN NEW;
  END IF;

  RETURN NULL;

END;
$tb_orcamento_log$ LANGUAGE 'plpgsql';

CREATE TRIGGER tg_tb_orcamento_log
AFTER INSERT OR UPDATE OR DELETE ON tb_orcamento
FOR EACH ROW EXECUTE PROCEDURE fc_tg_orcamento_log();

CREATE OR REPLACE FUNCTION fc_tg_ordem_servico_log() RETURNS TRIGGER
AS $tb_ordem_servico_log$
BEGIN

  IF (TG_OP = 'DELETE') THEN
    INSERT INTO tb_ordem_servico_log SELECT nextval('seq_tb_ordem_servico_log'),user::INTEGER, now(), 'D', old.*;

  ELSIF (TG_OP = 'UPDATE') THEN
    INSERT INTO tb_ordem_servico_log SELECT nextval('seq_tb_ordem_servico_log'),user::INTEGER, now(), 'U', new.*;

  ELSIF (TG_OP = 'INSERT') THEN
    INSERT INTO tb_ordem_servico_log SELECT nextval('seq_tb_ordem_servico_log'),user::INTEGER, now(), 'I', new.*;
    RETURN NEW;
  END IF;

  RETURN NULL;

END;
$tb_ordem_servico_log$ LANGUAGE 'plpgsql';

CREATE TRIGGER tg_tb_ordem_servico_log
AFTER INSERT OR UPDATE OR DELETE ON tb_ordem_servico
FOR EACH ROW EXECUTE PROCEDURE fc_tg_ordem_servico_log();

CREATE OR REPLACE FUNCTION fc_tg_pessoa_fisica_log() RETURNS TRIGGER
AS $tb_pessoa_fisica_log$
BEGIN

  IF (TG_OP = 'DELETE') THEN
    INSERT INTO tb_pessoa_fisica_log SELECT nextval('seq_tb_pessoa_fisica_log'),user::INTEGER, now(), 'D', old.*;

  ELSIF (TG_OP = 'UPDATE') THEN
    INSERT INTO tb_pessoa_fisica_log SELECT nextval('seq_tb_pessoa_fisica_log'),user::INTEGER, now(), 'U', new.*;

  ELSIF (TG_OP = 'INSERT') THEN
    INSERT INTO tb_pessoa_fisica_log SELECT nextval('seq_tb_pessoa_fisica_log'),user::INTEGER, now(), 'I', new.*;
    RETURN NEW;
  END IF;

  RETURN NULL;

END;
$tb_pessoa_fisica_log$ LANGUAGE 'plpgsql';

CREATE TRIGGER tg_tb_pessoa_fisica_log
AFTER INSERT OR UPDATE OR DELETE ON tb_pessoa_fisica
FOR EACH ROW EXECUTE PROCEDURE fc_tg_pessoa_fisica_log();


CREATE OR REPLACE FUNCTION fc_tg_pessoa_juridica_log() RETURNS TRIGGER
AS $tb_pessoa_juridica_log$
BEGIN

  IF (TG_OP = 'DELETE') THEN
    INSERT INTO tb_pessoa_juridica_log SELECT nextval('seq_tb_pessoa_juridica_log'),user::INTEGER, now(), 'D', old.*;

  ELSIF (TG_OP = 'UPDATE') THEN
    INSERT INTO tb_pessoa_juridica_log SELECT nextval('seq_tb_pessoa_juridica_log'),user::INTEGER, now(), 'U', new.*;

  ELSIF (TG_OP = 'INSERT') THEN
    INSERT INTO tb_pessoa_juridica_log SELECT nextval('seq_tb_pessoa_juridica_log'),user::INTEGER, now(), 'I', new.*;
    RETURN NEW;
  END IF;

  RETURN NULL;

END;
$tb_pessoa_juridica_log$ LANGUAGE 'plpgsql';

CREATE TRIGGER tg_tb_pessoa_juridica_log
AFTER INSERT OR UPDATE OR DELETE ON tb_pessoa_juridica
FOR EACH ROW EXECUTE PROCEDURE fc_tg_pessoa_juridica_log();



CREATE OR REPLACE FUNCTION fc_tg_pf_endereco_log() RETURNS TRIGGER
AS $tb_pf_endereco_log$
BEGIN

  IF (TG_OP = 'DELETE') THEN
    INSERT INTO tb_pf_endereco_log SELECT nextval('seq_tb_pf_endereco_log'),user::INTEGER, now(), 'D', old.*;

  ELSIF (TG_OP = 'UPDATE') THEN
    INSERT INTO tb_pf_endereco_log SELECT nextval('seq_tb_pf_endereco_log'),user::INTEGER, now(), 'U', new.*;

  ELSIF (TG_OP = 'INSERT') THEN
    INSERT INTO tb_pf_endereco_log SELECT nextval('seq_tb_pf_endereco_log'),user::INTEGER, now(), 'I', new.*;
    RETURN NEW;
  END IF;

  RETURN NULL;

END;
$tb_pf_endereco_log$ LANGUAGE 'plpgsql';

CREATE TRIGGER tg_tb_pf_endereco_log
AFTER INSERT OR UPDATE OR DELETE ON tb_pf_endereco
FOR EACH ROW EXECUTE PROCEDURE fc_tg_pf_endereco_log();

CREATE OR REPLACE FUNCTION fc_tg_pj_endereco_log() RETURNS TRIGGER
AS $tb_pj_endereco_log$
BEGIN

  IF (TG_OP = 'DELETE') THEN
    INSERT INTO tb_pj_endereco_log SELECT nextval('seq_tb_pj_endereco_log'),user::INTEGER, now(), 'D', old.*;

  ELSIF (TG_OP = 'UPDATE') THEN
    INSERT INTO tb_pj_endereco_log SELECT nextval('seq_tb_pj_endereco_log'),user::INTEGER, now(), 'U', new.*;

  ELSIF (TG_OP = 'INSERT') THEN
    INSERT INTO tb_pj_endereco_log SELECT nextval('seq_tb_pj_endereco_log'),user::INTEGER, now(), 'I', new.*;
    RETURN NEW;
  END IF;

  RETURN NULL;

END;
$tb_pj_endereco_log$ LANGUAGE 'plpgsql';

CREATE TRIGGER tg_tb_pj_endereco_log
AFTER INSERT OR UPDATE OR DELETE ON tb_pj_endereco
FOR EACH ROW EXECUTE PROCEDURE fc_tg_pj_endereco_log();


CREATE OR REPLACE FUNCTION fc_tg_profissao_log() RETURNS TRIGGER
AS $tb_profissao_log$
BEGIN

  IF (TG_OP = 'DELETE') THEN
    INSERT INTO tb_profissao_log SELECT nextval('seq_tb_profissao_log'),user::INTEGER, now(), 'D', old.*;

  ELSIF (TG_OP = 'UPDATE') THEN
    INSERT INTO tb_profissao_log SELECT nextval('seq_tb_profissao_log'),user::INTEGER, now(), 'U', new.*;

  ELSIF (TG_OP = 'INSERT') THEN
    INSERT INTO tb_profissao_log SELECT nextval('seq_tb_profissao_log'),user::INTEGER, now(), 'I', new.*;
    RETURN NEW;
  END IF;

  RETURN NULL;

END;
$tb_profissao_log$ LANGUAGE 'plpgsql';

CREATE TRIGGER tg_tb_profissao_log
AFTER INSERT OR UPDATE OR DELETE ON tb_profissao
FOR EACH ROW EXECUTE PROCEDURE fc_tg_profissao_log();


CREATE OR REPLACE FUNCTION fc_tg_relacionados_log() RETURNS TRIGGER
AS $tb_relacionados_log$
BEGIN

  IF (TG_OP = 'DELETE') THEN
    INSERT INTO tb_relacionados_log SELECT nextval('seq_tb_relacionados_log'),user::INTEGER, now(), 'D', old.*;

  ELSIF (TG_OP = 'UPDATE') THEN
    INSERT INTO tb_relacionados_log SELECT nextval('seq_tb_relacionados_log'),user::INTEGER, now(), 'U', new.*;

  ELSIF (TG_OP = 'INSERT') THEN
    INSERT INTO tb_relacionados_log SELECT nextval('seq_tb_relacionados_log'),user::INTEGER, now(), 'I', new.*;
    RETURN NEW;
  END IF;

  RETURN NULL;

END;
$tb_relacionados_log$ LANGUAGE 'plpgsql';

CREATE TRIGGER tg_tb_relacionados_log
AFTER INSERT OR UPDATE OR DELETE ON tb_relacionados
FOR EACH ROW EXECUTE PROCEDURE fc_tg_relacionados_log();

CREATE OR REPLACE FUNCTION fc_tg_servico_adicional_log() RETURNS TRIGGER
AS $tb_servico_adicional_log$
BEGIN

  IF (TG_OP = 'DELETE') THEN
    INSERT INTO tb_servico_adicional_log SELECT nextval('seq_tb_servico_adicional_log'),user::INTEGER, now(), 'D', old.*;

  ELSIF (TG_OP = 'UPDATE') THEN
    INSERT INTO tb_servico_adicional_log SELECT nextval('seq_tb_servico_adicional_log'),user::INTEGER, now(), 'U', new.*;

  ELSIF (TG_OP = 'INSERT') THEN
    INSERT INTO tb_servico_adicional_log SELECT nextval('seq_tb_servico_adicional_log'),user::INTEGER, now(), 'I', new.*;
    RETURN NEW;
  END IF;

  RETURN NULL;

END;
$tb_servico_adicional_log$ LANGUAGE 'plpgsql';

CREATE TRIGGER tg_tb_servico_adicional_log
AFTER INSERT OR UPDATE OR DELETE ON tb_servico_adicional
FOR EACH ROW EXECUTE PROCEDURE fc_tg_servico_adicional_log();


CREATE OR REPLACE FUNCTION fc_tg_setor_log() RETURNS TRIGGER
AS $tb_setor_log$
BEGIN

  IF (TG_OP = 'DELETE') THEN
    INSERT INTO tb_setor_log SELECT nextval('seq_tb_setor_log'),user::INTEGER, now(), 'D', old.*;

  ELSIF (TG_OP = 'UPDATE') THEN
    INSERT INTO tb_setor_log SELECT nextval('seq_tb_setor_log'),user::INTEGER, now(), 'U', new.*;

  ELSIF (TG_OP = 'INSERT') THEN
    INSERT INTO tb_setor_log SELECT nextval('seq_tb_setor_log'),user::INTEGER, now(), 'I', new.*;
    RETURN NEW;
  END IF;

  RETURN NULL;

END;
$tb_setor_log$ LANGUAGE 'plpgsql';

CREATE TRIGGER tg_tb_setor_log
AFTER INSERT OR UPDATE OR DELETE ON tb_setor
FOR EACH ROW EXECUTE PROCEDURE fc_tg_setor_log();


CREATE OR REPLACE FUNCTION fc_tg_usuario_log() RETURNS TRIGGER
AS $tb_usuario_log$
BEGIN

  IF (TG_OP = 'DELETE') THEN
    INSERT INTO tb_usuario_log SELECT nextval('seq_tb_usuario_log'),user::INTEGER, now(), 'D', old.*;

  ELSIF (TG_OP = 'UPDATE') THEN
    INSERT INTO tb_usuario_log SELECT nextval('seq_tb_usuario_log'),user::INTEGER, now(), 'U', new.*;

  ELSIF (TG_OP = 'INSERT') THEN
    INSERT INTO tb_usuario_log SELECT nextval('seq_tb_usuario_log'),user::INTEGER, now(), 'I', new.*;
    RETURN NEW;
  END IF;

  RETURN NULL;

END;
$tb_usuario_log$ LANGUAGE 'plpgsql';

CREATE TRIGGER tg_tb_usuario_log
AFTER INSERT OR UPDATE OR DELETE ON tb_usuario
FOR EACH ROW EXECUTE PROCEDURE fc_tg_usuario_log();

CREATE OR REPLACE FUNCTION fc_tg_vaga_garagem_log() RETURNS TRIGGER
AS $tb_vaga_garagem_log$
BEGIN

  IF (TG_OP = 'DELETE') THEN
    INSERT INTO tb_vaga_garagem_log SELECT nextval('seq_tb_vaga_garagem_log'),user::INTEGER, now(), 'D', old.*;

  ELSIF (TG_OP = 'UPDATE') THEN
    INSERT INTO tb_vaga_garagem_log SELECT nextval('seq_tb_vaga_garagem_log'),user::INTEGER, now(), 'U', new.*;

  ELSIF (TG_OP = 'INSERT') THEN
    INSERT INTO tb_vaga_garagem_log SELECT nextval('seq_tb_vaga_garagem_log'),user::INTEGER, now(), 'I', new.*;
    RETURN NEW;
  END IF;

  RETURN NULL;

END;
$tb_vaga_garagem_log$ LANGUAGE 'plpgsql';

CREATE TRIGGER tg_tb_vaga_garagem_log
AFTER INSERT OR UPDATE OR DELETE ON tb_vaga_garagem
FOR EACH ROW EXECUTE PROCEDURE fc_tg_vaga_garagem_log();

CREATE OR REPLACE FUNCTION fc_tg_pf_telefone_log() RETURNS TRIGGER
AS $tb_pf_telefone_log$
BEGIN

  IF (TG_OP = 'DELETE') THEN
    INSERT INTO tb_pf_telefone_log SELECT nextval('seq_tb_pf_telefone_log'),user::INTEGER, now(), 'D', old.*;

  ELSIF (TG_OP = 'UPDATE') THEN
    INSERT INTO tb_pf_telefone_log SELECT nextval('seq_tb_pf_telefone_log'),user::INTEGER, now(), 'U', new.*;

  ELSIF (TG_OP = 'INSERT') THEN
    INSERT INTO tb_pf_telefone_log SELECT nextval('seq_tb_pf_telefone_log'),user::INTEGER, now(), 'I', new.*;
    RETURN NEW;
  END IF;

  RETURN NULL;

END;
$tb_pf_telefone_log$ LANGUAGE 'plpgsql';

CREATE TRIGGER tg_tb_pf_telefone_log
AFTER INSERT OR UPDATE OR DELETE ON tb_pf_telefone
FOR EACH ROW EXECUTE PROCEDURE fc_tg_pf_telefone_log();



CREATE OR REPLACE FUNCTION fc_tg_pj_telefone_log() RETURNS TRIGGER
AS $tb_pj_telefone_log$
BEGIN

  IF (TG_OP = 'DELETE') THEN
    INSERT INTO tb_pj_telefone_log SELECT nextval('seq_tb_pj_telefone_log'),user::INTEGER, now(), 'D', old.*;

  ELSIF (TG_OP = 'UPDATE') THEN
    INSERT INTO tb_pj_telefone_log SELECT nextval('seq_tb_pj_telefone_log'),user::INTEGER, now(), 'U', new.*;

  ELSIF (TG_OP = 'INSERT') THEN
    INSERT INTO tb_pj_telefone_log SELECT nextval('seq_tb_pj_telefone_log'),user::INTEGER, now(), 'I', new.*;
    RETURN NEW;
  END IF;

  RETURN NULL;

END;
$tb_pj_telefone_log$ LANGUAGE 'plpgsql';

CREATE TRIGGER tg_tb_pj_telefone_log
AFTER INSERT OR UPDATE OR DELETE ON tb_pj_telefone
FOR EACH ROW EXECUTE PROCEDURE fc_tg_pj_telefone_log();


CREATE OR REPLACE FUNCTION fc_tg_info_estudos_log() RETURNS TRIGGER
AS $tb_info_estudos_log$
BEGIN

  IF (TG_OP = 'DELETE') THEN
    INSERT INTO tb_info_estudos_log SELECT nextval('seq_tb_info_estudos_log'),user::INTEGER, now(), 'D', old.*;

  ELSIF (TG_OP = 'UPDATE') THEN
    INSERT INTO tb_info_estudos_log SELECT nextval('seq_tb_info_estudos_log'),user::INTEGER, now(), 'U', new.*;

  ELSIF (TG_OP = 'INSERT') THEN
    INSERT INTO tb_info_estudos_log SELECT nextval('seq_tb_info_estudos_log'),user::INTEGER, now(), 'I', new.*;
    RETURN NEW;
  END IF;

  RETURN NULL;

END;
$tb_info_estudos_log$ LANGUAGE 'plpgsql';

CREATE TRIGGER tg_tb_info_estudos_log
AFTER INSERT OR UPDATE OR DELETE ON tb_info_estudos
FOR EACH ROW EXECUTE PROCEDURE fc_tg_info_estudos_log();