with open("foodplaner.sql", "r") as file:
	filedata = file.read()

filedata = filedata.replace(" DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci", "")
filedata = filedata.replace(" CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci", "")

with open("foodplaner.sql", "w") as file:
	file.write(filedata)
