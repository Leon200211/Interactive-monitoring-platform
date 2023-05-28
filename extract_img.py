import ffmpeg
import os

def split_scene_into_frames(path_to_folder, output_folder_path=None):
    '''! Функция извлечения кадров из видео для дальнейшей разметки'''
    if not os.path.exists(output_folder_path):
        os.makedirs(output_folder_path)
    dir = os.listdir(path_to_folder)
    for file in dir:
        if file != '.DS_Store' and file != '.DS':
            try:
                #file = file.strip('.mp4')
                (ffmpeg.input(f'{path_to_folder}/{file}')
                 .filter('fps', fps=6)
                 .output(f'{output_folder_path}/%d.jpg',
                         video_bitrate='5000k',
                         s='224x224',
                         sws_flags='bilinear',
                         start_number=0)
                 .run(capture_stdout=True, capture_stderr=True))
                print(f'Обработано: {file}')
            except ffmpeg.Error as e:
                print('stdout:', e.stdout.decode('utf8'))
                print('stderr:', e.stderr.decode('utf8'))
