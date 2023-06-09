from utils import save_images
from yandex_images_parser import Parser
from selenium import webdriver

def parse(text):
    '''! Функция парсинга изображений'''
    parser = Parser()
    square_flat = parser.query_search(query=text)
    square_flat_url = square_flat[0]
    similar_flats = parser.image_search(url=square_flat_url,
                                       limit=100)
    print(f"Flat:\n{square_flat_url}\n")

    print("Similar flats:")
    for cat in similar_flats:
        print(cat)
    output_dir = "/Users/macbook/Desktop/Лидеры цифровой трансформации/flats"
    save_images(square_flat, dir_path=output_dir, prefix="original_")
    save_images(similar_flats, dir_path=output_dir, prefix="similar_", number_images=True)

if __name__=='__main__':
    parse('отделка квартиры в новостройке')