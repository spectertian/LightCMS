CREATE TABLE `report`
(
    `id`             int unsigned NOT NULL AUTO_INCREMENT,
    `report_id`      varchar(50)  NOT NULL COMMENT '报告编号',
    `client_name`    varchar(100) NOT NULL DEFAULT '' COMMENT '委托方',
    `client_address` varchar(200)          DEFAULT NULL COMMENT '委托方地址',
    `sample_name`    varchar(100) NOT NULL COMMENT '样品名称',
    `model_spec`     varchar(100)          DEFAULT NULL COMMENT '型号规格',
    `receive_date`   date         NOT NULL COMMENT '接收日期',
    `test_date`      date         NOT NULL COMMENT '检测日期',
    `report_date`    date         NOT NULL COMMENT '报告日期',
    `create_time`    timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
    `update_time`    timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
    `medium_data`    mediumblob,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;