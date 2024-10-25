-- auto-generated definition
create table report
(
    id             int unsigned auto_increment
        primary key,
    report_id      varchar(50)                            not null comment '报告编号',
    client_name    varchar(100) default ''                not null comment '委托方',
    client_address varchar(200)                           null comment '委托方地址',
    sample_name    varchar(100)                           not null comment '样品名称',
    model_spec     varchar(100)                           null comment '型号规格',
    receive_date   date                                   not null comment '接收日期',
    test_date      date                                   not null comment '检测日期',
    report_date    date                                   not null comment '报告日期',
    create_time    timestamp    default CURRENT_TIMESTAMP null comment '创建时间',
    update_time    timestamp    default CURRENT_TIMESTAMP null on update CURRENT_TIMESTAMP comment '更新时间'
);

