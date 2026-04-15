users-tabel

	1	id Primaire sleutel	int			Nee	Geen		AUTO_INCREMENT	Veranderen Veranderen	Verwijderen Verwijderen	
	2	username	varchar(255)	utf8mb4_0900_ai_ci		Nee	Geen			Veranderen Veranderen	Verwijderen Verwijderen	
	3	password	varchar(255)	utf8mb4_0900_ai_ci		Nee	Geen			Veranderen Veranderen	Verwijderen Verwijderen	
	4	xp	int			Nee	Geen			Veranderen Veranderen	Verwijderen Verwijderen	
	5	profile-picture	varchar(255)	utf8mb4_0900_ai_ci		Ja	NULL			Veranderen Veranderen	Verwijderen Verwijderen	

messages-tabel

	1	id Primaire sleutel	int			Nee	Geen		AUTO_INCREMENT	Veranderen Veranderen	Verwijderen Verwijderen	
	2	user-id Index	int			Nee	Geen			Veranderen Veranderen	Verwijderen Verwijderen	
	3	message	text	utf8mb4_0900_ai_ci		Nee	Geen			Veranderen Veranderen	Verwijderen Verwijderen	
	4	image	varchar(255)	utf8mb4_0900_ai_ci		Ja	NULL			Veranderen Veranderen	Verwijderen Verwijderen	
	5	post-date	timestamp		on update CURRENT_TIMESTAMP	Nee	CURRENT_TIMESTAMP		DEFAULT_GENERATED ON UPDATE CURRENT_TIMESTAMP	Veranderen Veranderen	Verwijderen Verwijderen	
	6	image_path	varchar(255)	utf8mb4_0900_ai_ci		Ja	NULL			Veranderen Veranderen	Verwijderen Verwijderen	
