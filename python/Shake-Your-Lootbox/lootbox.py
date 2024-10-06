import rewards
from rewards import get_new_skin

skin_counts = {
    'COMMON': 0,
    'RARE': 0,
    'EPIC': 0,
    'LEGENDARY': 0
}
for _ in range(5):
    skin = get_new_skin()
    skin_counts[skin] += 1

if skin_counts['COMMON'] > 0:
    print(f"{skin_counts['COMMON']} x common")
if skin_counts['RARE'] > 0:
    print(f"{skin_counts['RARE']} x rare")
if skin_counts['EPIC'] > 0:
    print(f"{skin_counts['EPIC']} x epic")
if skin_counts['LEGENDARY'] > 0:
    print(f"{skin_counts['LEGENDARY']} x legendary")
