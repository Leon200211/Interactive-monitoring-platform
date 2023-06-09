import os


def rename_labels(path_to_folder, mas):
    '''! Функция переименования классов в текстовых аннотациях'''
    mas_origin = [0, 1]
    dir = os.listdir(path_to_folder)
    for file in dir:
        if file != '.DS_Store' and file != '.DS':
            with open(f'{path_to_folder}/{file}', "r") as fp:
                lines = fp.readlines()
            with open(f'{path_to_folder}/{file}', "w") as fp:
                for line in lines:
                    res = int(line[0])
                    if res in mas_origin:
                        if res == 0:
                            line = '11' + line[1::]
                        elif res == 1:
                            line = '12' + line[1::]
                        fp.write(line)

if __name__ == '__main__':
    rename_labels(path_to_folder='/Users/macbook/Desktop/Лидеры цифровой трансформации/flats', mas=[0, 1])
