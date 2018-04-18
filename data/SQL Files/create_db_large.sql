
create table player
(
player_id int not null,
player_name varchar(50) not null,
age int not null,
position varchar(50) not null,
country varchar(50) not null,
PRIMARY KEY (player_id)
);

create table manager
(
manager_id int not null,
manager_name varchar(50) not null,
age int not null,
country varchar(50) not null,
PRIMARY KEY (manager_id)
);

create table club
(
club_id int not null,
club_name varchar(50) not null,
home_stadium varchar(50) not null,
league varchar(100) not null,
country varchar(50) not null,
PRIMARY KEY (club_id)
);

create table season
(
season_id int not null,
season_year year(4) not null,
PRIMARY KEY (season_id)
);

create table matches
(
match_id int not null,
match_date datetime not null,
season_id int not null,
home_id int not null,
away_id int not null,
home_score int not null,
away_score int not null,
PRIMARY KEY (match_id),
FOREIGN KEY (season_id) references season(season_id),
FOREIGN KEY (home_id) references club(club_id),
FOREIGN KEY (away_id) references club(club_id)
);

create table assist
(
assist_id int not null,
player_id int not null,
season_id int not null,
PRIMARY KEY (assist_id),
FOREIGN KEY (player_id) references player(player_id),
FOREIGN KEY (season_id) references season(season_id)
);

create table goalscore
(
goal_id int not null,
assist_id int not null,
match_id int not null,
player_id int not null,
goal_min int not null,
season_id int not null,
PRIMARY KEY (goal_id),
FOREIGN KEY (match_id) references matches(match_id),
FOREIGN KEY (player_id) references player(player_id),
FOREIGN KEY (season_id) references season(season_id)
);

create table playerclub
(
player_id int not null,
club_id int not null,
start_date date not null,
end_date date,
FOREIGN KEY (player_id) references player(player_id),
FOREIGN KEY (club_id) references club(club_id)
);

create table managerplayer
(
manager_id int not null,
player_id int not null,
start_date date not null,
end_date date,
FOREIGN KEY (manager_id) references manager(manager_id),
FOREIGN KEY (player_id) references player(player_id)
);

create table managerclub
(
manager_id int not null,
club_id int null,
start_date date not null,
end_date date,
FOREIGN KEY (manager_id) references manager(manager_id),
FOREIGN KEY (club_id) references club(club_id)
);

create table seasonclub
(
season_id int not null,
club_id int not null,
home_win int not null,
home_draw int not null,
home_defeat int not null,
away_win int not null,
away_draw int not null,
away_defeat int not null,
FOREIGN KEY (season_id) references season(season_id),
FOREIGN KEY (club_id) references club(club_id)
);

create table card
(
player_id int not null,
match_id int not null,
season_id int not null,
card_type char(10) not null,
card_min int not null,
FOREIGN KEY (player_id) references player(player_id),
FOREIGN KEY (match_id) references matches(match_id),
FOREIGN KEY (season_id) references season(season_id)
);

create table playermatch
(
player_id int not null,
match_id int not null,
time_enter int not null,
time_exit int not null,
FOREIGN KEY (player_id) references player(player_id),
FOREIGN KEY (match_id) references matches(match_id)
);


