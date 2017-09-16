-- CMS 新闻管理系统
-- 创建数据库 cms2
CREATE DATABASE cms2
CHARACTER SET utf8;
USE cms2;
-- cms_admin  系统管理员表表结构
CREATE TABLE cms_admin(
  id SMALLINT UNSIGNED KEY AUTO_INCREMENT,
  aname VARCHAR(30) NOT NULL UNIQUE,
  pwd CHAR(32) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
--给cms_admin表 添加数据
INSERT cms_admin(aname,pwd)
VALUE
('tom',MD5('12345')),
('rose',MD5('34567'));

-- cms_type 新闻分类表表结构
CREATE TABLE cms_type(
 id SMALLINT UNSIGNED KEY AUTO_INCREMENT,
 tname VARCHAR(30) NOT NULL UNIQUE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

--给cms_type表 添加数据
INSERT cms_type(tname)
VALUE
('国内'),
('国际'),
('体育'),
('娱乐');

-- cms_article 新闻表表结构
CREATE TABLE cms_article(
 id SMALLINT UNSIGNED KEY AUTO_INCREMENT,
 title VARCHAR(80) NOT NULL,
 contents TEXT NOT NULL,
 tid  SMALLINT UNSIGNED NOT NULL,
 aid  SMALLINT UNSIGNED NOT NULL,
 addtime TIMESTAMP NOT NULL DEFAULT current_timestamp,
 FOREIGN KEY(tid) REFERENCES cms_type(id),
 FOREIGN KEY(aid) REFERENCES cms_admin(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- 新闻分类  1.国内 2 国际  3 体育 4 娱乐
--给cms_article表 添加数据
INSERT cms_article(title,contents,tid,aid)
VALUE
('首相“恩怨”：卡梅伦和特雷莎曾就“脱欧”不合','首相“恩怨”：卡梅伦和特雷莎曾就“脱欧”不合',2,1),
('华裔女子枪战悍匪获网友点赞 在美华裔安全引担忧','华裔女子枪战悍匪获网友点赞 在美华裔安全引担忧',2,1),
('习近平：努力建设一支强大的现代化火箭军','习近平：努力建设一支强大的现代化火箭军',1,1),
('人民日报评论：失去奋斗，房产再多我们也将无家可归','人民日报评论：失去奋斗，房产再多我们也将无家可归',1,1),
('奥运会女排','奥运会女排金牌',3,2),
('篮球','篮球',3,2),
('小沈阳','小沈阳',4,2),
('快乐大本营','快乐大本营',4,2);


-- 多表联合查询  cms_admin   cms_type  cms_article
-- 字段 :新闻编号  新闻标题  分类名称  管理员名称  新闻发布时间
SELECT ar.id,ar.title,t.tname,
ad.aname,ar.addtime FROM cms_article AS ar
INNER JOIN cms_admin AS ad
ON ar.aid = ad.id
INNER JOIN cms_type AS t
ON ar.tid = t.id;